@extends('layout.main')

@section('title', 'Home | RSHP Unair')

@section('content')
<section id="Home" style="padding: 20px 40px;">
    <h2 style="text-align:center; margin-bottom:20px;">Selamat Datang di Rumah Sakit Hewan Pendidikan Universitas Airlangga</h2>

    <div style="display:flex; align-items:center; justify-content:space-between; gap:40px; flex-wrap:wrap;">

        <div style="flex:1 1 55%; text-align:justify; line-height:1.8; color:#222;">
            <p style="margin:0;">
                Rumah Sakit Hewan dibentuk di Fakultas Kedokteran Hewan Universitas Airlangga secara resmi berdiri pada tanggal 
                <strong>1 Januari 1972</strong> berdasarkan SK Menteri Pendidikan dan Kebudayaan Republik Indonesia. 
                Saat itu masih berupa klinik hewan yang menjadi bagian dari Departemen Klinik Veteriner, 
                dimana klinik hewan ini juga menjadi wahana belajar mahasiswa Fakultas Kedokteran Hewan baik program 
                <strong>S1 Kedokteran Hewan</strong> maupun <strong>Program Profesi Dokter Hewan</strong> atau lebih dikenal sebagai 
                program <em>Ko-Asistensi</em>.
            </p>
        </div>

        <div style="flex:1 1 40%; text-align:center;">
            <iframe 
                width="100%" 
                height="260" 
                src="https://www.youtube.com/embed/rCfvZPECZvE?si=uNT71h-ujfbxYZfT"
                title="Video Profil RSHP Universitas Airlangga"
                frameborder="0"
                style="border-radius:10px; box-shadow:0 2px 8px rgba(0,0,0,0.25); max-width:500px;"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen>
            </iframe>
        </div>
    </div>

    <h2 style="text-align:center; margin-top:40px;">Jadwal Layanan</h2>
    <table border="1" width="100%" style="max-width:700px; margin:10px auto 40px; background-color: rgb(255, 239, 200); border-collapse: collapse; border-radius:8px; overflow:hidden;">
        <tr style="text-align:center; font-weight:bold; background:#f8de4a;">
            <th style="border:1px solid #ccc; padding:8px;">Hari</th>
            <th style="border:1px solid #ccc; padding:8px;">Jam Operasional</th>
        </tr>
        <tr style="text-align:center;">
            <td style="border:1px solid #ccc; padding:8px;">Senin - Jumat</td>
            <td style="border:1px solid #ccc; padding:8px;">08:30 - 21:00</td>
        </tr>
        <tr style="text-align:center;">
            <td style="border:1px solid #ccc; padding:8px;">Sabtu</td>
            <td style="border:1px solid #ccc; padding:8px;">09:00 - 15:00</td>
        </tr>
    </table>
</section>
@endsection