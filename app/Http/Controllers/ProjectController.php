<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // Menampilkan daftar proyek dengan fitur pencarian
    public function index(Request $request)
    {
        $query = Project::query();

        // Cek apakah ada parameter pencarian
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', "%{$search}%");
        }

        // Mengambil proyek bersama dengan tugasnya
        $projects = $query->with('tasks')->get();
        
        // Hitung jumlah notifikasi untuk status pending dan in_progress
        $notificationsCount = Task::whereIn('status', ['pending', 'in_progress'])->count();

        return view('projects.index', compact('projects', 'notificationsCount'));
    }

    // Menampilkan form untuk membuat proyek baru
    public function create()
    {
        return view('projects.create');
    }

    // Menyimpan proyek baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'required|date',
        ]);

        Project::create($request->all());
        return redirect()->route('projects.index')->with('success', 'Proyek berhasil dibuat.');
    }

    // Menampilkan proyek spesifik
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    // Menampilkan form untuk mengedit proyek
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    // Mengupdate proyek yang ada di database
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'required|date',
        ]);

        $project->update($request->all());
        return redirect()->route('projects.index')->with('success', 'Proyek berhasil diperbarui.');
    }

    // Menghapus proyek dari database
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Proyek berhasil dihapus.');
    }

    // Fungsi pencarian proyek
    public function search(Request $request)
    {
        $search = $request->input('search');
        $due_date = $request->input('due_date');

        // Mencari proyek berdasarkan nama dan tanggal
        $query = Project::query();

        if ($search) {
            $query->where('name', 'like', "%$search%");
        }

        if ($due_date) {
            $query->orWhere('due_date', $due_date);
        }

        $projects = $query->get();

        // Hitung jumlah notifikasi untuk status pending dan in_progress
        $notificationsCount = Task::whereIn('status', ['pending', 'in_progress'])->count();

        return view('projects.index', compact('projects', 'notificationsCount'));
    }
}
