<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'RSHP Universitas Airlangga')</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        nav {
            background-color: #f8de4a;
            color: rgb(12, 8, 8);
            padding: 5px;
        }
        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: right;
        }
        nav ul li {
            margin: 0 15px;
        }
        nav ul li a {
            text-decoration: none;
            color: rgb(16, 8, 8);
            font-weight: bold;
        }
        nav ul li a:hover {
            color: #393837;
            border-bottom: 2px solid #141001;
        }
        header {
            text-align: center;
            color: #f4f4f4;
            background-color: #1979ef;
            padding: 5px 0;
        }
        section {
            padding: 20px;
            margin: 20px;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 2px 5px;
        }
        section h2 {
            color: #434343;
            text-align: center;
        }
        footer {
            background-color: #1979ef;
            text-align: center;
            padding: 10px 0;
            position: relative;
            bottom: 0;
            width: 100%;
            color: #1c1b1b;
        }
        footer p {
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>
    <header>
        <h1>Rumah Sakit Hewan Pendidikan Universitas Airlangga</h1>
    </header>

    <nav>
        <ul>
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('/struktur') }}">Struktur Organisasi</a></li>
            <li><a href="{{ url('/layanan') }}">Layanan Umum</a></li>
            <li><a href="{{ url('/visi') }}">Visi Misi dan Tujuan</a></li>
            <li><a href="{{ url('/login') }}">Login</a></li>
        </ul> 
    </nav>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>Untuk informasi lebih lanjut, kunjungi website <a href="https://www.unair.ac.id">www.unair.ac.id</a></p>
        <p>Telp. (031) 5992785, 5993016</p>
        <p>Fax. (031) 5993015 </p>
        <p>Email: info@fkh.unair.ac.id</p>
        <p>Alamat: Kampus C Mulyorejo, Surabaya 60115</p>
    </footer>
</body>
</html>
