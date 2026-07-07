<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat {{ $letter->jenis_surat }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; color: #000; }
        .header { text-align: center; margin-bottom: 30px; }
        .header h1 { margin: 0; font-size: 24px; }
        .header p { margin: 0; font-size: 14px; }
        .content { font-size: 14px; line-height: 1.6; }
        .field { margin-bottom: 12px; }
        .field strong { display: inline-block; width: 140px; }
        .footer { margin-top: 40px; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Surat {{ $letter->jenis_surat }}</h1>
        <p>Desa Portal</p>
    </div>

    <div class="content">
        <div class="field"><strong>Nama Warga:</strong> {{ optional($letter->resident)->nama_lengkap ?? 'N/A' }}</div>
        <div class="field"><strong>NIK:</strong> {{ optional($letter->resident)->nik ?? 'N/A' }}</div>
        <div class="field"><strong>Tanggal Surat:</strong> {{ $letter->tanggal_surat ?? now()->toDateString() }}</div>
        <div class="field"><strong>Nomor Surat:</strong> {{ $letter->nomor_surat }}</div>

        <div class="field">
            <strong>Data Surat:</strong>
            <pre style="white-space: pre-wrap; font-family: inherit; background: #f2f2f2; padding: 12px; border-radius: 8px;">{{ json_encode($letter->isi_data_json, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre>
        </div>

        <div class="footer">
            <p>Surat ini telah disetujui dan dibuat oleh Admin Desa Portal.</p>
        </div>
    </div>
</body>
</html>
