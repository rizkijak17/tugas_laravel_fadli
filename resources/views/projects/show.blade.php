<!-- resources/views/projects/show.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Detail Proyek</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> <!-- Tambahkan link ke CSS -->
</head>
<body>
    <header>
        <h1>{{ $project->name }}</h1>
    </header>
    <div class="content">
        <p>{{ $project->description }}</p>
        <p>Selesai pada: {{ $project->due_date }}</p>

        <h2>Tugas</h2>
        <ul>
            @foreach ($project->tasks as $task)
                <li>{{ $task->title }} - Status: {{ $task->status }}</li>
            @endforeach
        </ul>

        <h3>Tambah Tugas</h3>
        <form method="POST" action="{{ route('tasks.store', $project) }}">
            @csrf
            <div class="form-group">
                <label>Judul:</label>
                <input type="text" name="title" required>
            </div>

            <div class="form-group">
                <label>Status:</label>
                <select name="status">
                    <option value="pending">Pending</option>
                    <option value="in_progress">In Progress</option>
                    <option value="completed">Completed</option>
                </select>
            </div>

            <div class="form-group">
                <label>Tanggal Selesai:</label>
                <input type="date" name="due_date" required>
            </div>

            <button type="submit">Tambah Tugas</button>
        </form>
    </div>
</body>
</html>
