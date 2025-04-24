@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-5">Edit Proyek</h4>
                    <form action="{{ route('admin.proyek.update', $item->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class='form-group mb-3'>
                            <label for='nama' class='mb-2'>Nama Proyek <span class='text-danger'>*</span></label>
                            <input type='text' name='nama' class='form-control @error('nama') is-invalid @enderror'
                                value='{{ $item->nama ?? old('nama') }}'>
                            @error('nama')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='tanggal_mulai' class='mb-2'>Tanggal Mulai <span
                                    class='text-danger'>*</span></label>
                            <input type='date' name='tanggal_mulai' id='tanggal_mulai'
                                class='form-control @error('tanggal_mulai') is-invalid @enderror'
                                value='{{ $item->tanggal_mulai->translatedFormat('Y-m-d') ?? old('tanggal_mulai') }}'>
                            @error('tanggal_mulai')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='tanggal_akhir' class='mb-2'>Tanggal Akhir <span
                                    class='text-danger'>*</span></label>
                            <input type='date' name='tanggal_akhir' id='tanggal_akhir'
                                class='form-control @error('tanggal_akhir') is-invalid @enderror'
                                value='{{ $item->tanggal_akhir->translatedFormat('Y-m-d') ?? old('tanggal_akhir') }}'>
                            @error('tanggal_akhir')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group text-right">
                            <a href="{{ route('admin.proyek.index') }}" class="btn btn-warning">Batal</a>
                            <button class="btn btn-primary">Update Proyek</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
