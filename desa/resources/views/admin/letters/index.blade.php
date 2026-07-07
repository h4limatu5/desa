@extends('admin.layout')

@section('title', 'Verifikasi Surat')

@section('content')
    <div class="page-header">
        <div>
            <h1>Verifikasi Surat Mandiri</h1>
            <p class="text-muted">Kelola pengajuan surat dan verifikasi status dengan cepat.</p>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card p-6 mb-4">
        <form method="GET" action="{{ route('admin.letters.index') }}">
            <div class="flex gap-3 items-end flex-wrap">
                <div>
                    <label class="block text-sm font-medium">Jenis Surat</label>
                    <select name="jenis_surat" class="border rounded p-2">
                        <option value="">Semua</option>
                        @foreach ($letterTemplates as $lt)
                            <option value="{{ $lt->jenis_surat }}" @selected(request('jenis_surat') === $lt->jenis_surat)>
                                {{ $lt->name }} ({{ $lt->jenis_surat }})
                            </option>
                        @endforeach
                    </select>
                </div>


                <div>
                    <label class="block text-sm font-medium">Status</label>
                    <select name="status" class="border rounded p-2">
                        <option value="">Semua</option>
                        @foreach (['submitted','processed','approved','rejected'] as $s)
                            <option value="{{ $s }}" @selected(request('status') === $s)>{{ $s }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="bg-black text-white px-4 py-2 rounded">Filter</button>
                <a href="{{ route('admin.letters.index') }}" class="px-4 py-2 rounded border">Reset</a>
            </div>
        </form>
    </div>

    <div class="card p-6">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Warga</th>
                    <th>Jenis Surat</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($letters as $l)
                    <tr>

                        <td>{{ $l->id }}</td>
                        <td>{{ optional($l->resident)->nama_lengkap }} ({{ optional($l->resident)->nik }})</td>
                        <td>{{ $l->jenis_surat }}</td>
                        <td>{{ $l->status }}</td>
                        <td>
                            @if ($l->status === 'submitted')

                                <form method="POST" action="{{ route('admin.letters.processed', $l) }}" class="inline-block mr-2">
                                    @csrf
                                    <button type="submit" class="btn btn-secondary">Processed</button>
                                </form>

                                <form method="POST" action="{{ route('admin.letters.approve', $l) }}" class="inline-block mr-2">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Approve</button>
                                </form>
                                <form method="POST" action="{{ route('admin.letters.reject', $l) }}" class="inline-block">
                                    @csrf
                                    <input type="text" name="rejected_reason" placeholder="Alasan" required class="form-control inline-block w-40 mr-2" />
                                    <button type="submit" class="btn btn-danger">Reject</button>
                                </form>
                            @elseif ($l->status === 'processed')
                                <span class="badge">processed</span>
                                <form method="POST" action="{{ route('admin.letters.approve', $l) }}" class="inline-block ml-2">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Approve</button>
                                </form>
                            @else
                                <span class="badge">{{ $l->status }}</span>
                                @if ($l->pdf_path)
                                    <a href="{{ route('admin.letters.download', $l) }}" class="btn btn-secondary ml-3">Download PDF</a>
                                @endif
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">{{ $letters->links() }}</div>
    </div>
@endsection


