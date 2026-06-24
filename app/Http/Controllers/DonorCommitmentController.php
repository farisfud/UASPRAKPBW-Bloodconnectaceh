<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DonorCommitment;
use App\Models\BloodRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class DonorCommitmentController extends Controller
{
    /**
     * Simpan kesediaan donor ke database.
     * Dipanggil via AJAX dari halaman permintaan-cocok.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'blood_request_id' => 'required|integer|exists:blood_requests,id',
        ]);

        // Pastikan permintaan masih aktif (belum Selesai/Dibatalkan)
        $bloodRequest = BloodRequest::findOrFail($validated['blood_request_id']);
        if (in_array($bloodRequest->status, ['Selesai', 'Dibatalkan'])) {
            return response()->json([
                'success' => false,
                'message' => 'Permintaan ini sudah tidak aktif.'
            ], 422);
        }

        try {
            // firstOrCreate mencegah duplikasi (unique constraint)
            $commitment = DonorCommitment::firstOrCreate([
                'user_id'          => Auth::id(),
                'blood_request_id' => $validated['blood_request_id'],
            ], [
                'status' => 'Bersedia',
            ]);

            // Update status permintaan menjadi "Ada Pendonor"
            $bloodRequest->update(['status' => 'Ada Pendonor']);

            return response()->json([
                'success'    => true,
                'created'    => $commitment->wasRecentlyCreated,
                'commitment' => [
                    'id'              => $commitment->id,
                    'blood_request_id'=> $commitment->blood_request_id,
                    'status'          => $commitment->status,
                ],
                'message' => $commitment->wasRecentlyCreated
                    ? 'Terima kasih! Kesediaan donor Anda telah dicatat. 🩸'
                    : 'Anda sudah tercatat bersedia untuk permintaan ini.',
            ]);
        } catch (QueryException $e) {
            // Fallback jika unique constraint dilanggar (race condition)
            return response()->json([
                'success' => false,
                'message' => 'Anda sudah bersedia untuk permintaan ini.'
            ], 409);
        }
    }

    /**
     * Ambil semua ID permintaan yang sudah di-commit oleh user yang login.
     * Dipakai untuk menandai tombol di frontend agar tidak bisa diklik ulang.
     */
    public function myCommitments()
    {
        $ids = DonorCommitment::where('user_id', Auth::id())
            ->pluck('blood_request_id')
            ->toArray();

        return response()->json(['committed_ids' => $ids]);
    }
}
