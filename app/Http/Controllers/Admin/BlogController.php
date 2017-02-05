<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use App\Repositories\BlogRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tag;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Gate;

class BlogController extends AdminController
{
    public function __construct(BlogRepository $blog_rep)
    {
        $this->middleware(function($request, $next){
            if(Gate::denies('VIEW_ADMIN_BLOG')){
                abort(403);
            }
            return $next($request);
        });

        parent::__construct();
        $this->blog_rep = $blog_rep;
        $this->template = env('THEME').'.admin.blog.blog_template';
    }

    public function index()
    {
        $blogs = $this->blog_rep->getBlog();
        $this->content = view(env('THEME').'.admin.blog.blog_list')->with('blogs', $blogs);

        return $this->renderTemplate();
    }

    public function create()
    {
        $tags = Tag::pluck('name', 'id');
        $this->content = view(env('THEME').'.admin.blog.blog_form_edit')->with('tags', $tags);
        return $this->renderTemplate();
    }

    public function store(Request $request)
    {

        $data = $request->except('image', 'tags');

        $blog = new Blog();

        if ($request->hasFile('image')){
            $image = $request->file('image');
            if($image->isValid())
            {
                Image::make($image);
                $extention = $image->getClientOriginalExtension();
                $file_name = time().'.'.$extention;
                $file_path = public_path().'/images/blog/';
                $img = Image::make($image);
                $img->crop(300, 200)->save($file_path.$file_name);
                $data['image'] = $file_name;
            }
        }


        $blog->fill($data)->save();
        $blog->tags()->sync($request->input('tags'));

        return redirect('admin/blogs');
    }

    public function edit($id)
    {

        if (Gate::denies('edit', Blog::class))
        {
            abort(403);
        }

        $blog = Blog::find($id);

        $tags = Tag::pluck('name', 'id');
        $this->content = view(env('THEME').'.admin.blog.blog_form_edit')->with('tags', $tags)->with('blog', $blog);
        return $this->renderTemplate();

        return $this->renderTemplate();
    }

    public function update(Request $request, $id)
    {
        $data = $request->except('image', 'tags');
        $blog = Blog::find($id);

        if ($request->hasFile('image')){
            $image = $request->file('image');
            if($image->isValid())
            {
                Image::make($image);
                $extention = $image->getClientOriginalExtension();
                $file_name = time().'.'.$extention;
                $file_path = public_path().'/images/blog/';
                $img = Image::make($image);
                $img->crop(300, 200)->save($file_path.$file_name);
                $data['image'] = $file_name;
            }
        }

        $blog->fill($data)->save();

        if($request->input('tags'))
        {
            $blog->tags()->sync($request->input('tags'));
        }else{
            $blog->tags()->detach();
        }


        return redirect('admin/blogs');

    }

    public function destroy($id)
    {
        if (Gate::denies('destroy', Blog::class)){
            abort(403);
        }

        $blog = Blog::find($id);
        $file_name = $blog->image;
        $file_path = public_path().'/images/blog/'.$file_name;
//        unlink($file_path);
        $blog->delete();
        return redirect('admin/blogs');
    }
}
