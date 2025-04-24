@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3">Portofolio</h4>
                    <a href="{{ route('admin.portofolio.create') }}" class="btn my-2 mb-3 btn-sm py-2 btn-success">Tambah
                        Portofolio</a>
                    <div class="table-responsive">
                        <table class="table dtTable table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Periode Pelaksanaan Awal</th>
                                    <th>Periode Pelaksanaan Akhir</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->tanggal_awal->format('d/m/y') }}</td>
                                        <td>{{ $item->tanggal_akhir->format('d/m/y') }}</td>
                                        <td>{{ $item->deskripsi }}</td>
                                        <td>
                                            <a href="{{ route('admin.portofolio-gambar.index', [
                                                'portofolio_id' => $item->id,
                                            ]) }}"
                                                class="btn btn-sm py-2 btn-warning">Gambar</a>
                                            <a href="{{ route('admin.portofolio.edit', $item->id) }}"
                                                class="btn btn-sm py-2 btn-info">Edit</a>
                                            <form action="javascript:void(0)" method="post" class="d-inline"
                                                id="formDelete">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btnDelete btn-sm py-2 btn-danger"
                                                    data-action="{{ route('admin.portofolio.destroy', $item->id) }}">Hapus</button>
                                            </form>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<x-Datatable />
