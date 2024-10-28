<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Menampilkan daftar tugas untuk proyek tertentu
    public function index(Project $project)
    {
        $tasks = $project->tasks;

        // Hitung jumlah notifikasi
        $notificationsCount = Task::whereIn('status', ['pending', 'in_progress'])->count();

        // Hitung jumlah tugas berdasarkan status
        $pendingCount = $tasks->where('status', 'pending')->count();
        $inProgressCount = $tasks->where('status', 'in_progress')->count();
        $completedCount = $tasks->where('status', 'completed')->count();

        return view('tasks.index', compact('project', 'tasks', 'notificationsCount', 'pendingCount', 'inProgressCount', 'completedCount'));
    }

    // Menampilkan form untuk membuat tugas baru
    public function create(Project $project)
    {
        return view('tasks.create', compact('project'));
    }

    // Menyimpan tugas baru ke database
    public function store(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required|in:pending,in_progress,completed',
            'due_date' => 'required|date',
        ]);

        $project->tasks()->create($request->all());
        return redirect()->route('tasks.index', $project->id)->with('success', 'Tugas berhasil dibuat.');
    }

    // Menampilkan tugas spesifik
    public function show(Project $project, Task $task)
    {
        return view('tasks.show', compact('project', 'task'));
    }

    // Menampilkan form untuk mengedit tugas
    public function edit(Project $project, Task $task)
    {
        return view('tasks.edit', compact('project', 'task'));
    }

    // Mengupdate tugas yang ada di database
    public function update(Request $request, Project $project, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required|in:pending,in_progress,completed',
            'due_date' => 'required|date',
        ]);

        $task->update($request->all());
        return redirect()->route('tasks.index', $project->id)->with('success', 'Tugas berhasil diperbarui.');
    }

    // Menghapus tugas dari database
    public function destroy(Project $project, Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index', $project->id)->with('success', 'Tugas berhasil dihapus.');
    }
}
