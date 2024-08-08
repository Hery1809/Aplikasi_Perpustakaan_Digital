<!-- Tampilkan hasil pencarian dalam tabel -->
<div class="table-responsive">
    <table class="table table-dark table-sm">
        <thead>
            <tr>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if ($books->isEmpty())
                {{-- <tr>
                    <td colspan="5">Buku dengan kata kunci "{{ request('query') }}" tidak ditemukan.</td>
                </tr> --}}
            @else
                @foreach($books as $book)
                    <tr>
                        <td>
                            @if($book->gambar)
                                <img src="{{ asset('storage/' . $book->gambar) }}" alt="Gambar Buku" class="img-thumbnail" style="width: 100px; height: 100px;">
                            @else
                                <img src="https://via.placeholder.com/100" alt="Placeholder Image" class="img-thumbnail" style="width: 100px; height: 100px;">
                            @endif
                        </td>
                        <td>{{ $book->judul }}</td>
                        <td>{{ $book->penulis }}</td>
                        <td>{{ $book->kategori->name }}</td>
                        <td>
                            <a href="#" class="btn btn-primary view-pdf" data-pdf-url="{{ asset('storage/' . $book->pdf) }}">Lihat</a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>

<!-- Tempat untuk menampilkan pagination -->
{{-- <div id="pagination">
    {{ $books->links() }}
</div> --}}
