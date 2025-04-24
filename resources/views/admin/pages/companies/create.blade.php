@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-5">Edit Detail Tentang Perusahaan</h4>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.company.store') }}" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="visi">Visi:</label>
                            <input type="text" name="visi" class="form-control"
                                placeholder="Masukkan Visi Perusahaan">
                        </div>

                        <div class="form-group mb-3">
                            <label for="misi">Misi:</label>
                            <textarea name="misi" class="form-control" placeholder="Masukkan Misi Perusahaan"></textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="kebijakan">Kebijakan:</label>
                            <textarea name="kebijakan" class="form-control" placeholder="Masukkan Kebijakan Perusahaan"></textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="jasapelayanan">Jasa Pelayanan:</label>
                            <textarea name="jasapelayanan" class="form-control" placeholder="Masukkan Jasa Pelayanan Perusahaan"></textarea>
                        </div>

                        <button type="submit" class="btn btn-success">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
