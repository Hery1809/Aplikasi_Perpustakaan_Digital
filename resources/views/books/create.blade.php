@extends('layouts.master')

@section('title', 'Tambah Buku')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Tambah Buku</div>

                    <div class="card-body">
                        <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data" id="form-tambah-buku">
                            @csrf

                            <div class="form-group">
                                <label for="judul">Judul:</label>
                                <input type="text" name="judul" id="judul" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="penulis">Penulis:</label>
                                <input type="text" name="penulis" id="penulis" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="penerbit">Penerbit:</label>
                                <input type="text" name="penerbit" id="penerbit" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="tahun_terbit">Tahun Terbit:</label>
                                <input type="number" name="tahun_terbit" id="tahun_terbit" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="kategori">Kategori Buku:</label>
                                <select name="kategori" id="kategori" class="form-control">
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="status">Status:</label>
                                <select name="status" id="status" class="form-control" required>
                                    <option value="">Pilih Status</option>
                                    <option value="public">Public</option>
                                    <option value="private">Private</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="gambar">Gambar:</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="gambar" id="gambar" class="custom-file-input" accept="image/*">
                                        <label class="custom-file-label" for="gambar">File Gambar</label>
                                    </div>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button">Upload</button>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="pdf">PDF:</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="pdf" id="pdf" class="custom-file-input" accept=".pdf">
                                        <label class="custom-file-label" for="pdf">File PDF</label>
                                    </div>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button">Upload</button>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="uraian">Uraian:</label>
                                <textarea name="uraian" id="uraian" class="form-control" rows="3"></textarea>
                            </div>

                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary" id="btn-tambah-data-buku">Simpan</button>
                                <a href="{{ route('books.index') }}" class="btn btn-secondary">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include SweetAlert2 library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Script to display SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const formTambahBuku = document.getElementById('form-tambah-buku');

            formTambahBuku.addEventListener('submit', function(event) {
                event.preventDefault(); // Hindari submit default

                // Buat FormData untuk mengirim data file
                const formData = new FormData(formTambahBuku);

                axios.post(formTambahBuku.action, formData)
                    .then(response => {
                        // Tampilkan SweetAlert2 dengan pesan sukses
                        Swal.fire({
                            icon: 'success',
                            title: 'Data Berhasil Disimpan',
                            showConfirmButton: false,
                            timer: 1500 // Durasi tampilan SweetAlert2 dalam milidetik
                        });

                        // Redirect atau lakukan tindakan lain setelah berhasil disimpan
                        setTimeout(() => {
                            window.location.href = "{{ route('books.index') }}";
                        }, 1500); // Menunggu 1,5 detik sebelum redirect
                    })
                    .catch(error => {
                        // Handle error jika ada
                        console.error('Error:', error);
                    });
            });
        });
    </script>
@endsection
