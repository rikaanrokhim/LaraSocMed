@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-md-3">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="box box-primary">
                            <div class="box-body box-profile">
                                <img class="profile-user-img img-responsive img-circle" src="{{ asset(auth()->user()->avatar) }}" alt="User Image" />
                                <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
                                &nbsp;<a href="{{ route('users.edit') }}" class="btn btn-primary">Edit Profil</a>
                                &nbsp;<a href="{{ route('users.create_post') }}" class="btn btn-primary">Posting Sesuatu</a>
                            </div>
                        </div>
                    </form>

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">{{Emoji::findByName("smiley")}} &nbsp; Tentang saya</h3>
                        </div>
                        <div class="box-body">
                            <strong><i class="fa fa-circle margin-r-5"></i> {{ Auth::user()->name }} </strong>
                            <p class="text-muted"> {{ Auth::user()->about }} </p>
                            <hr>
                            <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes </strong>
                            <p> {{ Auth::user()->notes }} </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#activity" data-toggle="tab">Post</a></li>
                        </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            <div class="post">
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm" src="{{ asset(auth()->user()->avatar) }}" alt="User Image" />
                                    <span class="username">
                                        <a href="#">{{ Auth::user()->name }}</a>
                                        <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                                    </span>
                                        @foreach($posts as $post)
                                        <span class="description">
                                            {{ $post->category->name }} - {{ $post->created_at->diffForHumans() }}
                                        </span>
                                        <p> {{ $post->content }} </p>
                                </div>
                                <ul class="list-inline">
                                    <a href="{{ route('users.edit_post', $post) }}" class="link-black text-sm"><i class="fa fa-pencil margin-r-5"></i> Edit</a>
                                    <form class="" action="{{ route('users.destroy_post', $post) }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                            <button type="submit" class="link-black text-sm"><i class="fa fa-trash margin-r-5"></i>Hapus</button>
                                    </form>
                                </ul>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>
</div>
@endsection
