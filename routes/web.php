<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\BloodRequestController;
use App\Http\Controllers\DonorCommitmentController;

// Public routes
Route::get('/', function () { return view('index'); })->name('home');
Route::get('/login', function () { return view('login'); })->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Protected routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/cari-donor', [DonorController::class, 'index'])->name('cari-donor');
    
    Route::get('/permintaan-darurat', function () { return view('permintaan-darurat'); })->name('permintaan-darurat');
    Route::post('/permintaan-darurat', [BloodRequestController::class, 'store'])->name('blood-request.store');
    
    Route::get('/riwayat-permintaan', [BloodRequestController::class, 'index'])->name('riwayat-permintaan');
    Route::post('/riwayat-permintaan/{id}/status', [BloodRequestController::class, 'updateStatus'])->name('blood-request.updateStatus');
    
    Route::get('/permintaan-cocok', function () {
        $user = auth()->user();

        // Ambil semua ID permintaan yang sudah di-commit user ini
        $committedIds = \App\Models\DonorCommitment::where('user_id', $user->id)
            ->pluck('blood_request_id')
            ->toArray();

        $matchedRequests = \App\Models\BloodRequest::whereIn('status', ['Menunggu Donor', 'Dihubungi', 'Ada Pendonor'])
            ->where('gol_darah', $user->gol_darah)
            ->where('rhesus', $user->rhesus)
            ->latest()
            ->get()
            ->map(function ($r) use ($committedIds) {
                return [
                    'id'          => $r->id,
                    'patient'     => $r->nama_pasien,
                    'bloodType'   => $r->gol_darah,
                    'rhesus'      => $r->rhesus,    
                    'bags'        => $r->jumlah_kantong,
                    'urgency'     => $r->tingkat_urgensi,
                    'hospital'    => $r->rumah_sakit,
                    'location'    => $r->lokasi,
                    'contact'     => $r->kontak_nama,
                    'phone'       => $r->kontak_telepon,
                    'notes'       => $r->catatan,
                    'status'      => $r->status,
                    'committed'   => in_array($r->id, $committedIds),
                ];
            })->toArray();

        return view('permintaan-cocok', [
            'requests'     => $matchedRequests,
            'committedIds' => $committedIds,
        ]);
    })->name('permintaan-cocok');
    
    Route::get('/riwayat-donor', function () {
        $user = auth()->user();
        $histories = $user->donationHistories()->latest()->get()->map(function ($h) use ($user) {
            return [
                'id' => $h->id,
                'date' => $h->tanggal_donor,
                'patient' => 'PMI Rutin',
                'hospital' => 'PMI',
                'location' => $h->lokasi_donor,
                'bloodType' => ($user->gol_darah . $user->rhesus),
                'status' => 'Selesai',
                'notes' => ''
            ];
        })->toArray();
        return view('riwayat-donor', compact('histories'));
    })->name('riwayat-donor');
    
    Route::get('/profil-donor', [DonorController::class, 'profile'])->name('profil-donor');
    Route::post('/profil-donor', [DonorController::class, 'updateProfile'])->name('profil-donor.update');
    Route::post('/profil-donor/toggle-active', [DonorController::class, 'toggleActive'])->name('profil-donor.toggleActive');
    Route::post('/profil-donor/toggle-status', [DonorController::class, 'toggleStatus'])->name('profil-donor.toggleStatus');

    Route::get('/edukasi', function () { return view('edukasi'); })->name('edukasi');
    Route::get('/notifikasi', function () { return view('notifikasi'); })->name('notifikasi');
    Route::get('/pengaturan', function () { return view('pengaturan'); })->name('pengaturan');
    Route::post('/pengaturan', [DonorController::class, 'updateAccount'])->name('pengaturan.update');
    Route::post('/pengaturan/password', [DonorController::class, 'changePassword'])->name('pengaturan.changePassword');
    
    Route::get('/admin/dashboard', function () { return view('dashboard-admin'); })->name('admin.dashboard');
    Route::get('/admin/edukasi', function () { return view('edukasi-admin'); })->name('admin.edukasi');

    // Donor Commitments
    Route::post('/donor-commitments', [DonorCommitmentController::class, 'store'])->name('donor-commitments.store');
    Route::get('/donor-commitments/mine', [DonorCommitmentController::class, 'myCommitments'])->name('donor-commitments.mine');
});
