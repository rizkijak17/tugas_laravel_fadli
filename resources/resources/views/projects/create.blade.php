<!-- resources/views/projects/create.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Proyek</title>
</head>
<body>
    <h1>Tambah Proyek</h1>
    <form method="POST" action="{{ route('projects.store') }}">
        @csrf
        <label>Nama:</label>
        <input type="text" name="name" required>
        
        <label>Deskripsi:</label>
        <textarea name="description"></textarea>
        
        <label>Tanggal Selesai:</label>
        <input type="date" name="due_date" required>
        
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
