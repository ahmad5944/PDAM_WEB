@extends('layouts.template')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body d-flex justify-content-between">
                    <h5 class="card-title">{{ 'Edit ' . $pageTitle }}</h5>
                    <a href="{{ url()->previous() }}" type="button" class="btn btn-warning btn-sm"><i
                            class="ni ni-bold-left"></i> Back</a>
                </div>
            </div><br>
            <div class="card">
                <form method="POST" action="{{ route('standMeter.update', $data->id) }}" role="form"
                    enctype="multipart/form-data">
                    {{ method_field('PATCH') }}
                    @csrf

                    <div class="card-body">
                        @if ($errors->count() > 0)
                            {{-- @dd($errors) --}}
                            <div class="alert alert-danger p-2" role="alert">
                                @foreach ($errors->all() as $error)
                                    {{ $error }}<br />
                                @endforeach
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-6 col-6">
                                <div class="mb-1">
                                    <label class="form-label">Unit</label>
                                    <input type="text" class="form-control @error('unit') is-invalid @enderror"
                                        placeholder="Unit" name="unit" value="{{ $data->unit }}">
                                    @error('unit')
                                        <small class="text-danger"><b>{{ $message }}</b></small>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label">Date</label>
                                    <input type="date" class="form-control @error('Date') is-invalid @enderror"
                                        placeholder="Date" name="Date" value="{{ $data->Date }}">
                                    @error('Date')
                                        <small class="text-danger"><b>{{ $message }}</b></small>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label">Zona</label>
                                    <input type="text" class="form-control @error('Zona') is-invalid @enderror"
                                        placeholder="Zona" name="Zona" value="{{ $data->Zona }}">
                                    @error('Zona')
                                        <small class="text-danger"><b>{{ $message }}</b></small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-6">
                                <div class="mb-1">
                                    <label class="form-label">Stand 1</label>
                                    <input type="text" class="form-control @error('stand1') is-invalid @enderror"
                                        placeholder="Stand 1" name="stand1" value="{{ $data->stand1 }}">
                                    @error('stand1')
                                        <small class="text-danger"><b>{{ $message }}</b></small>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label">Stand 2</label>
                                    <input type="text" class="form-control @error('stand2') is-invalid @enderror"
                                        placeholder="Stand 2" name="stand2" value="{{ $data->stand2 }}">
                                    @error('stand2')
                                        <small class="text-danger"><b>{{ $message }}</b></small>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label">Stand 3</label>
                                    <input type="text" class="form-control @error('stand3') is-invalid @enderror"
                                        placeholder="Stand 3" name="stand3" value="{{ $data->stand3 }}">
                                    @error('stand3')
                                        <small class="text-danger"><b>{{ $message }}</b></small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="col-12">
                            <button type="submit"
                                class="btn btn-primary me-1 waves-effect waves-float waves-light btn-sm font-small-2">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
