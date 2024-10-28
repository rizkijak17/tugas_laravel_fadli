<!-- resources/views/tasks/create.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Tugas</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> <!-- Tambahkan link ke CSS -->
</head>
<body>
    <header>
        <h1>Tambah Tugas untuk Proyek: {{ $project->name }}</h1>
    </header>
    <div class="content">
        <form action="{{ route('tasks.store', $project->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Judul Tugas:</label>
                <input type="text" name="title" required>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" required>
                    <option value="pending">Pending</option>
                    <option value="in_progress">In Progress</option>
                    <option value="completed">Completed</option>
                </select>
            </div>

            <div class="form-group">
                <label for="due_date">Tanggal Jatuh Tempo:</label>
                <input type="date" name="due_date" required>
            </div>

            <button type="submit">Tambah Tugas</button>
        </form>
    </div>
</body>
</html>
