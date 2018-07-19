@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3>Blogs</h3>
        <div>
            <img class="img-fluid" src="storage/upload/{{$blog->blog_img}}">
        </div>
        <div>
            <h3 class="border-bottom border-success m-1 p-1">{{$blog->blog_title}}</h3>
            <small class="border-bottom border-primary m-1 p-1">Created By: {{$blog->user->name}}</small>
            <small class="border-bottom border-primary m-1 p-1 pull-right">Created On: {{$blog->created_at}}</small>
            <br><br>
            <p>{{$blog->blog_text}}</p>
        </div>
    </div>
@endsection