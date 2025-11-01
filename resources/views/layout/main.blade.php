<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'RSHP Universitas Airlangga')</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

  <style>
    :root {
      --primary: #1979ef;
      --secondary: #f8de4a;
      --accent: #fffaf2;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f8f9fa;
      color: #333;
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    /* Header */
    header {
      text-align: center;
      color: #fff;
      background-color: var(--primary);
      padding: 12px 0;
      font-weight: 600;
      letter-spacing: 0.5px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    /* Navbar */
    nav {
      background-color: var(--secondary);
      color: #0c0808;
      padding: 8px 0;
      box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    }

    nav ul {
      list-style: none;
      padding: 0;
      margin: 0;
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
    }

    nav ul li {
      margin: 0 15px;
    }

    nav ul li a {
      text-decoration: none;
      color: #000;
      font-weight: 600;
      transition: all 0.3s;
    }

    nav ul li a:hover,
    nav ul li a.active {
      color: #1979ef;
      border-bottom: 2px solid #1979ef;
      padding-bottom: 2px;
    }

    /* Main */
    main {
      flex: 1;
      padding: 30px 20px;
      background-color: var(--accent);
    }

    section {
      background-color: #fff;
      padding: 25px;
      border-radius: 8px;
      box-shadow: 0 3px 10px rgba(0,0,0,0.08);
      max-width: 1100px;
      margin: 0 auto;
    }

    section h2 {
      color: #1979ef;
      text-align: center;
      margin-bottom: 20px;
      font-weight: 700;
    }

    /* Footer */
    footer {
      background-color: var(--primary);
      text-align: center;
      padding: 12px 0;
      color: #ffffff;
      margin-top: auto;
      border-top: 3px solid var(--secondary);
      font-size: 0.95rem;
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
  <!-- Header -->
  <header>
    <h1>Rumah Sakit Hewan Pendidikan Universitas Airlangga</h1>
  </header>

  <!-- Navbar -->
  <nav>
    <ul>
      <li><a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">Home</a></li>
      <li><a href="{{ url('/struktur') }}" class="{{ request()->is('struktur') ? 'active' : '' }}">Struktur Organisasi</a></li>
      <li><a href="{{ url('/layanan') }}" class="{{ request()->is('layanan') ? 'active' : '' }}">Layanan Umum</a></li>
      <li><a href="{{ url('/visi') }}" class="{{ request()->is('visi') ? 'active' : '' }}">Visi & Misi</a></li>
      <li><a href="{{ url('/kontak') }}" class="{{ request()->is('kontak') ? 'active' : '' }}">Kontak</a></li>
      <li><a href="{{ url('/login') }}" class="{{ request()->is('login') ? 'active' : '' }}">Login</a></li>
    </ul>
  </nav>

  <!-- Main Content -->
  <main>
    @yield('content')
  </main>

  <!-- Footer -->
  <footer>
    <p>Untuk informasi lebih lanjut, kunjungi <a href="https://www.unair.ac.id" target="_blank">www.unair.ac.id</a></p>
    <p>Telp. (031) 5992785, 5993016 | Fax. (031) 5993015</p>
    <p>Email: info@fkh.unair.ac.id</p>
    <p>Alamat: Kampus C Mulyorejo, Surabaya 60115</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
