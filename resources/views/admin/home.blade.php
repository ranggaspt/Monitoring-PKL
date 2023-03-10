@extends('layouts.admin')

@section('main-content')
<div class="main-content">
    <!-- <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fa fa-book-open text-white fa-2x"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Peserta</h4>
                        </div>
                        <div class="card-body">
                            {{ App\Models\Participant::count() ?? '0' }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fa fa-bell text-white fa-2x"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Pertanyaan</h4>
                        </div>
                        <div class="card-body">
                            {{ App\Models\Question::count() ?? '0' }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fa fa-tags text-white fa-2x"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Penyelenggara</h4>
                        </div>
                        <div class="card-body">
                            {{ App\Models\Instance::count() ?? '0' }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Siswa</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ App\Models\Participant::count() ?? '0' }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-fw fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Guru</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ App\Models\Instance::count() ?? '0' }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-fw fa-user-tie fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Instansi</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ App\Models\Package::count() ?? '0' }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-fw fa-building fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    Kelas</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ App\Models\Question::count() ?? '0' }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-fw fa-book fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-secondary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                    Jurusan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ App\Models\Question::count() ?? '0' }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-fw fa-graduation-cap fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection