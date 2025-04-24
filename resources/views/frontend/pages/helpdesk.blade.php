@extends('auth.app')

@section('title', 'Forgot Password')

@section('content')
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">

                            <h3 class="text-center mb-5">Helpdesk</h3>
                            <form action="{{ route('helpdesk.simpanuser') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="login">Masukkan Email atau Username yang Terdaftar</label>
                                    <input type="login" name="login" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="keluhan">Tuliskan Keluhan Anda</label>
                                    <textarea name="keluhan" id="keluhan" class="form-control" cols="30" rows="10"></textarea>
                                </div>
                                <button type="submit" class="btn btn-success mb-5">Kirim Permintaan</button>
                            </form>
                            <div class="text-left mt-4 font-weight-light">
                                <a href="{{ route('login') }}" class="text-info">
                                    < Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
