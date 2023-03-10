@extends('layouts.admin')

@section('main-content')
<div class="content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pilih Pertanyaan</h1>
    </div>
    <div class="row">
        <div class="col-lg-12">
        <form method="post" action="#" class="card shadow mb-4">
        {{ csrf_field() }}
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-white">Bank Soal</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="width: 5%">No</th>
                                    <th>Pertanyaan</th>
                                    <th>Jawaban</th>
                                    <th>Pilih</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($questions as $question)
                                <tr>
                                    <td scope="row">{{ $loop->iteration }}</td>
                                    <td>{!! $question->question !!}</td>
                                    <td>{{ $question->answer }}</td>
                                    <td><input type="checkbox" name="contents[]" value="{{$question->id}}"></td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="9">Data Tidak Ditemukan</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <br>
                        <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" type="submit"><i class="fa fa-plus-circle fa-sm text-white mr-2"></i>Submit</button>
                    </div>
                </div>
        </form>
        </div>
    </div>
</div>

<div class="content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <!-- <h1 class="h3 mb-0 text-gray-800">Peserta Belum Terkonfirmasi</h1> -->
    </div>
    
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-white">Soal Pada Paket</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="width: 5%">No</th>
                                    <th>Pertanyaan</th>
                                    <th>Jawaban</th>
                                    <th>Pilih</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse ($list_test as $test)
                                <tr>
                                    <td scope="row">{{ $loop->iteration }}</td>
                                    <td>{!! $test->question !!}</td>
                                    <td>{{ $test->answer }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="mr-2">
                                                <form action="{{ route('admin.test.destroy', Crypt::encrypt($test->id)) }}" method="post">
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
                                    <td colspan="9">Data Tidak Ditemukan</td>
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