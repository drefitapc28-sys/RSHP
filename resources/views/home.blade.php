@extends('layout.main')

@section('title', 'Home | RSHP Unair')

@section('content')
<section id="Home">
    <h2>Selamat Datang di Rumah Sakit Hewan Pendidikan Universitas Airlangga</h2>

    <center>
        <img src="{{ asset('img/RSHP.jpeg') }}" alt="Logo RSHP" style="max-width:300px; border-radius:10px;">
    </center>

    <p style="text-align:justify; margin-top:15px;">
        Rumah Sakit Hewan dibentuk di Fakultas Kedokteran Hewan Universitas Airlangga secara resmi berdiri pada tanggal 
        1 Januari 1972 berdasarkan SK Menteri Pendidikan dan Kebudayaan Republik Indonesia. Saat itu masih berupa klinik hewan 
        yang menjadi bagian dari Departemen Klinik Veteriner, dimana klinik hewan ini juga menjadi wahana belajar mahasiswa 
        Fakultas Kedokteran Hewan baik program S1 Kedokteran Hewan maupun Program Profesi Dokter Hewan atau lebih dikenal sebagai 
        program Ko-Asistensi.
    </p>

    <h2>Jadwal Layanan</h2>
    <table border="1" width="100%" style="background-color: rgb(255, 239, 200); border-collapse: collapse; margin-top:10px;">
        <tr style="text-align: center; font-weight:bold; background:#f8de4a;">
            <th style="border:1px solid #ccc; padding:8px;">Hari</th>
            <th style="border:1px solid #ccc; padding:8px;">Jam Operasional</th>
        </tr>
        <tr style="text-align: center;">
            <td style="border:1px solid #ccc; padding:8px;">Senin - Jumat</td>
            <td style="border:1px solid #ccc; padding:8px;">08:30 - 21:00</td>
        </tr>
        <tr style="text-align: center;">
            <td style="border:1px solid #ccc; padding:8px;">Sabtu</td>
            <td style="border:1px solid #ccc; padding:8px;">09:00 - 15:00</td>
        </tr>
    </table>
</section>
@endsection
