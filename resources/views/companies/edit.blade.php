@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Edit Companies') }}</div>

                <div class="card-body">
                    <div class="card-body">
                        <form action="{{ route('companies.update', $companies->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                              <label for="nama">Nama Companies</label>
                              <input type="text" class="form-control" id="nama" name="nama" value="{{ $companies->nama }}">
                            </div>

                            <div class="form-group">
                                <label for="parent_id">Parent</label>
                                <select class="form-control" id="parent_id" name="parent_id">
                                    <option>-- Select Parent --</option>
                                    @foreach ($parents as $c)
                                        @if ( $c->id == $companies->parent_id )
                                            <option value="{{ $c->id }}" selected>{{ $c->nama }}</option>                                            
                                        @else
                                            <option value="{{ $c->id }}">{{ $c->nama }}</option>                                            
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Save</button>
                            {{-- <button href="javascript:history.back()" class="btn btn-default">Back</button> --}}
                            <button href="{{ url()->previous() }}" class="btn btn-default">Back</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 