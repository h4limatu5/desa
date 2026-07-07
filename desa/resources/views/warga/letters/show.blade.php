<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Pengajuan</title>
</head>
<body class="bg-white p-6">
    <h1 class="text-xl font-bold mb-4">Status Pengajuan Surat</h1>

    @if (session('success'))
        <div class="bg-green-100 p-3 mb-3">{{ session('success') }}</div>
    @endif

    <div class="mb-2"><b>Jenis Surat:</b> {{ $letter->jenis_surat }}</div>
    <div class="mb-2"><b>Status:</b> {{ $letter->status }}</div>
    @if ($letter->nomor_surat)
        <div class="mb-2"><b>Nomor Surat:</b> {{ $letter->nomor_surat }}</div>
    @endif
    @if ($letter->tanggal_surat)
        <div class="mb-2"><b>Tanggal Surat:</b> {{ $letter->tanggal_surat }}</div>
    @endif

    @if ($letter->status === 'rejected')
        <div class="mb-2"><b>Alasan ditolak:</b> {{ $letter->rejected_reason }}</div>
    @endif

    <h2 class="font-bold mt-6 mb-2">Data Pengajuan</h2>

    @php
        $canEdit = in_array($letter->status, ['submitted','rejected'], true);
        $isiJson = json_encode($letter->isi_data_json, JSON_UNESCAPED_UNICODE);
    @endphp

    @if ($canEdit)
        <form method="POST" action="{{ route('warga.letters.update', $letter) }}" class="mb-4">
            @csrf
            @method('PATCH')

            <textarea
                name="isi_data_json"
                class="border rounded p-2 w-full"
                rows="6"
                required
            >{{ $isiJson }}</textarea>

            @error('isi_data_json')
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
            @enderror

            <div class="mt-3 flex gap-3 flex-wrap">
                <button type="submit" class="bg-black text-white px-4 py-2 rounded">Simpan Perubahan</button>

                <form method="POST" action="{{ route('warga.letters.cancel', $letter) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 rounded border bg-white">Batal Pengajuan</button>
                </form>
            </div>
        </form>
    @else
        <pre class="bg-gray-100 p-3 rounded">{{ json_encode($letter->isi_data_json, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE) }}</pre>
    @endif

    @if ($letter->pdf_path && $letter->status === 'approved')
        <a class="inline-block mt-4 bg-black text-white px-4 py-2 rounded" href="{{ route('storage.local.download', $letter->pdf_path) }}">Download PDF</a>
    @endif
</body>
</html>



