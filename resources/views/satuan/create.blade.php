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
                <form method="POST" action="{{ route('satuan.store') }}" role="form"
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
                                    <label class="form-label">Nama</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                        placeholder="Nama" name="nama">
                                    @error('nama')
                                        <small class="text-danger"><b>{{ $message }}</b></small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-6">
                                <div class="mb-1">
                                    <label class="form-label">Deksripsi</label>
                                    <input type="text" class="form-control @error('deskripsi') is-invalid @enderror"
                                        name="deskripsi">
                                    @error('deskripsi')
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
