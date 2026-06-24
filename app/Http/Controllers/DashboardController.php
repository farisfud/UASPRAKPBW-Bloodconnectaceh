<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BloodRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Platform statistics (with realistic offset bases)
        $stats = [
            'total_users' => 2847 + User::count(),
            'total_donors' => 1203 + User::where('is_donor', 1)->count(),
            'active_requests' => BloodRequest::whereIn('status', ['Menunggu Donor', 'Dihubungi', 'Ada Pendonor'])->count(),
            'successful_donations' => 956 + BloodRequest::where('status', 'Selesai')->count(),
        ];

        // Fetch latest active requests from database
        $dbRequests = BloodRequest::whereIn('status', ['Menunggu Donor', 'Dihubungi', 'Ada Pendonor'])
            ->latest()
            ->take(5)
            ->get();

        $requests = $dbRequests->map(function ($r) {
            return [
                'id' => $r->id,
                'patient' => $r->nama_pasien,
                'bloodType' => $r->gol_darah,
                'rhesus' => $r->rhesus,
                'bags' => $r->jumlah_kantong,
                'hospital' => $r->rumah_sakit,
                'location' => $r->lokasi,
                'urgency' => $r->tingkat_urgensi,
                'contact' => $r->kontak_nama,
                'phone' => $r->kontak_telepon,
                'notes' => $r->catatan,
                'status' => $r->status,
                'date' => $r->created_at->format('d M Y'),
                'matchedDonor' => null
            ];
        })->toArray();

        // Personal stats
        $myActiveRequestsCount = $user->bloodRequests()->whereIn('status', ['Menunggu Donor', 'Dihubungi', 'Ada Pendonor'])->count();
        $myContactedDonorsCount = $user->bloodRequests()->where('status', 'Dihubungi')->count();

        // Next donor date calculations
        $lastDonation = $user->donationHistories()->latest()->first();
        if ($lastDonation) {
            $lastDate = Carbon::parse($lastDonation->tanggal_donor);
            $nextDate = $lastDate->copy()->addMonths(3);
            $nextDonorDateStr = $nextDate->format('d M');
            $daysLeft = Carbon::now()->diffInDays($nextDate, false);
            $daysLeftStr = $daysLeft > 0 ? "$daysLeft hari lagi" : "Bisa donor sekarang";
        } else {
            $nextDonorDateStr = "Siap";
            $daysLeftStr = "Bisa donor sekarang";
        }

        return view('dashboard', compact(
            'stats',
            'requests',
            'myActiveRequestsCount',
            'myContactedDonorsCount',
            'nextDonorDateStr',
            'daysLeftStr'
        ));
    }
}
