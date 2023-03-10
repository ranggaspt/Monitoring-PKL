@extends('layouts.admin')

@section('main-content')
<div class="content">
    <form action="{{ route('admin.instance.update', Crypt::encrypt($data->id)) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="row">
            <div class="col-lg-4 order-lg-2">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <h4 class="m-0 font-weight-bold text-white">Logo/Foto Penyelenggara</h4>
                    </div>
                    <div class="card-profile-image mt-4">
                        <div id="preview-image">
                            <img src="{{ $data->photo == null ? asset('images/preview.png') : asset('storage/'.$data->photo) }}" width="200px" height="250px" />
                        </div>
                    </div>
                    <div class="card-body">
                        <input id="id" type="hidden" class="form-control" name="id" value="{{ $data->id }}">
                        <input id="user_id" type="hidden" class="form-control" name="user_id" value="{{ $data->user_id }}"> 
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
                        <h4 class="m-0 font-weight-bold text-white">Edit Penyelenggara</h4>
                    </div>
                    <div class="card-body">
                        <div class="pl-lg-4">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class=" control-label">Nama Admin Penyelenggara</label>
                                <input id="name" type="text" class="form-control" name="name" value="{{ $data->name }}" required>
                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('instance_name') ? ' has-error' : '' }}">
                                <label for="instance_name" class=" control-label">Nama Instansi</label>
                                <input id="instance_name" type="text" class="form-control" name="instance_name" value="{{ $data->instance_name }}" required>
                                @if ($errors->has('instance_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('instance_name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group{{ $errors->has('instance_address') ? ' has-error' : '' }}">
                                        <label for="instance_address" class=" control-label">Alamat Penyelenggara</label>
                                        <textarea id="instance_address" class="form-control" name="instance_address"  required>{{ $data->instance_address }}</textarea>@if ($errors->has('instance_address'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('instance_address') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email" class=" control-label">Email</label>
                                        <input id="email" type="email" class="form-control" name="email" value="{{ $data->email }}" required>
                                        @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                        <label for="phone" class=" control-label">Telephone</label>
                                        <input id="phone" type="text" class="form-control" name="phone" value="{{ $data->phone }}" required>
                                        @if ($errors->has('phone'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <label for="username" class=" control-label">Username</label>
                                <input id="username" type="text" class="form-control" name="username" value="{{ $data->user->username }}" required>
                                @if ($errors->has('username'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class=" control-label" for="password">Password</label>
                                        <input type="password" id="password" class="form-control" name="password" placeholder="Password">
                                        @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label for="password-confirm" class="col-md-10 control-label">Konfirmasi Password</label>
                                        <input type="password" id="password-confirm" class="form-control" name="password_confirmation" autocomplete="password">
                                        @if ($errors->has('password-confirm'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password-confirm') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-footer pt-3 border-top">
                                <button type="submit" class="btn btn-primary btn-default">Simpan</button>
                                <a href="{{ route('admin.instance.index') }}" class="btn btn-secondary btn-default">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection