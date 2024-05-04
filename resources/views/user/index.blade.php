@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('User') }}</div>

                <div class="card-body">
                    <div class="card-body">
                        @if ( Auth::user()->is_admin )
                            <a href="{{ route('user.create') }}" class="btn btn-primary" type="submit">Add</a>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-striped table-lg">
                                <thead>
                                  <tr>
                                    <th scope="col">no</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Company</th>
                                    @if ( Auth::user()->is_admin )
                                        <th scope="col">Action</th>
                                    @endif
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $u)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $u->name }}</td>
                                        <td>{{ $u->email }}</td>
                                        <td>{{ $u->role->nama ?? '-' }}</td>
                                        <td>{{ $u->company->nama ?? '-' }}</td>
                                        @if ( Auth::user()->is_admin )
                                            <td>
                                                <a href="{{ route('user.edit', $u->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                                <form action="{{ route('user.delete', $u->id) }}" method="POST" id="formDelete-{{ $u->id }}" class="d-inline">
                                                    @csrf
                                                    <button Onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" type="submit" name="actiondelete" value="1" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </td>
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
    </div>
</div>
@endsection 