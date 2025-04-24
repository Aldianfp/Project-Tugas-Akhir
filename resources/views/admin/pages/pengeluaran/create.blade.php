@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-5">Tambah Pengeluaran</h4>
                    <form action="{{ route('admin.pengeluaran.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class='form-group'>
                            <label for='proyek_id'>Proyek <span class='text-danger'>*</span></label>
                            <select name='proyek_id' id='proyek_id'
                                class='form-control @error('proyek_id') is-invalid @enderror'>
                                <option value='' selected disabled>Pilih Proyek</option>
                                @foreach ($proyeks as $proyek)
                                    <option @selected($proyek->id == old('proyek_id')) value='{{ $proyek->id }}'>{{ $proyek->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('proyek_id')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        {{-- <div class='form-group mb-3'>
                            <label for='kode' class='mb-2'>Kode <span class='text-danger'>*</span></label>
                            <input type='text' name='kode' id='kode'
                                class='form-control @error('kode') is-invalid @enderror' value='{{ old('kode') }}'>
                            @error('kode')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div> --}}
                        <div class='form-group mb-3'>
                            <label for='tanggal' class='mb-2'>Tanggal <span class='text-danger'>*</span></label>
                            <input type='date' name='tanggal' id='tanggal'
                                class='form-control @error('tanggal') is-invalid @enderror' value='{{ old('tanggal') }}'>
                            @error('tanggal')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class='form-group mb-3'>
                            <label for='uraian' class='mb-2'>Uraian <span class='text-danger'>*</span></label>
                            <textarea name='uraian' id='uraian' cols='30' rows='3'
                                class='form-control @error('uraian') is-invalid @enderror'>{{ old('uraian') }}</textarea>
                            @error('uraian')
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
                        <div class="form-group text-right">
                            <a href="{{ route('admin.pengeluaran.index') }}" class="btn btn-warning">Batal</a>
                            <button class="btn btn-info">Tambah Pengeluaran</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
