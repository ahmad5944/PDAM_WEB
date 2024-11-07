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
                <a class="nav-link {{ $route == 'bahanKimia.index' ? 'active' : '' }}" href="{{ route('bahanKimia.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-books text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1"> Bahan Kimia</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $route == 'report.index' ? 'active' : '' }}" href="{{ route('report.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-building text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1"> Laporan</span>
                </a>
            </li>
            {{-- @endcan --}}
            {{-- <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">User Management</h6>
            </li> --}}
            <li class="nav-item">
                @if ($route == 'bahanKimia.index' || $route == 'jenisBahanKimia.index' || $route == 'satuan.index' || $route == 'vendorBarang.index')
                    <a data-bs-toggle="collapse" href="#pagesExamples" class="nav-link" aria-controls="pagesExamples"
                        role="button" aria-expanded="true">
                        <div
                            class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                            <i class="ni ni-app text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Master</span>
                    </a>
                    <div class="collapse show" id="pagesExamples" style="">
                    @else
                        <a data-bs-toggle="collapse" href="#pagesExamples" class="nav-link collapsed"
                            aria-controls="pagesExamples" role="button" aria-expanded="false">
                            <div
                                class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                                <i class="ni ni-app text-primary text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Master</span>
                        </a>
                        <div class="collapse" id="pagesExamples" style="">
                @endif
                <ul class="nav ms-4">
                    <li class="nav-item">
                        <a class="nav-link {{ $route == 'jenisBahanKimia.index' ? 'active' : '' }}"
                            href="{{ route('jenisBahanKimia.index') }}">
                            <span class="sidenav-mini-icon"> P </span>
                            <span class="sidenav-normal"> Jenis Bahan Kimia </span>
                        </a>
                    </li>
                </ul>
                <ul class="nav ms-4">
                    <li class="nav-item">
                        <a class="nav-link {{ $route == 'vendorBarang.index' ? 'active' : '' }}"
                            href="{{ route('vendorBarang.index') }}">
                            <span class="sidenav-mini-icon"> P </span>
                            <span class="sidenav-normal"> Vendor </span>
                        </a>
                    </li>
                </ul>
                <ul class="nav ms-4">
                    <li class="nav-item">
                        <a class="nav-link {{ $route == 'satuan.index' ? 'active' : '' }}"
                            href="{{ route('satuan.index') }}">
                            <span class="sidenav-mini-icon"> P </span>
                            <span class="sidenav-normal"> Satuan </span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                @if ($route == 'user.index' || $route == 'role.index' || $route == 'permission.index')
                    <a data-bs-toggle="collapse" href="#pagesExamples" class="nav-link" aria-controls="pagesExamples"
                        role="button" aria-expanded="true">
                        <div
                            class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                            <i class="ni ni-circle-08 text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">User Management</span>
                    </a>
                    <div class="collapse show" id="pagesExamples" style="">
                    @else
                        <a data-bs-toggle="collapse" href="#pagesExamples" class="nav-link collapsed"
                            aria-controls="pagesExamples" role="button" aria-expanded="false">
                            <div
                                class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                                <i class="ni ni-circle-08 text-warning text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">User Management</span>
                        </a>
                        <div class="collapse" id="pagesExamples" style="">
                @endif
                <ul class="nav ms-4">
                    <li class="nav-item">
                        <a class="nav-link {{ $route == 'user.index' ? 'active' : '' }}"
                            href="{{ route('user.index') }}">
                            <span class="sidenav-mini-icon"> P </span>
                            <span class="sidenav-normal"> Profile </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $route == 'role.index' ? 'active' : '' }}"
                            href="{{ route('role.index') }}">
                            <span class="sidenav-mini-icon"> R </span>
                            <span class="sidenav-normal"> Role </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $route == 'permission.index' ? 'active' : '' }}"
                            href="{{ route('permission.index') }}">
                            <span class="sidenav-mini-icon"> P </span>
                            <span class="sidenav-normal"> Permission </span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>
