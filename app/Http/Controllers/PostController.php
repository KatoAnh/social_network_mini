<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Post;




class PostController extends Controller
{
   

    /**
     * Display a listing of the resource.
     */
   public function index()
    {
        $posts = Post::latest()->limit(5)->get();
        return response()->json($posts);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Post/create');
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $data =  $request->validated();
        if($request->hasFile('image')){
            $data['image'] = $request->file('image')->store('posts','public');
        }

        $data['user_id'] = auth()->id();
        Post::create($data);
        return redirect()->back()->with('success', 'Tạo bài viết thành công');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
      $data = Post::findOrFail($id);
      return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Post::with('user')->findOrFail($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

