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
                                <form method="POST" action="{{ route('admin.letters.approve', $l) }}" style="display:inline-block; margin-right: 0.5rem;">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Approve</button>
                                </form>
                                <form method="POST" action="{{ route('admin.letters.reject', $l) }}" style="display:inline-block;">
                                    @csrf
                                    <input type="text" name="rejected_reason" placeholder="Alasan" required class="form-control" style="width: 160px; display: inline-block; margin-right: .5rem;" />
                                    <button type="submit" class="btn btn-danger">Reject</button>
                                </form>
                            @else
                                <span class="badge">{{ $l->status }}</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">{{ $letters->links() }}</div>
    </div>
@endsection

