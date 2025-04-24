@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-6">
            <h3 class="mb-0 font-weight-bold">Halo, {{ auth()->user()->name }} !</h3>
        </div>
    </div>
    <div class="row  mt-3 mb-3">
        <div class="col-3 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3 text-center">Jumlah Data Portofolio</h4>
                    <div class="display-2 text-center">
                        {{ $count['portofolio'] }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3 text-center">Jumlah Data Peralatan</h4>
                    <div class="display-2 text-center">
                        {{ $count['peralatan'] }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3 text-center">Jumlah Data Personil</h4>
                    <div class="display-2 text-center">
                        {{ $count['personil'] }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3 text-center">Jumlah Data Pengeluaran</h4>
                    <div class="display-2 text-center">
                        {{ $count['pengeluaran'] }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 stretch-card mt-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3 text-center">Jumlah Data Pemasukan</h4>
                    <div class="display-2 text-center">
                        {{ $count['pemasukan'] }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
