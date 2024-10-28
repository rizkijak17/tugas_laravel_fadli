<!-- resources/views/projects/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Proyek</title>
</head>
<body>
    <h1>Daftar Proyek</h1>

    <!-- Form Pencarian -->
    <form method="GET" action="{{ route('projects.search') }}">
        <input type="text" name="search" placeholder="Cari proyek">
        <button type="submit">Cari</button>
    </form>

    <!-- Link Tambah Proyek -->
    <a href="{{ route('projects.create') }}">Tambah Proyek</a>

    <!-- Daftar Proyek -->
    <ul>
        @foreach ($projects as $project)
            <li><a href="{{ route('projects.show', $project) }}">{{ $project->name }}</a></li>
        @endforeach
    </ul>
</body>
</html>
