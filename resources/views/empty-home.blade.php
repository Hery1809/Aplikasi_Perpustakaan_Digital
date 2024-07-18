@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pencarian Buku</div>

                <div class="card-body">
                    <form class="d-flex" action="{{ route('books.search') }}" method="GET">
                        <input class="form-control me-2" type="search" name="query" placeholder="Silahkan cari buku Anda di sini" aria-label="Search" required>
                        <button class="btn btn-outline-success" type="submit" style="background: none; border: none;">
                            <img src="{{ asset('images/search.png') }}" alt="Search Icon" style="width: 30px; height: 30px;">
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pencarian Buku</div>

                <div class="card-body">
                    <form class="d-flex mb-3" action="{{ route('books.search') }}" method="GET">
                        <input class="form-control me-2" type="search" name="query" placeholder="Silahkan cari buku Anda di sini" aria-label="Search" required>
                        <button class="btn btn-outline-success" type="submit" style="background: none; border: none;">
                            <img src="{{ asset('images/search.png') }}" alt="Search Icon" style="width: 30px; height: 30px;">
                        </button>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th>Penulis</th>
                                    <th>Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($searchQuery && $books->isEmpty())
                                    <tr>
                                        <td colspan="4">Buku dengan kata kunci "{{ $searchQuery }}" tidak ditemukan.</td>
                                    </tr>
                                @else
                                    @foreach($books as $book)
                                        <tr>
                                            <td>{{ $book->judul }}</td>
                                            <td>{{ $book->penulis }}</td>
                                            <td>{{ $book->kategori->name }}</td>
                                            <td>
                                                <a href="{{ route('books.show', $book->id) }}" class="btn btn-primary">Lihat</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
