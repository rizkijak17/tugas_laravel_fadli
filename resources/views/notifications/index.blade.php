@extends('layouts.app')

@section('content')
<h1>Notifikasi</h1>
<ul>
    @if (empty($notifications))
        <li>Tidak ada notifikasi saat ini.</li>
    @else
        @foreach ($notifications as $notification)
            <li>
                Tugas: {{ $notification['title'] }} - Status: {{ $notification['status'] }}
                @if (isset($notification['due_date']))
                    - Tenggat: {{ $notification['due_date'] }}
                @endif
            </li>
        @endforeach
    @endif
</ul>

<a href="{{ route('projects.index') }}">Kembali</a>
@endsection
