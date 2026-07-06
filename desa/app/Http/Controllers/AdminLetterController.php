<?php

namespace App\Http\Controllers;

use App\Models\Letter;
use App\Models\LetterTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class AdminLetterController extends Controller
{
    public function index()
    {
        $this->authorizeAdmin();

        $letters = Letter::query()->with('resident')->orderByDesc('id')->paginate(10);

        return view('admin.letters.index', compact('letters'));
    }

    public function approve(Request $request, Letter $letter)
    {
        $this->authorizeAdmin();

        $letter->status = 'approved';
        $letter->approved_at = now();

        // nomor surat sederhana jika belum ada
        if (!$letter->nomor_surat) {
            $letter->nomor_surat = 'SURAT-' . $letter->id . '-' . now()->format('Y');
        }

        if (!$letter->tanggal_surat) {
            $letter->tanggal_surat = now()->toDateString();
        }

        $letter->save();

        $this->generatePdf($letter);

        return redirect()->route('admin.letters.index')
            ->with('success', 'Pengajuan disetujui dan PDF digenerate.');
    }

    public function reject(Request $request, Letter $letter)
    {
        $this->authorizeAdmin();

        $data = $request->validate([
            'rejected_reason' => ['required', 'string', 'max:500'],
        ]);

        $letter->status = 'rejected';
        $letter->rejected_reason = $data['rejected_reason'];
        $letter->rejected_at = now();
        $letter->save();

        return redirect()->route('admin.letters.index')
            ->with('success', 'Pengajuan ditolak.');
    }

    private function authorizeAdmin()
    {
        $user = Auth::user();
        if (!$user || $user->role !== 'admin') {
            abort(403, 'Akses admin ditolak.');
        }
    }

    private function generatePdf(Letter $letter): void
    {
        // Implementasi PDF: jika package PDF belum ada, gunakan placeholder.
        // Karena dependensi PDF tidak ada di repo saat ini, kita buat skema file .pdf kosong.
        // Saat deploy produksi, ganti dengan real PDF generator (mis. barryvdh/laravel-dompdf).

        $path = 'letters/' . $letter->id . '/' . Str::slug($letter->jenis_surat) . '.pdf';

        Storage::disk('local')->put($path, '%PDF-1.4\n% Fake PDF generated placeholder\n');

        $letter->pdf_path = $path;
        $letter->save();
    }
}

