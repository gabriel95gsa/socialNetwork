@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                        Create Post
                </div>

                <div class="panel-body">
                    <form method="POST" action="/posts">
                        {{ csrf_field() }}

                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                        <div class="form-group">
                        <label for="content">Content</label>

                        <textarea name="content" class="form-control"></textarea>
                        </div>

                        <input type="submit" class="btn btn-success pull-right">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection