@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $book->judul }}</h1>
    <p><strong>Penulis:</strong> {{ $book->penulis }}</p>
    <p><strong>Penerbit:</strong> {{ $book->penerbit }}</p>
    <p><strong>Tahun Terbit:</strong> {{ $book->tahun_terbit }}</p>
    <p><strong>Kategori:</strong> {{ $book->kategori ? $book->kategori->name : '-' }}</p>
    <p><strong>Status:</strong> {{ $book->status }}</p>
    <p><strong>Uraian:</strong> {{ $book->uraian }}</p>

    @if($book->gambar)
        <img src="{{ Storage::url($book->gambar) }}" alt="Gambar Buku" width="200">
    @endif

    @if($book->pdf)
        <div style="display: flex;">
            <iframe src="{{ Storage::url($book->pdf) }}" width="100%" height="600px"></iframe>
        </div>
    @endif
</div>
@endsection
