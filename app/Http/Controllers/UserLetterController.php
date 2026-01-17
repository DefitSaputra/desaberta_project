<?php

namespace App\Http\Controllers;

use App\Models\LetterRequest;
use App\Models\LetterType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserLetterController extends Controller
{
    /**
     * Menampilkan Riwayat Surat Saya
     */
    public function index()
    {
        // Ambil data surat milik user yang sedang login saja
        $requests = LetterRequest::where('user_id', Auth::id())
                    ->with('letterType') // Load relasi jenis surat
                    ->latest()
                    ->get();

        return view('surat.index', compact('requests'));
    }

    /**
     * Menampilkan Form Buat Surat Baru
     */
    public function create()
    {
        // Ambil semua jenis surat untuk pilihan di dropdown
        $types = LetterType::all();
        
        return view('surat.create', compact('types'));
    }

    /**
     * Proses Simpan Pengajuan Surat
     */
    public function store(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'letter_type_id' => 'required|exists:letter_types,id',
            'keterangan'     => 'nullable|string',
            'lampiran'       => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048', // Max 2MB
        ]);

        // 2. Handle Upload File (Jika ada)
        $attachmentPath = null;
        if ($request->hasFile('lampiran')) {
            // Simpan di folder: storage/app/public/lampiran
            $attachmentPath = $request->file('lampiran')->store('lampiran', 'public');
        }

        // 3. Simpan ke Database
        LetterRequest::create([
            'user_id'        => Auth::id(),
            'letter_type_id' => $request->letter_type_id,
            'status'         => 'pending', // Default status
            'data'           => [
                // Kita simpan data tambahan dalam format JSON
                'keterangan_warga' => $request->keterangan,
                'attachment_path'  => $attachmentPath,
            ],
        ]);

        // 4. Kembali ke Dashboard dengan Pesan Sukses
        return redirect()->route('dashboard')->with('success', 'Surat berhasil diajukan! Mohon tunggu verifikasi admin.');
    }
}