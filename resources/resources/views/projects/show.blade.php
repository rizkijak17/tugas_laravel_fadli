<!-- resources/views/projects/show.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Detail Proyek</title>
</head>
<body>
    <h1>{{ $project->name }}</h1>
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
        <label>Judul:</label>
        <input type="text" name="title" required>
        
        <label>Status:</label>
        <select name="status">
            <option value="pending">Pending</option>
            <option value="in_progress">In Progress</option>
            <option value="completed">Completed</option>
        </select>
        
        <label>Tanggal Selesai:</label>
        <input type="date" name="due_date" required>
        
        <button type="submit">Tambah Tugas</button>
    </form>
</body>
</html>
