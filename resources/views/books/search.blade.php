@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <!-- Form Pencarian -->
            <form class="d-flex mb-4" id="search-form" method="GET" action="{{ route('books.search') }}">
                <div class="input-group" style="max-width: 600px; margin: 0 auto;">
                    <div id="search-autocomplete" class="form-outline">
                        <input type="search" id="search" class="form-control" name="query" placeholder="Silahkan cari buku Anda di sini" aria-label="Search" value="{{ request('query') }}" />
                        <label class="form-label" for="search">Search</label>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>

            <!-- Row untuk card box dan PDF viewer -->
            <div class="row">
                <!-- Card box untuk hasil pencarian -->
                <div class="col-md-4">
                    <div class="card bg-light shadow-lg border-0 table-responsive" style="width: 100%; overflow-x: auto; margin-top: 1rem;">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <span class="fs-4">Hasil Pencarian</span>
                            <button id="close-preview-search" class="btn btn-danger btn-sm">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        <div class="card-body" style="padding: 1rem; max-height: 80vh; overflow-y: auto;">
                            <!-- Tempat untuk menampilkan hasil pencarian -->
                            <div id="result">
                                @include('partials.search_results', ['books' => $books])
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tempat untuk menampilkan PDF di sebelah kanan -->
                <div class="col-md-8">
                    <div id="pdf-preview-card" class="card bg-light shadow-lg border-0" style="width: 100%; height: 60vh; margin-top: 1rem; display: none;">
                        <div class="card-header fs-4 d-flex justify-content-between align-items-center">
                            Preview PDF
                            <div>
                                <button id="fullscreen-toggle" class="btn btn-secondary btn-sm" disabled>
                                    <i class="fas fa-expand"></i>
                                </button>
                                <button id="close-preview-pdf" class="btn btn-danger btn-sm">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body d-flex align-items-center justify-content-center" style="height: 100%;">
                            <iframe id="pdf-viewer" src="" style="width: 100%; height: 100%;" frameborder="0"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tambahkan CDN untuk MDB UI Kit, FontAwesome, ePub.js, dan JSZip -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.5/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/epub.js/0.3.88/epub.min.js"></script>

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

        // Event listener untuk tombol "Lihat" untuk PDF
        $(document).on('click', '.view-pdf', function(event){
            event.preventDefault();
            let pdfUrl = $(this).data('pdf-url');
            $('#pdf-viewer').attr('src', pdfUrl);
            $('#pdf-preview-card').show(); // Tampilkan card preview
            $('#fullscreen-toggle').prop('disabled', false); // Enable fullscreen button when PDF is loaded
        });

        // Event listener untuk tombol close preview PDF
        $(document).on('click', '#close-preview-pdf', function() {
            $('#pdf-preview-card').hide(); // Sembunyikan card preview PDF
            $('#pdf-viewer').attr('src', ''); // Kosongkan src iframe
            $('#fullscreen-toggle').prop('disabled', true); // Disable fullscreen button
        });

        // Event listener untuk tombol close preview search results
        $(document).on('click', '#close-preview-search', function() {
            $('#result').empty(); // Kosongkan hasil pencarian
            $('#search').val(''); // Kosongkan input pencarian
        });

        // Event listener untuk tombol full screen untuk PDF
        $('#fullscreen-toggle').on('click', function() {
            let iframe = $('#pdf-viewer')[0];
            if (iframe.requestFullscreen) {
                iframe.requestFullscreen();
            } else if (iframe.mozRequestFullScreen) { // Firefox
                iframe.mozRequestFullScreen();
            } else if (iframe.webkitRequestFullscreen) { // Chrome, Safari and Opera
                iframe.webkitRequestFullscreen();
            } else if (iframe.msRequestFullscreen) { // IE/Edge
                iframe.msRequestFullscreen();
            }
        });

        // Event listener untuk keluar dari full screen
        $(document).on('fullscreenchange mozfullscreenchange webkitfullscreenchange msfullscreenchange', function () {
            if (!document.fullscreenElement && !document.mozFullScreenElement && !document.webkitFullscreenElement && !document.msFullscreenElement) {
                $('#fullscreen-toggle').html('<i class="fas fa-expand"></i>');
            } else {
                $('#fullscreen-toggle').html('<i class="fas fa-compress"></i>');
            }
        });

        // Event listener untuk tombol "Lihat" untuk EPUB
        $(document).on('click', '.view-epub', function(event){
            event.preventDefault();
            let epubUrl = $(this).data('epub-url');
            var book = ePub(epubUrl);
            var rendition = book.renderTo("area", { width: "100%", height: "100%" });
            rendition.display();
            $('#pdf-preview-card').hide(); // Sembunyikan card PDF preview jika ada
            $('#epub-preview-card').show(); // Tampilkan card preview EPUB
            $('#fullscreen-toggle').prop('disabled', false); // Enable fullscreen button when EPUB is loaded
        });

        // Event listener untuk tombol full screen untuk EPUB
        $('#fullscreen-toggle').on('click', function() {
            let area = $('#area')[0];
            if (area.requestFullscreen) {
                area.requestFullscreen();
            } else if (area.mozRequestFullScreen) { // Firefox
                area.mozRequestFullScreen();
            } else if (area.webkitRequestFullscreen) { // Chrome, Safari and Opera
                area.webkitRequestFullscreen();
            } else if (area.msRequestFullscreen) { // IE/Edge
                area.msRequestFullscreen();
            }
        });

        // Event listener untuk keluar dari full screen
        $(document).on('fullscreenchange mozfullscreenchange webkitfullscreenchange msfullscreenchange', function () {
            if (!document.fullscreenElement && !document.mozFullScreenElement && !document.webkitFullscreenElement && !document.msFullscreenElement) {
                $('#fullscreen-toggle').html('<i class="fas fa-expand"></i>');
            } else {
                $('#fullscreen-toggle').html('<i class="fas fa-compress"></i>');
            }
        });
    });
</script>

<!-- CSS untuk Menyelaraskan Card Box -->
<style>
    /* CSS untuk menyelaraskan card box hasil pencarian ke tengah */
    .card-search-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
    }

    #pdf-preview-card {
        transition: margin-left 0.5s; /* Transisi halus untuk pergeseran card preview */
    }

    .shift-left {
        margin-left: 0; /* Posisi normal card preview */
    }

    .shift-right {
        margin-left: -100%; /* Geser card preview ke kiri (di luar tampilan) */
    }
</style>
@endsection
