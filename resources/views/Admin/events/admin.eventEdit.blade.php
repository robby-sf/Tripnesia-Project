@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h1>Edit Event</h1>
    <form action="{{ route('admin.event.update', $event->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="judul">Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ old('judul', $event->judul) }}">
        </div>

        <div class="mb-3">
            <label for="slug">Slug</label>
            <input type="text" name="slug" class="form-control" value="{{ old('slug', $event->slug) }}">
        </div>

        <div class="mb-3">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="5">{{ old('deskripsi', $event->deskripsi) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="gambar">Gambar</label><br>
            <img src="{{ asset('storage/' . $event->gambar) }}" width="150"><br><br>
            <input type="file" name="gambar" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update Event</button>
    </form>
</div>
@endsection
