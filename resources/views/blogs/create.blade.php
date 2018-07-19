@extends('layouts.app')

@section('content')
   <h3> <span class="fa fa-plus"></span> Create New Blog Here!</h3>
    {!! Form::open(['action'=>'BlogsController@store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
      <div class="form-group">
         {!! Form::label('blog-title','Blog Title') !!}
         {!! Form::text('blog-title','',['class'=>'form-control','placeholder'=>'Blog Title']) !!}
      </div>
      <div class="form-group">
         {!! Form::label('blog-text','Blog Content') !!}
         {!! Form::textarea('blog-text','',['class'=>'form-control','placeholder'=>'Blog Content']) !!}
      </div>
      <div class="form-group">
         {!! Form::file('blog-cover-img') !!}
      </div>
      {!! Form::submit('submit',['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection