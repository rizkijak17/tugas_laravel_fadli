<!-- resources/views/tasks/edit.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Edit Tugas</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> <!-- Tambahkan link CSS jika diperlukan -->
</head>
<body>
    <h1>Edit Tugas: {{ $task->title }}</h1>

    <!-- Notifikasi -->
    @if (session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div style="color: red;">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="{{ route('tasks.update', [$project->id, $task->id]) }}">
        @csrf
        @method('PUT')
        <input type="text" name="title" value="{{ $task->title }}" required>
        <select name="status" required>
            <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
            <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
        </select>
        <input type="date" name="due_date" value="{{ $task->due_date }}" required>
        <button type="submit">Update Tugas</button>
    </form>
    
    <a href="{{ route('tasks.index', $project->id) }}">Kembali</a>
</body>
</html>
