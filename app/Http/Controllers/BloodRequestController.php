<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BloodRequest;
use Illuminate\Support\Facades\Auth;

class BloodRequestController extends Controller
{
    public function index()
    {
        $dbRequests = Auth::user()->bloodRequests()->latest()->get();

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

        return view('riwayat-permintaan', compact('requests'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_name' => 'required|string|max:255',
            'blood_type' => 'required|string|in:A,B,AB,O',
            'rhesus_type' => 'required|string|in:+,-',
            'bag_quantity' => 'required|integer|min:1|max:20',
            'urgency_level' => 'required|string|in:Rendah,Sedang,Darurat',
            'hospital_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'contact_name' => 'required|string|max:255',
            'contact_phone' => 'required|string|max:20',
            'notes' => 'nullable|string',
        ]);

        BloodRequest::create([
            'user_id' => Auth::id(),
            'nama_pasien' => $validated['patient_name'],
            'gol_darah' => $validated['blood_type'],
            'rhesus' => $validated['rhesus_type'],
            'jumlah_kantong' => $validated['bag_quantity'],
            'tingkat_urgensi' => $validated['urgency_level'],
            'rumah_sakit' => $validated['hospital_name'],
            'lokasi' => $validated['location'],
            'kontak_nama' => $validated['contact_name'],
            'kontak_telepon' => $validated['contact_phone'],
            'catatan' => $validated['notes'],
            'status' => 'Menunggu Donor',
        ]);

        return redirect()->route('riwayat-permintaan')->with('success', 'Permintaan donor berhasil diajukan.');
    }

    public function updateStatus(Request $request, $id)
    {
        $bloodRequest = BloodRequest::where('user_id', Auth::id())->findOrFail($id);

        $validated = $request->validate([
            'status' => 'required|string|in:Selesai,Dibatalkan,Menunggu Donor,Dihubungi,Ada Pendonor'
        ]);

        $bloodRequest->update([
            'status' => $validated['status']
        ]);

        return response()->json(['success' => true]);
    }
}
