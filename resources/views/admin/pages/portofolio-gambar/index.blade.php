@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3">Gambar Portofolio : {{ $portofolio->nama }}</h4>
                    <a href="{{ route('admin.portofolio-gambar.create', [
                        'portofolio_id' => $portofolio->id,
                    ]) }}"
                        class="btn my-2 mb-3 btn-sm py-2 btn-primary">Tambah
                        Gambar</a>
                    <div class="table-responsive">
                        <table class="table dtTable table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ $item->gambar() }}" class="img-fluid" style="max-height:70px"
                                                alt="">
                                        </td>

                                        <td>
                                            <form action="javascript:void(0)" method="post" class="d-inline"
                                                id="formDelete">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btnDelete btn-sm py-2 btn-danger"
                                                    data-action="{{ route('admin.portofolio-gambar.destroy', [
                                                        'id' => $item->id,
                                                        'portofolio_id' => $item->portofolio_id,
                                                    ]) }}">Hapus</button>
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
