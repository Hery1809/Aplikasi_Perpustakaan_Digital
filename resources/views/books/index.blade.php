@extends('layouts.master')

@section('title', 'Daftar Buku')
@section('books', 'active')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
<!-- SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<div class="content">
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Daftar Buku</h3>
                    <div class="float-right">
                        <a href="{{ route('books.create') }}" class="btn btn-success">
                            <i class="fas fa-plus"></i> <!-- Icon from Font Awesome -->
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Penerbit</th>
                                <th>Tahun Terbit</th>
                                <th>Gambar</th>
                                <th>PDF</th>
                                <th>Kategori</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data akan diisi oleh DataTables -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
<script type="text/javascript">
    $(function () {
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('books.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'judul', name: 'judul'},
                {data: 'penulis', name: 'penulis'},
                {data: 'penerbit', name: 'penerbit'},
                {data: 'tahun_terbit', name: 'tahun_terbit'},
                {data: 'gambar', name: 'gambar', render: function (data) {
                    return data ? '<img src="{{ asset('storage/') }}/' + data + '" alt="Gambar Buku" style="max-width: 50px;">' : '-';
                }},
                {data: 'pdf', name: 'pdf', render: function (data) {
                    return data ? '<a href="{{ asset('storage/') }}/' + data + '" target="_blank">Download PDF</a>' : '-';
                }},
                {data: 'kategori', name: 'kategori'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ],
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.4/i18n/id.json'  // Bahasa Indonesia
            }
        });

        // SweetAlert2 untuk konfirmasi hapus
        $(document).on('click', '.delete-btn', function (e) {
            e.preventDefault();
            var form = $(this).closest('form');
            var action = form.attr('action');
            var title = $(this).data('title') || 'Yakin ingin menghapus?';
            var text = $(this).data('text') || 'Data ini akan dihapus secara permanen.';

            Swal.fire({
                title: title,
                text: text,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
@endsection
