<?php

namespace App\Http\Controllers;

use App\Models\Task; // Pastikan model Task diimpor
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        // Ambil semua tugas dengan status pending dan in_progress
        $pendingTasks = Task::where('status', 'pending')->get();
        $inProgressTasks = Task::where('status', 'in_progress')->get();

        // Gabungkan notifikasi
        $notifications = [];

        foreach ($pendingTasks as $task) {
            $notifications[] = [
                'title' => $task->title,
                'status' => 'pending',
                'due_date' => $task->due_date // Menyertakan tanggal tenggat
            ];
        }

        foreach ($inProgressTasks as $task) {
            $notifications[] = [
                'title' => $task->title,
                'status' => 'in_progress'
            ];
        }

        // Hitung jumlah notifikasi
        $notificationsCount = count($notifications);

        return view('notifications.index', compact('notifications', 'notificationsCount'));
    }
}
