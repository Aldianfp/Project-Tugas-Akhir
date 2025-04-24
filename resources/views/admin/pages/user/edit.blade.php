@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-5">Edit User</h4>
                    <form action="{{ route('admin.users.update', $user->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class='form-group mb-3'>
                            <label for='avatar' class='mb-2'>Avatar</label>
                            <input type='file' name='avatar' class='form-control @error('avatar') is-invalid @enderror'
                                value='{{ old('avatar') }}'>
                            @error('avatar')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='name' class='mb-2'>Name</label>
                            <input type='text' name='name' class='form-control @error('name') is-invalid @enderror'
                                value='{{ $user->name ?? old('name') }}'>
                            @error('name')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='email' class='mb-2'>Email</label>
                            <input type='text' name='email' class='form-control @error('email') is-invalid @enderror'
                                value='{{ $user->email ?? old('email') }}'>
                            @error('email')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='roles' class='mb-2'>Roles</label>
                            <select name="roles" id="roles"
                                class="form-control @error('roles') is-invalid @enderror">
                                @foreach ($roles as $role)
                                    {{-- <option value="{{ $role->name }}"
                                        {{ in_array($role->name, old('roles', $user->roles()->pluck('name')->toArray())) ? 'selected' : '' }}>
                                        {{ $role->name }}
                                    </option> --}}
                                    <option value="{{ $role->name }}">{{$role->name}}</option>
                                @endforeach
                            </select>
                            @error('roles')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class='form-group mb-3'>
                            <label for='password' class='mb-2'>Input New Password</label>
                            <input type='password' name='password'
                                class='form-control @error('password') is-invalid @enderror' value='{{ old('password') }}'>
                            @error('password')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- <div class='form-group mb-3 position-relative'>
                            <label for='password' class='mb-2'>Input New Password</label>
                            <input type='password' id='password' name='password'
                                class='form-control @error("password") is-invalid @enderror' value='{{ old("password") }}'>
                            <span toggle="#password" class="fa fa-fw fa-eye toggle-password"
                                style="position: absolute; right: 15px; top: 70%; transform: translateY(-50%); cursor: pointer; color: #666;"></span>
                            @error('password')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div> --}}
                        
                        <div class='form-group mb-3'>
                            <label for='password_confirmation' class='mb-2'>New Password Confirmation</label>
                            <input type='password' name='password_confirmation'
                                class='form-control @error('password_confirmation') is-invalid @enderror'
                                value='{{ old('password_confirmation') }}'>
                            @error('password_confirmation')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- <div class='form-group mb-3 position-relative'>
                            <label for='password_confirmation' class='mb-2'>New Password Confirmation</label>
                            <input type='password' id='password_confirmation' name='password_confirmation'
                                class='form-control @error("password_confirmation") is-invalid @enderror'
                                value='{{ old("password_confirmation") }}'>
                            <span toggle="#password_confirmation" class="fa fa-fw fa-eye toggle-password"
                                style="position: absolute; right: 15px; top: 70%; transform: translateY(-50%); cursor: pointer; color: #666;"></span>
                            @error('password_confirmation')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div> --}}
                        
                        {{-- <!-- Include FontAwesome (if not already included) -->
                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
                        
                        <style>
                            .form-group.position-relative {
                                position: relative;
                            }
                        
                            .toggle-password {
                                position: absolute;
                                right: 15px; /* Adjust the position as needed */
                                top: 50%;
                                transform: translateY(-50%);
                                cursor: pointer;
                            }
                        
                            .form-control {
                                padding-right: 40px; /* Ensure there's space for the icon */
                            }
                        </style> --}}
                        
                        {{-- <script>
                            document.querySelectorAll('.toggle-password').forEach(function (element) {
                                element.addEventListener('click', function () {
                                    let passwordInput = document.querySelector(this.getAttribute('toggle'));
                                    let icon = this;
                                    // Toggle the input type
                                    if (passwordInput.type === 'password') {
                                        passwordInput.type = 'text';
                                        icon.classList.remove('fa-eye-slash');
                                        icon.classList.add('fa-eye');
                                    } else {
                                        passwordInput.type = 'password';
                                        icon.classList.remove('fa-eye');
                                        icon.classList.add('fa-eye-slash');
                                    }
                                });
                            });
                        </script> --}}
                        
                        
                        <div class="form-group text-right">
                            <a href="{{ route('admin.users.index') }}" class="btn btn-warning">Batal</a>
                            <button class="btn btn-primary">Update User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('assets/vendors/select2/select2.min.js') }}"></script>
    <script>
        $(function() {
            $('#roles').select2({
                theme: 'bootstrap',
                placeholder: 'Anda bisa memilih lebih dari 1 role'
            })
        })
    </script>
@endpush
