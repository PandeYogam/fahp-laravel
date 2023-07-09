<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $this->authorize('admin'); // ini gate
        return view('dashboard.categories.index', [
            'posts' => Post::Where('category_id')->get(),
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.categories.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'slug' => ['required', 'unique:posts'],
            // 'category_id' =>  ['required'],
            'image' => ['image', 'file', 'max:1024'],
            'body' => ['required']
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Category::create($validatedData);

        return redirect('dashboard/categories')->with('success', 'New category has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $posts = Post::where('category_id', $category->id)->get();

        return view('dashboard.categories.show', [
            'category' => $category,
            'posts' => $posts
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */

    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', [
            'category' => $category
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'slug' => [
                'required',
                Rule::unique('categories')->ignore($category->id),
            ],
        ]);

        // if ($request->hasFile('image')) {
        //     $imagePath = $request->file('image')->store('public/images/categories');
        //     $category->image = str_replace('public/', '', $imagePath);
        // }

        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->save();

        // return redirect('dashboard/categories')->with('success', 'Post has been updated!');

        return redirect()->route('dashboard.categories.index')->with('success', 'Post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */

    // public function destroy(Category $category)
    // {

    //     $category->delete();
    //     return redirect('dashboard/categories')->with('success', 'Category has been deleted!');
    // }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('dashboard.categories.index')->with('success', 'Post has been deleted!');
    }
}
