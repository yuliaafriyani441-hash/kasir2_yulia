@extends('adminlte::page')

@section('title', 'Edit Jurusan')

@section('content_header')
    <h1>Edit Jurusan</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('jurusan.update', $jurusan->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nama_jurusan">Nama Jurusan</label>
                    <input type="text" name="nama_jurusan" class="form-control" id="nama_jurusan" value="{{ $jurusan->nama_jurusan }}" required>
                </div>

                <div class="form-group">
                    <label for="nis">Nis</label>
                    <input type="text" name="nis" class="form-control" id="nis" value="{{ $jurusan->nis }}" required>
                </div>

                <div class="form-group">
                    <label for="jurusan">Jurusan</label>
                    <input type="text" name="jurusan" class="form-control" id="jurusan" value="{{ $jurusan->jurusan }}">
                </div>

                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <input type="text" name="kelas" class="form-control" id="kelas" value="{{ $jurusan->kelas }}">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" value="{{ $jurusan->email }}">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('jurusan.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@stop