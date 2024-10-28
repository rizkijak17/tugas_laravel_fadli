<!DOCTYPE html>
<html>
<head>
    <title>Aplikasi Manajemen Proyek</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <header>
        <h1>Aplikasi Manajemen Proyek</h1>
        <div id="notification-bell">
            <span id="notification-count">{{ $notificationsCount ?? 0 }}</span> <!-- Menampilkan jumlah notifikasi -->
            <a href="{{ route('notifications.index') }}">
                <img src="{{ asset('images/bell-icon.png') }}" alt="Notifikasi" />
            </a>
        </div>
        <form method="GET" action="{{ route('projects.search') }}">
            <input type="text" name="search" placeholder="Cari proyek">
            <button type="submit">Cari</button>
        </form>
    </header>
    <div class="content">
        @yield('content')
    </div>
</body>
</html>
