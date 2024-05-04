@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Role') }}</div>

                <div class="card-body">
                    <div class="card-body">
                        <a href="{{ route('role.create') }}" class="btn btn-primary" type="submit">Add</a>

                        <div class="table-responsive">
                            <table class="table table-striped table-sm">
                                <thead>
                                  <tr>
                                    <th scope="col">no</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($role as $r)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $r->nama }}</td>
                                        <td>{{ $r->slug }}</td>
                                        <td>
                                            <a href="{{ route('role.edit', $r->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                            {{-- <a href="javascript:void();" class="btn btn-sm btn-danger" onclick="">Delete</a> --}}
                                            <form action="{{ route('role.delete', $r->id) }}" method="POST" id="formDelete-{{ $r->id }}" class="d-inline">
                                                @csrf
                                                <button Onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" type="submit" name="actiondelete" value="1" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
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