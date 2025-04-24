@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-5">Edit Pemasukan</h4>
                    <form action="{{ route('admin.pemasukan.update', $item->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class='form-group mb-3'>
                            <label for='tanggal' class='mb-2'>Tanggal <span class='text-danger'>*</span></label>
                            <input type='date' name='tanggal' id='tanggal'
                                class='form-control @error('tanggal') is-invalid @enderror'
                                value='{{ $item->tanggal ?? old('tanggal') }}'>
                            @error('tanggal')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group'>
                            <label for='kategori'>Kategori <span class='text-danger'>*</span></label>
                            <select name='kategori' id='kategori'
                                class='form-control @error('kategori') is-invalid @enderror'>
                                <option value='' selected disabled>Pilih Kategori</option>
                                <option value="TRIM 1">TERM 1</option>
                                <option value="TRIM 2">TERM 2</option>
                                <option value="TRIM 3">TERM 3</option>
                            </select>
                            @error('kategori')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='uraian' class='mb-2'>Uraian <span class='text-danger'>*</span></label>
                            <textarea name='uraian' id='uraian' cols='30' rows='3'
                                class='form-control @error('uraian') is-invalid @enderror'>{{ $item->uraian ?? old('uraian') }}</textarea>
                            @error('uraian')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='jumlah' class='mb-2'>Jumlah <span class='text-danger'>*</span></label>
                            <input type='number' name='jumlah' id='jumlah'
                                class='form-control @error('jumlah') is-invalid @enderror'
                                value='{{ $item->jumlah ?? old('jumlah') }}'>
                            @error('jumlah')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group text-right">
                            <a href="{{ route('admin.pemasukan.index') }}" class="btn btn-warning">Batal</a>
                            <button class="btn btn-primary">Update Pemasukan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
