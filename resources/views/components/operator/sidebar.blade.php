@php
    $route = Illuminate\Support\Facades\Route::currentRouteName();
@endphp

<style>
    .active {
        background-color: #e4e8ff !important;
        border-radius: 10px;
        margin-right: 30px !important;
    }
</style>
<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('dashboard') }}"
        {{-- https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html  --}}
            target="_blank">
            <img src="{{ asset('assets/img/bg_pdam.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">Hai, {{ auth()->user()->name }}</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto h-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ $route == 'dashboard' ? 'active' : '' }}" href="{{ route('dashboard') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link {{ $route == 'bahanKimia.index' ? 'active' : '' }}" href="{{ route('bahanKimia.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-box-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Kalibrasi</span>
                </a>
            </li> --}}
            {{-- @can('bahanKimia-list') --}}
            <li class="nav-item">
                <a class="nav-link {{ $route == 'bahanKimiaOp.index' ? 'active' : '' }}" href="{{ route('bahanKimiaOp.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-books text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1"> Bahan Kimia</span>
                </a>
            </li>
            {{-- @endcan --}}
            <li class="nav-item">
                <a class="nav-link {{ $route == 'kalibrasi.index' ? 'active' : '' }}" href="{{ route('kalibrasi.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-compass-04 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1"> Kalibrasi</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $route == 'kualitasAir.index' ? 'active' : '' }}" href="{{ route('kualitasAir.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-chart-bar-32 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1"> Kualitas Air</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $route == 'reservoar.index' ? 'active' : '' }}" href="{{ route('reservoar.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-building text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1"> Reservoar</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $route == 'standMeter.index' ? 'active' : '' }}" href="{{ route('standMeter.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-sound-wave text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1"> Stand Meter</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $route == 'kegiatan.index' ? 'active' : '' }}" href="{{ route('kegiatan.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-collection text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1"> Kegiatan</span>
                </a>
            </li>
            {{-- <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">User Management</h6>
            </li> --}}
        </ul>
    </div>
</aside>
