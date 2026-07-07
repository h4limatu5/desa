<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use Illuminate\Http\Request;

class AdminResidentController extends Controller
{
    public function show(Resident $resident)
    {
        return view('admin.residents.show', compact('resident'));
    }

    public function index(Request $request)
    {
        $query = Resident::query();

        if ($request->filled('nik')) {
            $query->where('nik', 'like', '%' . $request->nik . '%');
        }

        if ($request->filled('nama')) {
            $query->where('nama_lengkap', 'like', '%' . $request->nama . '%');
        }

        if ($request->filled('kk')) {
            $query->where('kk', 'like', '%' . $request->kk . '%');
        }

        if ($request->filled('rt')) {
            $query->where('rt', $request->rt);
        }

        if ($request->filled('rw')) {
            $query->where('rw', $request->rw);
        }

        if ($request->filled('jenis_kelamin')) {
            $query->where('jenis_kelamin', $request->jenis_kelamin);
        }

        if ($request->filled('status_warga')) {
            $query->where('status_warga', $request->status_warga);
        }


        $residents = $query->orderByDesc('id')->paginate(10)->withQueryString();

        $stats = [
            'total' => Resident::count(),
            'active' => Resident::where('status_warga', 'Aktif')->count(),
            'inactive' => Resident::where('status_warga', 'Nonaktif')->count(),
            'male' => Resident::where('jenis_kelamin', 'Laki-laki')->count(),
            'female' => Resident::where('jenis_kelamin', 'Perempuan')->count(),
        ];

        return view('admin.residents.index', compact('residents', 'stats'));
    }

    public function create()
    {
        return view('admin.residents.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nik' => ['required', 'string', 'max:16', 'unique:residents,nik'],
            'kk' => ['nullable', 'string', 'max:16'],
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['nullable', 'date'],
            'jenis_kelamin' => ['nullable', 'in:Laki-laki,Perempuan'],
            'nomor_hp' => ['nullable', 'string', 'max:255'],
            'alamat' => ['nullable', 'string', 'max:255'],
            'rt' => ['nullable', 'string', 'max:10'],
            'rw' => ['nullable', 'string', 'max:10'],
            'desa' => ['nullable', 'string', 'max:255'],
            'status_perkawinan' => ['nullable', 'in:Belum Kawin,Kawin,Cerai,Cerai Mati,Lainnya'],
            'status_warga' => ['nullable', 'in:Aktif,Nonaktif'],
        ]);

        Resident::create($validated);

        return redirect()->route('admin.residents.index')
            ->with('success', 'Data warga berhasil ditambahkan.');
    }

    public function edit(Resident $resident)
    {
        return view('admin.residents.edit', compact('resident'));
    }

    public function update(Request $request, Resident $resident)
    {
        $validated = $request->validate([
            'nik' => ['required', 'string', 'max:16', 'unique:residents,nik,' . $resident->id],
            'kk' => ['nullable', 'string', 'max:16'],
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['nullable', 'date'],
            'jenis_kelamin' => ['nullable', 'in:Laki-laki,Perempuan'],
            'nomor_hp' => ['nullable', 'string', 'max:255'],
            'alamat' => ['nullable', 'string', 'max:255'],
            'rt' => ['nullable', 'string', 'max:10'],
            'rw' => ['nullable', 'string', 'max:10'],
            'desa' => ['nullable', 'string', 'max:255'],
            'status_perkawinan' => ['nullable', 'in:Belum Kawin,Kawin,Cerai,Cerai Mati,Lainnya'],
            'status_warga' => ['nullable', 'in:Aktif,Nonaktif'],
        ]);

        $resident->update($validated);

        return redirect()->route('admin.residents.index')
            ->with('success', 'Data warga berhasil diperbarui.');
    }

    public function destroy(Resident $resident)
    {
        $resident->delete(); // soft delete karena Model Resident memakai SoftDeletes

        return redirect()->route('admin.residents.index')
            ->with('success', 'Data warga berhasil dihapus (soft delete).');
    }
}


