<!-- Tampilkan hasil pencarian dalam tabel -->
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
            @if ($books->isEmpty())
                <tr>
                    <td colspan="4">Buku dengan kata kunci "{{ request('query') }}" tidak ditemukan.</td>
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

<!-- Tempat untuk menampilkan pagination -->
<div id="pagination">
    {{ $books->links() }}
</div>
