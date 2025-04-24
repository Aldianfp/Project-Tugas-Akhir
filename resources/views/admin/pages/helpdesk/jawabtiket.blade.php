@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-5">Respon Tiket Helpdesk</h4>
                    <form action="{{ route('admin.helpdesk.respontiket') }}" method="post">
                        @csrf
                        @method('put')
                        <div class='form-group mb-3'>
                            <label for='no_tiket' class='mb-2'>Nomor Tiket <span class='text-danger'>*</span></label>
                            <input type='text' name='no_tiket'
                                class='form-control @error('no_tiket') is-invalid @enderror' value='{{ $id }}'
                                readonly>
                        </div>
                        <div class='form-group mb-3'>
                            <label for='login' class='mb-2'>Email atau Username <span
                                    class='text-danger'>*</span></label>
                            <input type='login' name='login' class='form-control @error('login') is-invalid @enderror'
                                value='{{ $data->login }}' readonly>
                        </div>
                        <div class='form-group mb-3'>
                            <label for='keluhan' class='mb-2'>Keluhan <span class='text-danger'>*</span></label>
                            <textarea name='deskripsi' id='deskripsi' cols='30' rows='3' class='form-control' readonly>{{ $data->keluhan }}</textarea>
                        </div>


                        <div class='form-group mb-3'>
                            <label for='respon' class='mb-2'>Respon Superadmin <span
                                    class='text-danger'>*</span></label>
                            <textarea name='respon' id='respon' cols='30' rows='3'
                                class='form-control @error('respon') is-invalid @enderror'>{{ old('respon') }}</textarea>
                            @error('respon')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group text-right">
                            <a href="{{ route('admin.helpdesk.adminindex') }}" class="btn btn-warning">Batal</a>
                            <button class="btn btn-info">Simpan Tiket</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('nilai_proyek').addEventListener('input', function(e) {
            // Remove non-numeric characters
            let value = e.target.value.replace(/[^0-9]/g, '');

            // Format the number according to the Indonesian locale 'id-ID'
            let formattedValue = new Intl.NumberFormat('id-ID').format(value);

            // Set the formatted value back to the input field
            e.target.value = formattedValue;
        });
    </script>
@endsection
