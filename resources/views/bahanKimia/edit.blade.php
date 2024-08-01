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
                <form method="POST" action="{{ route('bahanKimia.update', $data->id) }}" role="form"
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
                                    <label class="form-label">Jenis Bahan Kimia</label>
                                    <select class="form-control @error('jenis_bahan_kimia_id') is-invalid @enderror" name="jenis_bahan_kimia_id">
                                        <option value="{{ $data->jenis_bahan_kimia_id }}" selected>{{ $data->jenisBahanKimia->nama }}</option>
                                        @foreach($listBahanKimia as $item)
                                            <option value="{{ $item->id }}" {{ old('jenis_bahan_kimia_id') == $item->id ? 'selected' : '' }}>
                                                {{ $item->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('jenis_bahan_kimia_id')
                                        <small class="text-danger"><b>{{ $message }}</b></small>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label">Deksripsi</label>
                                    <input type="text" class="form-control @error('deskripsi') is-invalid @enderror"
                                        name="deskripsi" value="{{ $data->deskripsi }}">
                                    @error('deskripsi')
                                        <small class="text-danger"><b>{{ $message }}</b></small>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label">Vendor</label>
                                    <select class="form-control @error('vendor_id') is-invalid @enderror" name="vendor_id">
                                        <option value="{{ $data->vendor_id }}" selected>{{ $data->vendor->nama }}</option>
                                        @foreach($listVendor as $item)
                                            <option value="{{ $item->id }}" {{ old('vendor_id') == $item->id ? 'selected' : '' }}>
                                                {{ $item->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('vendor_id')
                                        <small class="text-danger"><b>{{ $message }}</b></small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-6">
                                <div class="mb-1">
                                    <label class="form-label">Stok</label>
                                    <input type="text" class="form-control @error('stok') is-invalid @enderror"
                                        name="stok" value="{{ $data->stok }}">
                                    @error('stok')
                                        <small class="text-danger"><b>{{ $message }}</b></small>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label">Satuan</label>
                                    <select class="form-control @error('satuan_id') is-invalid @enderror" name="satuan_id">
                                        <option value="{{ $data->satuan_id }}" selected>{{ $data->satuan->nama }}</option>
                                        @foreach($listSatuan as $item)
                                            <option value="{{ $item->id }}" {{ old('satuan_id') == $item->id ? 'selected' : '' }}>
                                                {{ $item->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('satuan_id')
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
