@extends('layouts.master')

@section('title', 'Daftar Buku')
@section('books','active')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
<div class="content">
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Daftar Buku</h3>
                    <form action="{{ route('books.index') }}" method="GET" class="form-inline ml-auto">
                        <div class="input-group">
                            <label for="search" class="mr-2">Search:</label>
                            <input type="text" name="search" id="search" class="form-control" placeholder="Cari judul buku..." value="{{ request('search') }}">
                            <div class="input-group-append">
                            </div>
                        </div>
                    </form>
                    <div class="float-right">
                        <a href="{{ route('books.create') }}" class="btn btn-success">
                            <i class="fas fa-plus"></i> <!-- Icon from Font Awesome -->
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <!-- Tambahkan bagian pagination di atas tabel -->
                    <div class="card-footer">
                        <div class="d-flex justify-content-left">
                            {{ $books->links() }}
                        </div>
                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Penerbit</th>
                                <th>Tahun Terbit</th>
                                <th>Gambar</th>
                                <th>PDF</th>
                                <th>Kategori</th> <!-- Tambah kolom Kategori -->
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                            <tr>
                                <td>{{ $book->judul }}</td>
                                <td>{{ $book->penulis }}</td>
                                <td>{{ $book->penerbit }}</td>
                                <td>{{ $book->tahun_terbit }}</td>
                                <td>
                                    @if ($book->gambar)
                                        <img src="{{ asset('storage/' . $book->gambar) }}" alt="Gambar Buku" style="max-width: 50px;">
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @if ($book->pdf)
                                        <a href="{{ asset('storage/' . $book->pdf) }}" target="_blank">Download PDF</a>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $book->kategori->name }}</td> <!-- Menampilkan nama kategori -->
                                <td>{{ $book->status }}</td>
                                <td>
                                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus buku ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
