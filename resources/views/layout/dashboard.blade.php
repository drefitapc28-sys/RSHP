@php
$role = session('user_role');
@endphp

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Dashboard | RSHP Universitas Airlangga')</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

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

    header {
      text-align: center;
      color: #fff;
      background-color: var(--primary);
      padding: 12px 0;
      font-weight: 600;
      letter-spacing: 0.5px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    nav {
      background-color: var(--secondary);
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

    main {
      flex: 1;
      padding: 30px 20px;
      background-color: var(--accent);
    }

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
  </style>
</head>

<body>

<header>
  <h1>Dashboard RSHP Universitas Airlangga</h1>
</header>

<nav>
  <ul>
      <li>
        @if($role == 1)
          <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        @elseif($role == 2)
          <a href="{{ route('dokter.dashboard') }}" class="{{ request()->routeIs('dokter.dashboard') ? 'active' : '' }}">
        @elseif($role == 3)
          <a href="{{ route('perawat.dashboard') }}" class="{{ request()->routeIs('perawat.dashboard') ? 'active' : '' }}">
        @elseif($role == 4)
          <a href="{{ route('resepsionis.dashboard') }}" class="{{ request()->routeIs('resepsionis.dashboard') ? 'active' : '' }}">
        @elseif($role == 5)
          <a href="{{ route('pemilik.dashboard') }}" class="{{ request()->routeIs('pemilik.dashboard') ? 'active' : '' }}">
        @else
          <a href="#">
        @endif
          <i class="bi bi-speedometer2"></i> Dashboard
        </a>
      </li>

      <li>
        <a href="#"
           class="text-danger"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
           <i class="bi bi-box-arrow-right"></i> Logout
        </a>
      </li>
  </ul>
</nav>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
  @csrf
</form>

<main>
  @yield('content')
</main>

<footer>
  <p>Untuk informasi lebih lanjut, kunjungi <a href="https://www.unair.ac.id" target="_blank">www.unair.ac.id</a></p>
  <p>Telp. (031) 5992785, 5993016 | Fax. (031) 5993015</p>
  <p>Email: info@fkh.unair.ac.id</p>
  <p>Alamat: Kampus C Mulyorejo, Surabaya 60115</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
