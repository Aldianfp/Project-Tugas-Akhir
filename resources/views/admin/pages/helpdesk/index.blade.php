@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <h4 class="card-title mb-3">Helpdesk</h4>
                    <div class="table-responsive">
                        <table class="table dtTable table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nomor Tiket</th>
                                    <th>Email atau username</th>
                                    <th>Status</th>
                                    <th>Last Updated</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tiket as $t)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $t->no_tiket }}</td>
                                        <td>{{ $t->login }}</td>
                                        <td>
                                            @if ($t->status === 'Tiket Berhasil Dibuat')
                                                <span class="badge badge-info">{{ $t->status }}</span>
                                            @else
                                                <span class="badge badge-success">{{ $t->status }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $t->updated_at }}</td>
                                        <td>
                                            @if ($t->status === 'Tiket Berhasil Dibuat')
                                                <a href="{{ route('admin.helpdesk.adminjawabtiket', $t->no_tiket) }}"
                                                    class="btn btn-sm py-2 btn-warning">Jawab</a>
                                            @else
                                                <span class="badge badge-success">Sudah Dijawab</span>
                                            @endif


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
