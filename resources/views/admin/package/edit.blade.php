@extends('layouts.admin')

@section('main-content')
<div class="content">
    <form action="{{ route('admin.package.update', Crypt::encrypt($data->id)) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="row">
            <div class="col-lg-4 order-lg-2">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <h4 class="m-0 font-weight-bold text-white">Logo/Foto Paket Ujian</h4>
                    </div>
                    <div class="card-profile-image mt-4">
                        <div id="preview-image">
                            <img src="{{ $data->photo == null ? asset('images/preview.png') : asset('storage/'.$data->photo) }}" width="200px" height="250px" />
                        </div>
                    </div>
                    <div class="card-body">
                        <input id="id" type="hidden" class="form-control" name="id" value="{{ $data->id }}">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
                                    <input id="photo" type="file" class="form-control preview-image" name="photo" value="{{ old('photo') }}">
                                    @if ($errors->has('photo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 order-lg-1">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <h4 class="m-0 font-weight-bold text-white">Edit Paket Ujian</h4>
                    </div>
                    @include('layouts.components.flash')
                    <div class="card-body">
                        <div class="pl-lg-4">
                            <div class="form-group{{ $errors->has('instance_id') ? ' has-error' : '' }}">
                                <label for="instance_id" class="col-md-4 control-label">Penyelenggara</label>
                                <div>
                                    <select class="form-control" name="instance_id" required>
                                        @forelse ($instances as $instance)
                                        <option value="{{$instance->id}}" {{$data->instance_id == $instance->id ? 'selected' : ''}}>{{$instance->instance_name}}</option>
                                        @empty
                                        <option value="NULL">Penyelenggara belum diinput</option>
                                        @endforelse
                                    </select>
                                    @if ($errors->has('instance_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('instance_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Nama Paket Ujian</label>
                                <input id="name" type="text" class="form-control" name="name" value="{{ $data->name }}" required>
                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('desc') ? ' has-error' : '' }}">
                                <label for="desc" class="col-md-4 control-label">Deskripsi</label>
                                <textarea id="desc" class="form-control" name="desc" required>{{ $data->desc }}</textarea>
                                @if ($errors->has('desc'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('desc') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group{{ $errors->has('max_participant') ? ' has-error' : '' }}">
                                        <label for="max_participant" class="col-md-10 control-label">Jumlah Peserta</label>
                                        <input id="max_participant" type="number" class="form-control" name="max_participant" value="{{ $data->max_participant }}" required>
                                        @if ($errors->has('max_participant'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('max_participant') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group{{ $errors->has('min_education') ? ' has-error' : '' }}">
                                        <label for="min_education" class="col-md-10 control-label">Minimal Pendidikan Terakhir</label>
                                        <div>
                                            <select class="form-control" name="min_education" required="">
                                                <option value="Tidak Sekolah" {{$data->min_education == 'Tidak Sekolah' ? 'selected' : ''}}>Tidak Sekolah</option>
                                                <option value="SD/Sederajat" {{$data->min_education == 'SD/Sederajat' ? 'selected' : ''}}>SD/Sederajat</option>
                                                <option value="SMP/Sederajat" {{$data->min_education == 'SMP/Sederajat' ? 'selected' : ''}}>SMP/Sederajat</option>
                                                <option value="SMA/Sederajat" {{$data->min_education == 'SMA/Sederajat' ? 'selected' : ''}}>SMA/Sederajat</option>
                                                <option value="S1/Sederajat" {{$data->min_education == 'S1/Sederajat' ? 'selected' : ''}}>S1/Sederajat</option>
                                            </select>
                                            @if ($errors->has('min_education'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('min_education') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('duration') ? ' has-error' : '' }}">
                                <label for="duration" class="col-md-4 control-label">Durasi</label>
                                <select class="form-control" name="duration" required>
                                    <option value="30" {{$data->duration == '30' ? 'selected' : ''}}>30 Menit</option>
                                    <option value="60" {{$data->duration == '60' ? 'selected' : ''}}>1 Jam</option>
                                    <option value="90" {{$data->duration == '90' ? 'selected' : ''}}>1 Jam 30 Menit</option>
                                    <option value="120" {{$data->duration == '120' ? 'selected' : ''}}>2 Jam</option>
                                </select>
                                @if ($errors->has('duration'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('duration') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label for="start_at" class="col-md-4 control-label">Mulai</label>
                                        <input type="datetime-local" id="start_at" class="form-control" name="start_at" value="{{ $data->start_at }}" required autocomplete="start_at">
                                        @if ($errors->has('start_at'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('start_at') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label for="finish_at" class="col-md-10 control-label">Selesai</label>
                                        <input type="datetime-local" id="finish_at" class="form-control" name="finish_at" value="{{ $data->finish_at }}" required autocomplete="finish_at">
                                        @if ($errors->has('finish_at'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('finish_at') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-footer pt-3 border-top">
                                <button type="submit" class="btn btn-primary btn-default">Simpan</button>
                                <a href="{{ route('admin.package.index') }}" class="btn btn-secondary btn-default">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection