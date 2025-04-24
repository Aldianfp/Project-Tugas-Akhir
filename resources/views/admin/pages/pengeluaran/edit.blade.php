@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-5">Edit Pengeluaran</h4>
                    <form action="{{ route('admin.pengeluaran.update', $item->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        {{-- <div class='form-group mb-3'>
                            <label for='proyek' class='mb-2'>Proyek <span class='text-danger'>*</span></label>
                            <input type='text' name='proyek' id='proyek'
                                class='form-control @error('proyek') is-invalid @enderror'
                                value='{{ $item->nama ?? old('proyek') }}' disabled>
                            @error('proyek')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div> --}}

                        <div class='form-group mb-3'>
                            <label for='kode' class='mb-2'>Kode <span class='text-danger'>*</span></label>
                            <input type='text' name='kode' id='kode'
                                class='form-control @error('kode') is-invalid @enderror'
                                value='{{ $item->kode ?? old('kode') }}'>
                            @error('kode')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
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
                        {{-- <div class='form-group mb-3'>
                            <label for='kategori_pengeluaran_id'>Kategori <span class='text-danger'>*</span></label>
                            <select name='kategori_pengeluaran_id' id='kategori_pengeluaran_id'
                                class='form-control @error('kategori_pengeluaran_id') is-invalid @enderror'>
                                <option value='' selected disabled>Pilih Kategori</option>
                                @foreach ($kategories as $kategorie)
                                    <option @selected($kategorie->id == $item->kategori_pengeluaran_id) value='{{ $kategorie->id }}'>{{ $kategorie->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('kategori_pengeluaran_id')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div> --}}
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
                            <a href="{{ route('admin.pengeluaran.index') }}" class="btn btn-warning">Batal</a>
                            <button class="btn btn-primary">Update Pengeluaran</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
