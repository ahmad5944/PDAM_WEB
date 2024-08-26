@extends('layouts.template')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body d-flex justify-content-between">
                    <h5 class="card-title">{{ 'Tambah ' . $pageTitle }}</h5>
                    <a href="{{ url()->previous() }}" type="button" class="btn btn-warning btn-sm"><i
                            class="ni ni-bold-left"></i> Back</a>
                </div>
            </div><br>
            <div class="card">
                <form method="POST" action="{{ route('kalibrasi.store') }}" role="form"
                    enctype="multipart/form-data">
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
                                        placeholder="Unit" name="unit">
                                    @error('unit')
                                        <small class="text-danger"><b>{{ $message }}</b></small>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label">Jenis Bahan Kimia</label>
                                    <input type="text" class="form-control @error('air_baku') is-invalid @enderror"
                                        placeholder="Air Baku" name="air_baku">
                                    @error('air_baku')
                                        <small class="text-danger"><b>{{ $message }}</b></small>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label">Air Baku</label>
                                    <input type="text" class="form-control @error('air_baku') is-invalid @enderror"
                                        placeholder="Air Baku" name="air_baku">
                                    @error('air_baku')
                                        <small class="text-danger"><b>{{ $message }}</b></small>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label">Kalibrasi</label>
                                    <input type="text" class="form-control @error('air_bersih') is-invalid @enderror"
                                        placeholder="Air Bersih" name="air_bersih">
                                    @error('air_bersih')
                                        <small class="text-danger"><b>{{ $message }}</b></small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-6">
                                <div class="mb-1">
                                    <label class="form-label">Air Bersih</label>
                                    <input type="text" class="form-control @error('air_bersih') is-invalid @enderror"
                                        placeholder="Air Bersih" name="air_bersih">
                                    @error('air_bersih')
                                        <small class="text-danger"><b>{{ $message }}</b></small>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label">Ph</label>
                                    <input type="text" class="form-control @error('ph') is-invalid @enderror"
                                        placeholder="Ph" name="ph">
                                    @error('ph')
                                        <small class="text-danger"><b>{{ $message }}</b></small>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label">Jam</label>
                                    <input type="time" class="form-control @error('jam') is-invalid @enderror" name="jam">
                                    @error('jam')
                                        <small class="text-danger"><b>{{ $message }}</b></small>
                                    @enderror
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
