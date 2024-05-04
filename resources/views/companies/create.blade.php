@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Create Companies') }}</div>

                <div class="card-body">
                    <div class="card-body">
                        <form action="{{ route('companies.save') }}" method="POST">
                            @csrf
                            <div class="form-group">
                              <label for="nama">Nama Companies</label>
                              <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}">
                            </div>
                            <div class="form-group">
                                <label for="parent_id">Parent</label>
                                <select class="form-control" id="parent_id" name="parent_id">
                                    <option>-- Select Parent --</option>
                                    @foreach ($companies as $c)
                                        <option value="{{ $c->id }}">{{ $c->nama }}</option>
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