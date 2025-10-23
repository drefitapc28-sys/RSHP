<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'RSHP Universitas Airlangga')</title>
    <style>
        /* Atur tinggi penuh halaman agar footer bisa menempel di bawah */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        /* Header dan Nav */
        header {
            text-align: center;
            color: #fff;
            background-color: #1979ef;
            padding: 10px 0;
        }

        nav {
            background-color: #f8de4a;
            color: #0c0808;
            padding: 5px 0;
        }

        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: flex-end;
        }

        nav ul li {
            margin: 0 15px;
        }

        nav ul li a {
            text-decoration: none;
            color: #100808;
            font-weight: bold;
        }

        nav ul li a:hover {
            color: #393837;
            border-bottom: 2px solid #141001;
        }

        /* Main harus fleksibel agar dorong footer ke bawah */
        main {
            flex: 1;
            padding: 20px;
        }

        section {
            padding: 20px;
            margin: 20px auto;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            max-width: 1100px;
        }

        section h2 {
            color: #434343;
            text-align: center;
        }

        /* Footer sticky di bawah */
        footer {
            background-color: #1979ef;
            text-align: center;
            padding: 10px 0;
            color: #ffffffff;
            width: 100%;
            margin-top: auto; /* Dorong ke bawah */
        }

        footer a {
            color: #fff;
            text-decoration: underline;
        }

        footer a:hover {
            color: #f8de4a;
        }

        footer p {
            margin: 2px 0;
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
            <li><a href="{{ url('/visi') }}">Visi & Misi</a></li>
            <li><a href="{{ url('/kontak') }}">Kontak</a></li>
            <li><a href="{{ url('/login') }}">Login</a></li>
        </ul>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>Untuk informasi lebih lanjut, kunjungi <a href="https://www.unair.ac.id" target="_blank">www.unair.ac.id</a></p>
        <p>Telp. (031) 5992785, 5993016 | Fax. (031) 5993015</p>
        <p>Email: info@fkh.unair.ac.id</p>
        <p>Alamat: Kampus C Mulyorejo, Surabaya 60115</p>
    </footer>
</body>
</html>
