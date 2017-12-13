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
                            <h3 class="box-title">Tentang saya</h3>
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
                                    @foreach($posts as $post)
                                        <h3>{{ $post->user->name }}</h3>
                                        <strong><h6>{{ $post->category->name }} - {{ $post->created_at->diffForHumans() }}</h6></strong>
                                </div>
                                <p>
                                    <h4>{{ $post->content }}</h4> <hr> <b>Komentar</b> <br>
                                    @foreach ($post->comments()->get() as $comment)
                                    <b>{{ $comment->user->name }} - {{ $comment->created_at->diffForHumans() }}</b> <br>
                                    {{ $comment->message }} <br>
                                    @endforeach
                                </p>
                                <ul class="list-inline">
                                    <li class="pull-right">
                                        <a href="" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i>Tambahkan Komentar</a>
                                    </li>
                                    </ul>
                                <form action="{{ route('posts.comment.store', $post) }}" method="post" class="form form-horizonatal">
                                    {{ csrf_field() }}
                                    <input class="form-control input-sm" name="message" id="message" type="text" placeholder="tulis komentar ...">
                                    <input type="submit" class="btn btn-xs btn-primary" value="Komentari">
                                </form> <hr>
                            </div>
                        @endforeach

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {!! $posts->appends(['search' => $search])->render() !!}
                                </div>

                            </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
</section>
</div>
@endsection
