@extends('layouts.admin')

@section('main-content')
<div class="content">
    <form method="POST" action="{{ route('admin.question.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="col-lg-8 order-lg-1">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h4 class="m-0 font-weight-bold text-white">Tambah Pertanyaan</h4>
                </div>
                @include('layouts.components.flash')
                <div class="card-body">
                    <h6 class="heading-small text-muted mb-4">Informasi Pertanyaan</h6>

                    <div class="pl-lg-4">
                        <div class="form-group{{ $errors->has('question') ? ' has-error' : '' }}">
                            <label for="question" class="col-md-4 control-label">Pertanyaan</label>
                            <!-- <input id="question" type="text" class="form-control" name="question" value="{{ old('question') }}" required> -->
                            <textarea class="ckeditor form-control" id="question" name="question" value="{{ old('question') }}" required></textarea>
                            @if ($errors->has('question'))
                            <span class="help-block">
                                <strong>{{ $errors->first('question') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('option1') ? ' has-error' : '' }}">
                            <label for="option1" class="col-md-4 control-label">Opsi A</label>
                            <input id="option1" type="text" class="form-control" name="option1" value="{{ old('option1') }}" required>
                            @if ($errors->has('option1'))
                            <span class="help-block">
                                <strong>{{ $errors->first('option1') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('option2') ? ' has-error' : '' }}">
                            <label for="option2" class="col-md-4 control-label">Opsi B</label>
                            <input id="option2" type="text" class="form-control" name="option2" value="{{ old('option2') }}" required>
                            @if ($errors->has('option2'))
                            <span class="help-block">
                                <strong>{{ $errors->first('option2') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('option3') ? ' has-error' : '' }}">
                            <label for="option3" class="col-md-4 control-label">Opsi C</label>
                            <input id="option3" type="text" class="form-control" name="option3" value="{{ old('option3') }}" required>
                            
                                @if ($errors->has('option3'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('option3') }}</strong>
                                </span>
                                @endif
                        </div>
                        <div class="form-group{{ $errors->has('option4') ? ' has-error' : '' }}">
                            <label for="option4" class="col-md-4 control-label">Opsi D</label>
                            <input id="option4" type="text" class="form-control" name="option4" value="{{ old('option4') }}" required>
                                @if ($errors->has('option4'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('option4') }}</strong>
                                </span>
                                @endif
                        </div>
                        <div class="form-group{{ $errors->has('option5') ? ' has-error' : '' }}">
                            <label for="option5" class="col-md-4 control-label">Opsi E</label>
                            <input id="option5" type="text" class="form-control" name="option5" value="{{ old('option5') }}" required>
                                @if ($errors->has('option5'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('option5') }}</strong>
                                </span>
                                @endif
                        </div>
                        <div class="form-group{{ $errors->has('answer') ? ' has-error' : '' }}">
                            <label for="answer" class="col-md-4 control-label">Jawaban</label>
                            <input id="answer" type="text" class="form-control" name="answer" value="{{ old('answer') }}" required>
                                @if ($errors->has('answer'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('answer') }}</strong>
                                </span>
                                @endif
                        </div>
                        <div class="form-footer pt-3 border-top">
                            <button type="submit" class="btn btn-primary btn-default">Simpan</button>
                            <a href="{{ route('admin.question.index')}}" class="btn btn-secondary btn-default">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection