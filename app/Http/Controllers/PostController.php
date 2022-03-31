<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Exports\PostsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PostsImport;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    public function home()
    {
        // return view('welcome', [
        //     'posts' => Post::latest()->paginate(18)
        // ]);
        $post = Post::with('user')
        ->orderByDesc('id')->paginate(4);
            return view('welcome',[
                'post'=>  $post
            ]);
    }
    public function index()
    {
        $posts = Post::find(4);
        // dd($posts);
        // $posts = Post::find(1);
        return view('posts.post');

        
    }
    
    public function store(Request $request)
    {
        // dd($request);
        // $post = Post::find(1);
        $user = auth()->user();
        if(!auth()->user()->subscripton_id)
        // @empty(auth()->user()->subscripton_id)
        {
            return redirect('/subscripbe');   
        }
        else{
            $post = new Post;

            $post->title = $request->get('title');
            $post->description = $request->get('description');
            $post->user_id = auth()->id();
            
            $post->save();
            
            return redirect('/post/view');            
        }
        // $post = new Post;

        // $post->title = $request->get('title');
        // $post->description = $request->get('description');
        // $post->user_id = auth()->id();
        
        // $post->save();
        
        // return redirect('/post/view');
    }
    public function view()
    {
        // dd($post);
            
        $isAdmin = Auth()->user()->isAdmin;
        if($isAdmin == 1)
        {
            
        $post = Post::with('user')
        ->orderByDesc('id')->paginate(3);
            return view('admin.postView',[
                'post'=>  $post
            ]);
        }
        else{
            
        $post = Post::with('user')
        ->where('user_id', auth()->user()->id)
        ->orderByDesc('id')->paginate(3);
            return view('posts.view',[
                'post'=>  $post
            ]);
        }
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileExport(Request $request) 
    {
        return Excel::download(new PostsExport, 'posts-collection.xlsx');
    }  
    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileImport(Request $request) 
    {
        // Log::debug($request);
        $request->validate([
            'file' => 'required|file|mimes:xls,xlsx'
        ]);
    
        $path = $request->file('file');
        // Log::debug($path);
    
        Excel::import(new PostsImport, $path);
    
    
        return response()->json(['message' => 'uploaded successfully'], 200);
    }  
}
