@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ isset($profilpedagang) ? 'Edit Store Profile' : 'Create Store Profile' }}</div>

                <div class="card-body">
                    @if(isset($profilpedagang))
                        <form method="POST" action="{{ route('profilpedagang.update', $profilpedagang->id) }}" enctype="multipart/form-data">
                        @method('PUT')
                    @else
                        <form method="POST" action="{{ route('profilpedagang.store') }}" enctype="multipart/form-data">
                    @endif
                        @csrf

                        <div class="form-group">
                            <label for="namaToko">Nama Toko</label>
                            <input type="text" class="form-control" id="namaToko" name="namaToko" value="{{ $profilpedagang->namaToko ?? '' }}" required>
                        </div>

                        <div class="form-group">
                            <label for="alamatToko">Alamat Toko</label>
                            <input type="text" class="form-control" id="alamatToko" name="alamatToko" value="{{ $profilpedagang->alamatToko ?? '' }}" required>
                        </div>

                        <div class="form-group">
                            <label for="deskripsiToko">Deskripsi Toko</label>
                            <textarea class="form-control" id="deskripsiToko" name="deskripsiToko" required>{{ $profilpedagang->deskripsiToko ?? '' }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="gambarToko">Gambar Toko</label>
                            <input type="file" class="form-control" id="gambarToko" name="gambarToko" {{ isset($profilpedagang) ? '' : 'required' }}>
                            @if(isset($profilpedagang) && $profilpedagang->gambarToko)
                                <img src="/gambar/{{ $profilpedagang->gambarToko }}" width="100px" class="mt-2">
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary mt-2">{{ isset($profilpedagang) ? 'Update' : 'Submit' }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection