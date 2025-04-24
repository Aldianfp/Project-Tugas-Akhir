@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-5">Tambah Personil</h4>
                    <form action="{{ route('admin.personil.store') }}" method="post" enctype="multipart/form-data">
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
                        <div class='form-group mb-3'>
                            <label for='jabatan' class='mb-2'>Jabatan</label>
                            <textarea name='jabatan' id='jabatan' cols='30' rows='3'
                                class='form-control @error('jabatan') is-invalid @enderror'>{{ old('jabatan') }}</textarea>
                            @error('jabatan')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='gambar' class='mb-2'>Foto <span class='text-danger'>*</span></label>
                            <input type='file' name='gambar' id='gambar'
                                class='form-control @error('gambar') is-invalid @enderror' value='{{ old('gambar') }}'>
                            @error('gambar')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='pid' class='mb-2'>Pilih Kepala Bagan</label>
                            <select name="pid" id="pid" class="form-control">
                                <option value="">Pilih</option>
                                @foreach ($personils as $p)
                                    <option value="<?= $p->id ?>"><?= $p->nama ?></option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group text-right">
                            <a href="{{ route('admin.personil.index') }}" class="btn btn-warning">Batal</a>
                            <button class="btn btn-info">Tambah Personil</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
