@extends('auth.app')

@section('title', 'Forgot Password')

@section('content')
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">

                            <h3 class="text-center mb-5">Cek Tiket</h3>
                            <form action="{{ route('helpdesk.prosescektiket') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="no_tiket">Masukkan Nomor Tiket</label>
                                    <input type="text" name="no_tiket" class="form-control" required>
                                </div>

                                <button type="submit" class="btn btn-primary mb-5">Cek Tiket</button>
                            </form>
                            <div class="text-center mt-4 font-weight-light">
                                <a href="{{ route('login') }}" class="text-primary">
                                    < Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
