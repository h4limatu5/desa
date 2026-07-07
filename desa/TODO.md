# TODO

## Step 1 - CRUD Data Warga (Admin/Operator)
- [ ] 1.1 Tambah SoftDeletes pada tabel `residents` (migration baru) + update Model `Resident`
- [ ] 1.2 Ubah destroy di `AdminResidentController` agar soft delete (dan flash message tetap)
- [ ] 1.3 Update index: tampilkan search berdasarkan NIK + nama_lengkap, filter RT/RW + jenis_kelamin + status_warga
- [ ] 1.4 Pastikan pagination tetap jalan (`paginate(10)` + `withQueryString()`)
- [ ] 1.5 Update view `admin/residents/index.blade.php` menampilkan form search/filter
- [ ] 1.6 Tampilkan statistik otomatis (total/aktif/nonaktif/laki-laki/perempuan) di view (minimal angka)

## Step 2 - CRUD Akun Warga
- [ ] 2.1 Implementasi registrasi: validasi NIK exist di `residents`, set `users.resident_id` & `role=warga`
- [ ] 2.2 Profil warga: hanya user melihat datanya sendiri
- [ ] 2.3 Update password/foto profil/nomor HP (sesuai kolom yang ada)
- [ ] 2.4 Nonaktifkan akun warga saat `status_warga=Nonaktif`

## Step 3 - CRUD Surat (workflow Warga ↔ Admin)
- [ ] 3.1 Tambah softDeletes pada tabel `letters` + update Model `Letter`
- [ ] 3.2 Tambah endpoint untuk admin memproses (status diproses) + validasi alasan ditolak
- [ ] 3.3 Warga: update isi permohonan hanya saat status pending/ditolak
- [ ] 3.4 Warga: batal pengajuan (soft delete) hanya saat status submitted/pending
- [ ] 3.5 Admin: filter surat per jenis_surat + pagination
- [ ] 3.6 Pisahkan arsip surat berdasarkan kategori (jenis_surat) untuk kemudahan pencarian

