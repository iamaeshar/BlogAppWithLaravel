@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3>Blogs</h3>
        @if(count($blogs) > 0 )
            @foreach($blogs as $blog)
                <div class="row border border-dark m-2">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <img class="img-fluid" src="storage/upload/{{$blog->blog_img}}">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <h3 class="border-bottom border-success m-1 p-1"> <a href="{{ route('show', $blog->id)}}"> {{$blog->blog_title}} </a> </h3>
                        <small class="border-bottom border-primary m-1 p-1">Created By: {{$blog->user->name}}</small>
                        <small class="border-bottom border-primary m-1 p-1 pull-right">Created On: {{$blog->created_at}}</small>
                        <br><br>
                        <p>{{$blog->blog_text}}</p>
                    </div>
                </div>
            @endforeach
        @else
            <h3>Ooops! No Blog Found!</h3>
        @endif
    </div>

@endsection