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
                            <td width="20%">Unit</td>
                            <td>{{ $data->unit ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td width="20%">Air Baku</td>
                            <td>{{ $data->air_baku ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td width="20%">Air Bersih</td>
                            <td>{{ $data->air_bersih ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td width="20%">Ph</td>
                            <td>{{ $data->ph ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td width="20%">Jam</td>
                            <td>{{ $data->jam ?? '-' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
