@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3">Laporan Keuangan</h4>
                    <form action="{{ route('admin.laporan-keuangan.preview') }}" method="get">
                        @csrf
                        <div class='form-group'>
                            <label for='proyek_id'>Proyek <span class='text-danger'>*</span></label>
                            <select name='proyek_id' id='proyek_id'
                                class='form-control @error('proyek_id') is-invalid @enderror'>
                                <option value='' selected disabled>Pilih Proyek</option>
                                @foreach ($data_proyek as $proyek)
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
                        <div class='form-group'>
                            <label for='kategori'>Kategori</label>
                            <select name='kategori' id='kategori'
                                class='form-control @error('kategori') is-invalid @enderror'>
                                <option value='semua' selected>Semua Kategori</option>
                                <option value="pemasukan">Pemasukan</option>
                                <option value="pengeluaran">Pengeluaran</option>
                            </select>
                            @error('kategori')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class='form-group mb-3'>
                                    <label for='tanggal_awal' class='mb-2'>Tanggal Awal</label>
                                    <input type='date' name='tanggal_awal' id='tanggal_awal'
                                        class='form-control @error('tanggal_awal') is-invalid @enderror'
                                        value='{{ old('tanggal_awal') }}'>
                                    @error('tanggal_awal')
                                        <div class='invalid-feedback'>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class='form-group mb-3'>
                                    <label for='tanggal_akhir' class='mb-2'>Tanggal Akhir</label>
                                    <input type='date' name='tanggal_akhir' id='tanggal_akhir'
                                        class='form-control @error('tanggal_akhir') is-invalid @enderror'
                                        value='{{ old('tanggal_akhir') }}'>
                                    @error('tanggal_akhir')
                                        <div class='invalid-feedback'>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group float-right">
                            <button class="btn btn-danger">Cetak Laporan</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
<x-Datatable />
