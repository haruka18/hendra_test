@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Edit User') }}</div>

                <div class="card-body">
                    <div class="card-body">
                        <form action="{{ route('user.update', $user->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                              <label for="name">Nama User</label>
                              <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                            </div>
                            <div class="form-group">
                                <label for="role_id">Role</label>
                                <select class="form-control" id="role_id" name="role_id">
                                    <option>-- Select Role --</option>
                                    @foreach ($roles as $r)
                                        @if ( $r->id == $user->role_id )
                                            <option value="{{ $r->id }}" selected>{{ $r->nama }}</option>
                                        @else
                                            <option value="{{ $r->id }}">{{ $r->nama }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="company_id">Company</label>
                                <select class="form-control" id="company_id" name="company_id">
                                    <option>-- Select Company --</option>
                                    @foreach ($companies as $c)
                                        @if ( $c->id == $user->company_id )
                                            <option value="{{ $c->id }}" selected>{{ $c->nama }}</option>
                                        @else
                                            <option value="{{ $c->id }}">{{ $c->nama }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 