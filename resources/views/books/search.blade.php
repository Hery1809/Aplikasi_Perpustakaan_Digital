@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-light shadow-lg border-0 p-4"> <!-- Card box besar dengan border dan shadow -->
                <div class="card-header fs-4">Pencarian Buku</div> <!-- Mengubah ukuran font header -->

                <div class="card-body">
                    <!-- Form Pencarian -->
                    <form class="d-flex mb-4" id="search-form" method="GET" action="{{ route('books.search') }}">
                        <div class="input-group w-100"> <!-- Membuat form autocomplete penuh -->
                            <div id="search-autocomplete" class="form-outline w-100" data-mdb-input-init>
                                <input type="search" id="search" class="form-control" name="query" placeholder="Silahkan cari buku Anda di sini" aria-label="Search" value="{{ $searchQuery }}" />
                                <label class="form-label" for="search">Search</label>
                            </div>
                            <button type="submit" class="btn btn-primary" data-mdb-ripple-init>
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>

                    <!-- Tempat untuk menampilkan hasil pencarian -->
                    <div id="result">
                        @if(isset($searchQuery))
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
                                        @forelse($books as $book)
                                            <tr>
                                                <td>{{ $book->judul }}</td>
                                                <td>{{ $book->penulis }}</td>
                                                <td>{{ $book->kategori->name }}</td>
                                                <td>
                                                    <a href="{{ route('books.show', $book->id) }}" class="btn btn-primary">Lihat</a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center">Buku dengan kata kunci "{{ $searchQuery }}" tidak ditemukan.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <!-- Tempat untuk menampilkan pagination -->
                            <div id="pagination">
                                {{ $books->links() }}
                            </div>
                        @else
                            <p>Silahkan cari buku Anda di sini.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tambahkan CDN untuk MDB UI Kit dan FontAwesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<!-- Tambahkan CDN untuk MDB UI Kit JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>

<!-- Tambahkan CDN untuk SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Tambahkan CDN untuk jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function(){
        function fetchResults(page) {
            let query = $('#search').val();
            $.ajax({
                url: '{{ route("books.search") }}',
                method: 'GET',
                data: {query: query, page: page},
                success: function(data){
                    $('#result').html(data.results);
                    $('#pagination').html(data.pagination);
                }
            });
        }

        $('#search').on('input', function(){
            fetchResults(1);
        });

        $('#search-form').on('submit', function(event){
            event.preventDefault();
            fetchResults(1);
        });

        $(document).on('click', '.page-link', function(e){
            e.preventDefault();
            let page = $(this).attr('href').split('page=')[1];
            fetchResults(page);
        });
    });
</script>
@endsection
