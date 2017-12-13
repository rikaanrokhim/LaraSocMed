@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
    <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edti Profil</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nama</label>

                            <div class="col-md-6">
                                <input id="name" type="name" class="form-control" name="name" value="{{ old('name') ?? auth()->user()->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
                            <label for="avatar" class="col-md-4 control-label">Foto Profil</label>

                            <div class="col-md-6">
                                <img src="{{ asset(auth()->user()->avatar) }}" alt="" height="128">
                                <input id="avatar" type="file" class="form-control" name="avatar" required>

                                @if ($errors->has('avatar'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('about') ? ' has-error' : '' }}">
                            <label for="about" class="col-md-4 control-label">Tentang Anda</label>

                            <div class="col-md-6">
                                <textarea name="about" id="about" rows="8" cols="70">

                                </textarea>

                                @if ($errors->has('about'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('about') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('notes') ? ' has-error' : '' }}">
                            <label for="notes" class="col-md-4 control-label">Kutipan Anda</label>

                            <div class="col-md-6">
                                <textarea name="notes" id="notes" rows="8" cols="70">

                                </textarea>

                                @if ($errors->has('notes'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('notes') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
