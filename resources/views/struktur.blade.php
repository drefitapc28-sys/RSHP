@extends('layout.main')

@section('title', 'Struktur Organisasi | RSHP Unair')

@section('content')
<section id="Struktur Organisasi" style="text-align:center; margin-top:20px;">
    <h2>Struktur Organisasi</h2>
    <p style="color:#555;">Rumah Sakit Hewan Pendidikan Universitas Airlangga</p>

    {{-- FOTO DIREKTUR --}}
    <div style="margin:20px auto;">
        <img src="{{ asset('img/direktur.jpg') }}" 
             alt="Direktur RSHP"
             style="width:150px; height:auto; border-radius:10px; box-shadow:0 2px 6px rgba(0,0,0,0.15);">
        <p style="margin-top:8px; font-weight:bold; font-size:16px;">Dr. Ira Sari Yudaniayanti, M.P., drh.</p>
        <p style="color:#666; font-size:14px;">Direktur RSHP</p>
    </div>

    {{-- FOTO WAKIL DIREKTUR --}}
    <div style="display:flex; justify-content:center; gap:120px; flex-wrap:wrap; margin-top:20px;">
        <div style="max-width:260px;">
            <img src="{{ asset('img/wadir1.jpg') }}" 
                 alt="Wakil Direktur 1"
                 style="width:130px; height:auto; border-radius:10px; box-shadow:0 2px 6px rgba(0,0,0,0.15);">
            <p style="font-weight:bold; margin-top:8px; font-size:15px;">Dr. Nusdianto Trakoso, M.P., drh.</p>
            <p style="color:#666; font-size:14px;">Wadir 1 Pelayanan Medis, Pendidikan & Penelitian</p>
        </div>

        <div style="max-width:260px;">
            <img src="{{ asset('img/wadir2.jpg') }}" 
                 alt="Wakil Direktur 2"
                 style="width:130px; height:auto; border-radius:10px; box-shadow:0 2px 6px rgba(0,0,0,0.15);">
            <p style="font-weight:bold; margin-top:8px; font-size:15px;">Dr. Miyayu Soneta S., M.vet., drh.</p>
            <p style="color:#666; font-size:14px;">Wadir 2 Administrasi & Keuangan</p>
        </div>
    </div>
</section>
@endsection
