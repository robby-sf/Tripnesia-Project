@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h1>Data Event</h1>
    <a href="{{ route('admin.event.create') }}" class="btn btn-primary mb-3">Tambah Event</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Slug</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
                <tr>
                    <td>{{ $event->judul }}</td>
                    <td>{{ $event->slug }}</td>
                    <td>{{ Str::limit($event->deskripsi, 50) }}</td>
                    <td><img src="{{ asset('storage/' . $event->gambar) }}" width="100"></td>
                    <td>
                        <a href="{{ route('admin.event.edit', $event->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.event.destroy', $event->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin hapus event ini?')" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
