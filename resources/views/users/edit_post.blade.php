@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Edit Post
@endsection


@section('main-content')
    <div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class= "fa fa-pencil"></i> &nbsp; Tulis Post</h3>
    </div>
    <div class="box-body">
        <form action="{{ route('users.update_post', $post) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="form-group">
                <label>Kategori Post</label>
                <select class="form-control" name="category_id" id="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                                @if ($category->id === $post->category_id)
                                    selected
                                @endif
                            >
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>


            <div class="form-group has-feedback{{ $errors->has('content') ? ' has-error' : '' }}">
                <label>Tulis Post</label>
                <textarea name="content" id="content" class="form-control" rows="3" > {{ $post->content }} </textarea>
                @if ($errors->has('content'))
                    <span class="help-block">
                        <p>{{ $errors->first('content') }}</p>
                    </span>
                @endif
            </div>

            <br>

            <a href="" class="btn btn-danger" style="margin-left: 1100px;"><i class="fa fa-chevron-left"></i> &nbsp; batal &nbsp;</a>
            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> &nbsp; simpan</button>

            <br><br>

        </form>
    </div>
</div>
@endsection