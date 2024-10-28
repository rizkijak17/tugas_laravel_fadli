<!-- resources/views/projects/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Proyek</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <header>
        <h1>Aplikasi Manajemen Proyek</h1>
        <div id="notification-bell">
            <span id="notification-count">{{ $notificationsCount }}</span>
            <a href="{{ route('notifications.index') }}">
                <img src="{{ asset('images/bell-icon.png') }}" alt="Notifikasi" />
            </a>
        </div>
        <form method="GET" action="{{ route('projects.search') }}">
            <input type="text" name="search" placeholder="Cari proyek" value="{{ request('search') }}">
            <button type="submit">Cari</button>
        </form>
    </header>

    <h1>Daftar Proyek</h1>
    <a href="{{ route('projects.create') }}">Tambah Proyek</a>
    <ul>
        @if ($projects->isEmpty())
            <li>Tidak ada proyek yang ditemukan.</li>
        @else
            @foreach ($projects as $project)
                <li>
                    <a href="{{ route('projects.show', $project) }}">{{ $project->name }}</a>
                    - <a href="{{ route('tasks.index', $project->id) }}">Lihat Tugas</a>
                </li>
            @endforeach
        @endif
    </ul>
</body>
</html>
