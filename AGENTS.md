Menggunanakan Gemini AI

1. Gambaran Umum Project (Project Overview)
Nama Aplikasi: Sistem Informasi Kendaraan Dinas Operasional (SIM-KDO) / Pengelolaan Aset BMD.

Stack Backend: Laravel 11 (REST API Mode Only).

Stack Frontend: Vue.js 3 (SPA / Single Page Application).

Database: MySQL.

Tujuan Utama: Mengelola data aset Perangkat Daerah, Pegawai Negeri Sipil (PNS), dan Alokasi/Penggunaan Kendaraan Dinas.

🗄️ 2. Aturan Database & Migration (DB Standards)
Setia AI Agent yang menambahkan atau memodifikasi tabel database wajib mematuhi aturan berikut:

Urutan Timestamp Migration (Sangat Krusial):

Migration tabel Parent harus dieksekusi sebelum tabel Child untuk mencegah error SQLSTATE[HY000]: General error: 1824.

Urutan timestamp wajib:

yyyy_mm_dd_000001_create_perangkat_daerahs_table.php

yyyy_mm_dd_000002_create_pegawai_negeri_sipils_table.php

yyyy_mm_dd_000003_create_kendaraan_dinas_operasionals_table.php

Konvensi Naming & Foreign Key:

Nama tabel jamak (plural Bahasa Indonesia/Inggris hybrid): perangkat_daerahs, pegawai_negeri_sipils, kendaraan_dinas_operasionals.

Format kolom Foreign Key: perangkat_daerah_id, pegawai_negeri_sipil_id.

Menggunakan relasi .constrained('nama_tabel').

Menggunakan softDeletes() di semua tabel aset untuk menjaga riwayat data historis.

Integritas Relasi:

pegawai_negeri_sipils.perangkat_daerah_id: nullable(), onDelete('set null').

kendaraan_dinas_operasionals.perangkat_daerah_id: nullable(), onDelete('set null').

kendaraan_dinas_operasionals.pegawai_negeri_sipil_id: nullable(), onDelete('set null') (karena kendaraan bisa berupa kendaraan pool/belum ditugaskan).

🛠️ 3. Aturan Backend / Laravel (Backend Guidelines)
A. Eloquent Models
Selalu cantumkan trait SoftDeletes dan HasFactory.

Wajib mengisi properti $fillable secara spesifik (dilarang menggunakan $guarded = []).

Wajib mendefinisikan relasi BelongsTo dan HasMany secara eksplisit dengan nama kunci asing jika menggunakan istilah bahasa Indonesia.
