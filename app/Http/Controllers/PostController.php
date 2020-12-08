<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Post;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts = new Post;
        $order = '';
        if (isset($request->order)) {
            $posts = $posts->orderBy('publication_date', $request->order);
            $order = $request->order;
        } else {
            $posts = $posts->orderBy('publication_date', 'DESC');
        }
        $posts = $posts->paginate(12);
        return view('posts', compact('posts', 'order'));
    }



    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.add');
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'required|string|between:2,100',
            'detail'      => 'required|string|between:2,1000',
            ]);
        $data = $request->all();

        if (isset($data['publish'])) {
            $data['publication_date'] = date('Y-m-d');
            unset($data['publish']);
        }

        $data['user_id'] = Auth::user()->id;
        Post::create($data);
            
        return redirect()->route('home')
            ->with('success', 'Blog created successfully.');
    }
}
