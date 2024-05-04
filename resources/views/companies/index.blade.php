@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Companies') }}</div>

                <div class="card-body">
                    <div class="card-body">
                        <a href="{{ route('companies.create') }}" class="btn btn-primary" type="submit">Add</a>

                        <div class="table-responsive">
                            <table class="table table-striped table-sm">
                                <thead>
                                  <tr>
                                    <th scope="col">no</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Parent</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($companies as $c)
                                    <tr>
                                        <td >{{ $loop->iteration }}</td>
                                        <td>{{ $c->nama }}</td>
                                        <td>{{ $c->parent->nama ?? '-' }}</td>
                                        <td>
                                            <a href="{{ route('companies.edit', $c->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                            {{-- <a href="javascript:void();" class="btn btn-sm btn-danger" onclick="">Delete</a> --}}
                                            <form action="{{ route('companies.delete', $c->id) }}" method="POST" id="formDelete-{{ $c->id }}" class="d-inline">
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