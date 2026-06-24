<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DonationHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DonorController extends Controller
{
    public function index()
    {
        $dbDonors = User::where('is_donor', 1)->get();

        $donors = $dbDonors->map(function ($u) {
            $latestDonation = $u->donationHistories()->latest()->first();
            return [
                'id' => $u->id,
                'name' => $u->name,
                'bloodType' => $u->gol_darah ?? 'A',
                'rhesus' => $u->rhesus ?? '+',
                'location' => $u->lokasi ?? 'Banda Aceh',
                'status' => $u->status_donor ?? 'Tersedia',
                'lastDonor' => $latestDonation ? $latestDonation->tanggal_donor : 'Belum pernah',
                'phone' => $u->no_telepon ?? '',
                'age' => $u->usia ?? 25,
                'weight' => $u->berat_badan ?? 65,
                'totalDonations' => $u->donationHistories()->count()
            ];
        })->toArray();

        return view('cari-donor', compact('donors'));
    }

    public function profile()
    {
        $user = Auth::user();
        $histories = $user->donationHistories()->latest()->get()->map(function ($h) use ($user) {
            return [
                'id' => $h->id,
                'date' => $h->tanggal_donor,
                'patient' => 'Donor PMI Rutin',
                'hospital' => 'PMI',
                'location' => $h->lokasi_donor,
                'bloodType' => ($user->gol_darah . $user->rhesus),
                'status' => 'Selesai',
                'notes' => ''
            ];
        })->toArray();

        return view('profil-donor', compact('histories'));
    }

    public function updateProfile(Request $request)
    {
        $validated = $request->validate([
            'blood_type' => 'required|string|in:A,B,AB,O',
            'rhesus' => 'required|string|in:+,-',
            'weight' => 'required|integer|min:45',
            'age' => 'required|integer|min:17|max:65',
            'last_donor_date' => 'nullable|date',
            'location' => 'required|string',
            'health_notes' => 'nullable|string',
        ]);

        $user = Auth::user();
        $user->update([
            'gol_darah' => $validated['blood_type'],
            'rhesus' => $validated['rhesus'],
            'berat_badan' => $validated['weight'],
            'usia' => $validated['age'],
            'catatan_kesehatan' => $validated['health_notes'],
            'lokasi' => $validated['location'],
            'is_donor' => true,
        ]);

        if (!empty($validated['last_donor_date'])) {
            $user->donationHistories()->firstOrCreate([
                'tanggal_donor' => $validated['last_donor_date'],
                'lokasi_donor' => $validated['location']
            ]);
        }

        return back()->with('success', 'Profil donor berhasil disimpan!');
    }

    public function updateAccount(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'required|string|max:20',
            'location' => 'required|string',
        ]);

        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'no_telepon' => $validated['phone'],
            'lokasi' => $validated['location'],
        ]);

        return back()->with('success', 'Pengaturan akun berhasil disimpan!');
    }

    public function changePassword(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'current_password' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if (!Hash::check($validated['current_password'], $user->password)) {
            return back()->withErrors(['current_password' => 'Password saat ini tidak cocok.']);
        }

        $user->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('success', 'Password berhasil diubah!');
    }

    public function toggleActive(Request $request)
    {
        $user = Auth::user();
        $user->is_donor = $request->input('is_donor', false);
        $user->save();

        return response()->json(['success' => true, 'is_donor' => $user->is_donor]);
    }

    public function toggleStatus(Request $request)
    {
        $user = Auth::user();
        $user->status_donor = $request->input('status_donor') === 'Tersedia' ? 'Tersedia' : 'Tidak Tersedia';
        $user->save();

        return response()->json(['success' => true, 'status_donor' => $user->status_donor]);
    }
}
