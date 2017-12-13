@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <center>
            <div class="alert alert-success" style="font-weight: 20px;">Selamat Datang</div>
          </center>
        </div>
      </div>
    </section>
</div>
@endsection
