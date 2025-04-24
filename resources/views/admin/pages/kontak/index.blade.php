@extends('layouts.app')
@section('content')
    <div class="row mb-2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-5">Kontak</h4>
                    <form action="{{ route('admin.kontak.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class='form-group mb-3'>
                            <label for='no_telepon' class='mb-2'>Nomor Telepon <span class='text-danger'>*</span></label>
                            <input type='text' name='no_telepon' id='no_telepon'
                                class='form-control @error('no_telepon') is-invalid @enderror'
                                value='{{ $item->no_telepon ?? old('no_telepon') }}'>
                            @error('no_telepon')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='email' class='mb-2'>Email <span class='text-danger'>*</span></label>
                            <input type='text' name='email' id='email'
                                class='form-control @error('email') is-invalid @enderror'
                                value='{{ $item->email ?? old('email') }}'>
                            @error('email')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='instagram' class='mb-2'>Instagram <span class='text-danger'>*</span></label>
                            <input type='text' name='instagram' id='instagram'
                                class='form-control @error('instagram') is-invalid @enderror'
                                value='{{ $item->instagram ?? old('instagram') }}'>
                            @error('instagram')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='whatsapp' class='mb-2'>Whatsapp <span class='text-danger'>*</span></label>
                            <input type='text' name='whatsapp' id='whatsapp'
                                class='form-control @error('whatsapp') is-invalid @enderror'
                                value='{{ $item->whatsapp ?? old('whatsapp') }}'>
                            @error('whatsapp')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group text-right">
                            <button class="btn btn-info">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-5">Alamat</h4>
                    <form action="{{ route('admin.kontak.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class='form-group mb-3'>
                            <label for='alamat' class='mb-2'>Alamat <span class='text-danger'>*</span></label>
                            <textarea name='alamat' id='alamat' cols='30' rows='3'
                                class='form-control @error('alamat') is-invalid @enderror'>{{ $item->alamat ?? old('alamat') }}</textarea>
                            @error('alamat')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group text-right">
                            <button class="btn btn-info">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
