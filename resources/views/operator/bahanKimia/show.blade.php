@extends('layouts.template')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body d-flex justify-content-between">
                    <h5 class="card-title">{{ 'View ' . $pageTitle }}</h5>
                    <a href="{{ url()->previous() }}" type="button" class="btn btn-warning btn-sm"><i
                            class="ni ni-bold-left"></i> Back</a>
                </div>
            </div><br>
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-hover w-100">
                        <tr>
                            <td width="20%">Jenis Bahan Kimia</td>
                            <td>{{ $data->jenisBahanKimia->nama ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td width="20%">Deksripsi</td>
                            <td>{{ $data->deskripsi ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td width="20%">Stok Pemakaian</td>
                            <td>{{ $data->stok_pemakaian ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td width="20%">Jam</td>
                            <td>{{ $data->jam ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td width="20%">Photo</td>
                            <td><img src="{{ '/storage/images' . $data->photo }}"
                                alt="{{ $data->photo }}" width="400"></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
