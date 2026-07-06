<?php

namespace App\Http\Controllers;

use App\Models\Letter;
use App\Models\LetterTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WargaLetterController extends Controller
{
    public function create()
    {
        $templates = LetterTemplate::query()->orderBy('id')->get();

        return view('warga.letters.create', compact('templates'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_surat' => ['required', 'string'],
            'isi_data_json' => ['required'],
        ]);

        $isiData = $request->input('isi_data_json');
        if (is_string($isiData)) {
            $isiData = json_decode($isiData, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                return back()->withErrors(['isi_data_json' => 'Isi data JSON tidak valid.'])->withInput();
            }
        }

        if (!is_array($isiData)) {
            return back()->withErrors(['isi_data_json' => 'Isi data harus berupa JSON objek atau array.'])->withInput();
        }

        $user = Auth::user();
        if (!$user || $user->role !== 'warga' || !$user->resident_id) {
            abort(403, 'Akses ditolak: user belum terverifikasi NIK.');
        }

        $letter = Letter::create([
            'resident_id' => $user->resident_id,
            'user_id' => $user->id,
            'jenis_surat' => $request->jenis_surat,
            'status' => 'submitted',
            'isi_data_json' => $isiData,
        ]);

        return redirect()->route('warga.letters.show', $letter)
            ->with('success', 'Pengajuan surat berhasil dikirim.');
    }

    public function show(Letter $letter)
    {
        $user = Auth::user();
        if (!$user) {
            abort(403);
        }

        // Warga hanya bisa melihat surat miliknya
        if ($user->id !== $letter->user_id && $user->role !== 'admin') {
            abort(403);
        }

        $template = LetterTemplate::query()->where('jenis_surat', $letter->jenis_surat)->first();

        return view('warga.letters.show', compact('letter', 'template'));
    }
}

