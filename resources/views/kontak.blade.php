@extends('layout.main')

@section('title', 'Kontak | RSHP Unair')

@section('content')
<section id="kontak" style="text-align:center; margin-top:20px;">
    <h2>Kontak Kami</h2>
    <p style="color:#555;">Hubungi Rumah Sakit Hewan Pendidikan Universitas Airlangga untuk informasi lebih lanjut.</p>

    <div style="max-width:600px; margin:30px auto; text-align:left; background-color:#fffbe7; padding:20px; border-radius:10px; box-shadow:0 2px 6px rgba(0,0,0,0.1);">
        <p><strong>Alamat:</strong> Kampus C Mulyorejo, Surabaya 60115</p>
        <p><strong>Telepon:</strong> (031) 5992785 / (031) 5993016</p>
        <p><strong>Fax:</strong> (031) 5993015</p>
        <p><strong>Email:</strong> info@fkh.unair.ac.id</p>
        <p><strong>Website:</strong> <a href="https://www.unair.ac.id" target="_blank">www.unair.ac.id</a></p>
    </div>

    {{-- 📍 GOOGLE MAPS --}}
    <h3 style="margin-top:40px;">Lokasi Kami</h3>
    <div style="display:flex; justify-content:center; margin-top:15px;">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.7410544483982!2d112.78555967454601!3d-7.270280071437478!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fbd40a9784f5%3A0xe756f6ae03eab99!2sRumah%20Sakit%20Hewan%20Pendidikan%20Universitas%20Airlangga!5e0!3m2!1sid!2sid!4v1760689468631!5m2!1sid!2sid" 
    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
    </iframe>
    </div>
</section>
@endsection
