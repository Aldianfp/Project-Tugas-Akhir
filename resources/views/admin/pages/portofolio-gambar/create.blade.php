@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-5">Tambah Gambar</h4>
                    <form
                        action="{{ route('admin.portofolio-gambar.store', [
                            'portofolio_id' => request('portofolio_id'),
                        ]) }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        <div class='form-group mb-3'>
                            <label for='gambar' class='mb-2'>Gambar <span class='font-italic'>(Dapat dipilih lebih dari
                                    1)</span></label>
                            <input type='file' name='gambar[]' multiple id='gambar'
                                class='form-control @error('gambar') is-invalid @enderror' value='{{ old('gambar') }}'>
                            @error('gambar')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group text-right">
                            <a href="{{ route('admin.portofolio-gambar.index', [
                                'portofolio_id' => request('portofolio_id'),
                            ]) }}"
                                class="btn btn-warning">Batal</a>
                            <button class="btn btn-primary">Tambah Gambar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
