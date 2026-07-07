<?php

namespace App\Http\Controllers;

use App\Models\Letter;
use App\Models\LetterTemplate;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class AdminLetterController extends Controller
{
    public function index(Request $request)
    {
        $this->authorizeAdmin();

        $query = Letter::query()->with('resident');

        if ($request->filled('jenis_surat')) {
            $query->where('jenis_surat', $request->input('jenis_surat'));
        }

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        $letters = $query->orderByDesc('id')->paginate(10)->withQueryString();

        $letterTemplates = LetterTemplate::query()->orderBy('name')->get();

        return view('admin.letters.index', compact('letters', 'letterTemplates'));
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

    public function processed(Request $request, Letter $letter)
    {
        $this->authorizeAdmin();

        // Restriksi sederhana: hanya bisa diproses dari status submitted
        if ($letter->status !== 'submitted') {
            abort(422, 'Surat tidak dapat diproses pada status saat ini.');
        }

        $letter->status = 'processed';
        $letter->save();

        return redirect()->route('admin.letters.index')
            ->with('success', 'Pengajuan diproses.');
    }

    public function download(Letter $letter)
    {
        $this->authorizeAdmin();

        if (!$letter->pdf_path || !Storage::disk('local')->exists($letter->pdf_path)) {
            abort(404, 'PDF belum tersedia.');
        }

        return Storage::disk('local')->download($letter->pdf_path, Str::slug($letter->jenis_surat) . '.pdf');
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
        $path = 'letters/' . $letter->id . '/' . Str::slug($letter->jenis_surat) . '.pdf';

        $pdf = Pdf::loadView('pdf.letter', compact('letter'));
        $content = $pdf->output();

        Storage::disk('local')->put($path, $content);

        $letter->pdf_path = $path;
        $letter->save();
    }
}


