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
    <pre class="bg-gray-100 p-3 rounded">{{ json_encode($letter->isi_data_json, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE) }}</pre>

    @if ($letter->pdf_path && $letter->status === 'approved')
        <a class="inline-block mt-4 bg-black text-white px-4 py-2 rounded" href="{{ route('storage.local.download', $letter->pdf_path) }}">Download PDF</a>
    @endif
</body>
</html>

