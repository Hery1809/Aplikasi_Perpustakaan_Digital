@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Pencarian Buku</div>

                    <div class="card-body">
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Silahkan cari buku Anda di sini" aria-label="Search" required>
                            <button class="btn btn-outline-success" type="submit" style="background: none; border: none;"><img src="{{ asset('images\search.png') }}" alt="Search Icon" style="width: 30px; height: 30px;"></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
