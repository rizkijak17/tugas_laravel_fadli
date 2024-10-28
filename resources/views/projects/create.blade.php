<!-- resources/views/projects/create.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Proyek</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> <!-- Tambahkan link ke CSS -->
</head>
<body>
    <header>
        <h1>Tambah Proyek</h1>
    </header>
    <div class="content">
        <form method="POST" action="{{ route('projects.store') }}">
            @csrf
            <div class="form-group">
                <label>Nama:</label>
                <input type="text" name="name" required>
            </div>

            <div class="form-group">
                <label>Deskripsi:</label>
                <textarea name="description"></textarea>
            </div>

            <div class="form-group">
                <label>Tanggal Selesai:</label>
                <input type="date" name="due_date" required>
            </div>

            <button type="submit" class="add-task-button">Simpan</button> <!-- Tambahkan kelas untuk styling -->
        </form>
    </div>
</body>
</html>
