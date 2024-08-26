@extends('layouts.template')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                {{-- @can('bahanKimia-create') --}}
                <div class="card-body d-flex justify-content-between">
                    <h5 class="card-title">{{ 'List ' . $pageTitle }}</h5>
                    <a href="{{ route('bahanKimiaOp.create') }}"
                        class="btn btn-primary btn-sm float-right font-weight-bolder mr-1"><i class="ni ni-fat-add"></i> Tambah Data</a>
                </div>
                {{-- @endcan --}}
            </div><br>
            <div class="card">
                <div class="card-body">
                    <table id="DataTable" class="table table-hover table-border"
                        style="width:100%; background-color: #fafaff ;">
                        <thead class="thead">
                            <tr>
                                <th width="1%">No</th>
                                <th width="5%">Jenis Bahan Kimia</th>
                                <th>Deskripsi</th>
                                <th>Stok Pemakaian</th>
                                <th>Jam</th>
                                <th width="1%" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $data->jenisBahanKimia->nama }}</td>
                                    <td>{{ $data->deskripsi }}</td>
                                    <td>{{ $data->stok_pemakaian }}</td>
                                    <td>{{ $data->jam }}</td>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <span class="" data-bs-toggle="dropdown">
                                                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"
                                                    data-feather='settings'></i>
                                            </span>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <li><a class="dropdown-item font-small-1"
                                                        href="{{ route('bahanKimiaOp.show', $data->id) }}"><i data-feather='eye'
                                                            class="font-small-1 mr-1"></i>Show</a>
                                                </li>
                                                <li><a class="dropdown-item font-small-1"
                                                        href="{{ route('bahanKimiaOp.edit', $data->id) }}"><i data-feather='edit'
                                                            class="font-small-1 mr-1"></i>Edit</a>
                                                </li>
                                                <form action="{{ route('bahanKimiaOp.destroy', $data->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <li><button type="submit"
                                                            class="dropdown-item font-small-1 btn-delete"><i
                                                                data-feather='trash-2'
                                                                class="font-small-1 mr-1"></i>Delete</button></li>
                                                </form>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @include('components.btn-sweet')
    <script>
        $(document).ready(function() {
            $('#DataTable').DataTable({
                "columnDefs": [{
                    "orderable": false,
                    "targets": -1,
                }]
            });
        });
    </script>
@endsection