@extends('layouts.template')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body d-flex justify-content-between">
                    <h5 class="card-title">{{ $pageTitle }}</h5>
                </div>
            </div><br>
            <div class="card">
                <form method="POST" action="{{ route('report.download') }}" role="form"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Pilih Jenis</label>
                                <select name="jenis" id="" class="form-control">
                                    <option value="" disabled selected>-- Pilih Jenis --</option>
                                    <option value="kualitasAir">Kualitas Air</option>
                                    <option value="kegiatan">Kegiatan</option>
                                    <option value="standMeter">Stand Meter</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="col-12">
                            <button type="submit"
                                class="btn btn-primary me-1 waves-effect waves-float waves-light btn-sm font-small-2">Download</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @include('components.btn-sweet')
@endsection
