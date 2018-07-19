<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Blog;

class BlogsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs  = Blog::all();
        return view('blogs.index')->with('blogs',$blogs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*Validation*/
        $this->validate($request,[
           'blog-title'=>'required',
           'blog-text'=>'required',
            'blog-cover-img'=>'image|nullable|max:1999'
        ]);


        /*File Upload Handle*/
        if ($request->hasFile('blog-cover-img')){

            /*File Name With Extesnion*/
            $fileNameWithExt = $request->file('blog-cover-img')->getClientOriginalName();

            /*Just File Name*/
            $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);

            /*Just Extension*/
            $extension = $request->file('blog-cover-img')->getClientOriginalExtension();

            /*Filename to Store*/
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            /*Upload image*/
            $path = $request->file('blog-cover-img')->storeAs('public/upload',$fileNameToStore);

        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        /*Blog posting*/
        $blog = new Blog;
        $blog->blog_title = $request->input('blog-title');
        $blog->blog_text= $request->input('blog-text');
        $blog->blog_img=  $fileNameToStore;
        $blog->user_id = auth()->user()->id;
        $blog->save();

        return redirect('/')->with('success','Blog Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::find($id);
        return view('blogs.show')->with('blog',$blog);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
