@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-5">Tambah Peralatan</h4>
                    <form action="{{ route('admin.peralatan.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class='form-group mb-3'>
                            <label for='nama' class='mb-2'>Nama <span class='text-danger'>*</span></label>
                            <input type='text' name='nama' class='form-control @error('nama') is-invalid @enderror'
                                value='{{ old('nama') }}'>
                            @error('nama')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group'>
                            <label for='merk_id'>Merk <span class='text-danger'>*</span></label>
                            <select name='merk_id' id='merk_id'
                                class='form-control @error('merk_id') is-invalid @enderror'>
                                <option value='' selected disabled>Pilih Merk</option>
                                @foreach ($merks as $merk)
                                    <option @selected($merk->id == old('merk_id')) value='{{ $merk->id }}'>{{ $merk->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('merk_id')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group'>
                            <label for='type_id'>Type <span class='text-danger'>*</span></label>
                            <select name='type_id' id='type_id'
                                class='form-control @error('type_id') is-invalid @enderror'>
                                <option value='' selected disabled>Pilih Type</option>
                                @foreach ($types as $type)
                                    <option @selected($type->id == old('type_id')) value='{{ $type->id }}'>{{ $type->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('type_id')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='jumlah' class='mb-2'>Jumlah <span class='text-danger'>*</span></label>
                            <input type='number' name='jumlah' id='jumlah'
                                class='form-control @error('jumlah') is-invalid @enderror' value='{{ old('jumlah') }}'>
                            @error('jumlah')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='deskripsi' class='mb-2'>Deskripsi <span class='text-danger'>*</span></label>
                            <textarea name='deskripsi' id='deskripsi' cols='30' rows='3'
                                class='form-control @error('deskripsi') is-invalid @enderror'>{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group text-right">
                            <a href="{{ route('admin.peralatan.index') }}" class="btn btn-warning">Batal</a>
                            <button class="btn btn-info">Tambah Peralatan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
