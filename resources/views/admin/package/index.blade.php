@extends('layouts.admin')

@section('main-content')
<div class="content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Paket Ujian</h1>
        <a href="{{ route('admin.package.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-plus-circle fa-sm text-white mr-2"></i>Tambah Data</a>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-white">Data Paket Ujian</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="width: 5%">No</th>
                                    <th>Penyelenggara</th>
                                    <th>Nama Paket</th>
                                    <th>Deskripsi</th>
                                    <th>Waktu</th>
                                    <th>Status</th>
                                    <th style="width: 10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($packages as $package)
                                <tr>
                                    <td scope="row">{{ $loop->iteration }}</td>
                                    <td>{{ $package->instance->instance_name }}</td>
                                    <td>{{ $package->name }}</td>
                                    <td>{{ $package->desc }}</td>
                                    <td>Start : {{$package->start_at}}</br>Finish : {{$package->finish_at}}</td>
                                    <td>
                                        @php
                                        if($time >= $package->start_at && $time <= $package->finish_at){
                                            echo '<label class="btn btn-primary">Sedang Berlangsung</label>';
                                            }
                                            if($time < $package->start_at && $time < $package->finish_at){
                                            echo '<label class="btn btn-danger">Belum Mulai</label>';
                                            }
                                            if($time > $package->finish_at && $time > $package->start_at){ echo '<label class="btn btn-success">Selesai</label>' ; } @endphp </td>
                                    <td>
                                        <div class="d-flex">
                                            {{-- <div class="mr-2">
                                                <a href="{{ route('admin.test.index', array('id' => Crypt::encrypt($package->id))) }}" class="btn btn-sm btn-primary">
                                                    <i class="fas fa-book-open"></i>
                                                </a>
                                            </div>  --}}

                                            <div class="mr-2">
                                                <a href="{{ route('admin.package.edit', Crypt::encrypt($package->id)) }}" class="btn btn-sm btn-primary">
                                                    <i class="fa fa-pencil-alt"></i>
                                                </a>
                                            </div>
                                            
                                            <div class="mr-2">
                                                <form action="{{ route('admin.package.destroy', Crypt::encrypt($package->id)) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus data ini?')"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7">Data Tidak Ditemukan</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection