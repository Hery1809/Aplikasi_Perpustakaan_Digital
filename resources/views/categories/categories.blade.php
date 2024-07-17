<!-- resources/views/categories/create.blade.php -->

@extends('layouts.master')

@section('title', 'Tambah Kategori')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tambah Kategori</div>

                <div class="card-body">
                    <form action="{{ route('categories.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="nama">Nama Kategori:</label>
                            <input type="text" name="nama" id="nama" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
