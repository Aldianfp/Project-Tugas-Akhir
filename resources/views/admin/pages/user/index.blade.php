@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3">Users</h4>
                    <a href="{{ route('admin.users.create') }}" class="btn my-2 mb-3 btn-sm py-2 btn-primary">Tambah
                        Admin</a>
                    <div class="table-responsive">
                        <table class="table dtTable table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Avatar</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    @canany(['User Edit', 'User Delete'])
                                        <th>Aksi</th>
                                    @endcanany
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ $user->avatar() }}" class="img-fluid" alt="">
                                        </td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            {{-- @forelse ($user->roles as $role) --}}
                                            <span class="badge badge-warning">{{ $user->role }}</span>
                                            {{-- @empty --}}
                                            {{-- <i>Tidak Punya Role!</i> --}}
                                            {{-- @endforelse --}}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.users.edit', $user->id) }}"
                                                class="btn btn-sm py-2 btn-info">Edit</a>
                                            <form action="javascript:void(0)" method="post" class="d-inline"
                                                id="formDelete">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btnDelete btn-sm py-2 btn-danger"
                                                    data-action="{{ route('admin.users.destroy', $user->id) }}">Hapus</button>
                                        </td>
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
