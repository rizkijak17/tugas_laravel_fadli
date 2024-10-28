@extends('layouts.app')

@section('content')
<h1>Daftar Tugas untuk Proyek: {{ $project->name }}</h1>
<a href="{{ route('tasks.create', $project->id) }}">Tambah Tugas</a>

<ul>
    @foreach ($tasks as $task)
    <li>
        {{ $task->title }} - Status: {{ $task->status }}
        <a href="{{ route('tasks.edit', [$project->id, $task->id]) }}">Edit</a>
        <form action="{{ route('tasks.destroy', [$project->id, $task->id]) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Hapus</button>
        </form>
    </li>
    @endforeach
</ul>

<h2>Statistik Tugas</h2>
<div style="display: flex; justify-content: center; align-items: center; width: 50%; height: 400px; margin: 0 auto;">
    <canvas id="tasksChart" style="width: 100%; height: 100%;"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('tasksChart').getContext('2d');
    const tasksData = {
        labels: ['Pending', 'In Progress', 'Completed'],
        datasets: [{
            label: 'Jumlah Tugas',
            data: [
                {{ $pendingCount }},
                {{ $inProgressCount }},
                {{ $completedCount }}
            ],
            backgroundColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(75, 192, 192, 1)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(75, 192, 192, 1)'
            ],
            borderWidth: 1
        }]
    };

    const tasksChart = new Chart(ctx, {
        type: 'pie',
        data: tasksData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: true
                }
            }
        }
    });
</script>
@endsection
