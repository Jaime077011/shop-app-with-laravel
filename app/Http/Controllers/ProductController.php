<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('id','desc')->paginate(10);
        $categories = Category::orderBy('id','desc')->get();
        $tags = Tag::orderBy('id','desc')->get();

        return view('products.index', compact('products', 'categories', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('id','desc')->get();
        $tags = Tag::orderBy('id','desc')->get();

        return view('products.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        // $file_extension = $request->image->extension();
        // $file_name = time().'.'.$file_extension;
        // $path = 'images';
        // $request->image->move($path,$file_name);

        // $imageName = time().'.'.$request->image->extension();  
       
        // $request->image->move(public_path('images'), $imageName);
        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        // $location = public_path('public/images/' . $filename);
        $request->image->move(public_path('images/'), $filename);


        $this->validate($request, [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'nullable|string',
            'price' => 'nullable|integer',


        ]);
        // $insert = [
        //     'slug' => Str::of($request->name)->slug('-'),
        //     // 'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
        //     'name' => $request->name,
        // ];
        $product = new Product;
        $product->name = $request->input('name');
        $product->slug = Str::of($request->name)->slug('-');

        $product->description = $request->input('description');
        $product->category_id = $request->input('category_id');
        $product->price = $request->input('price');
        $product->image = $filename;


        $product->save();

        $product->tags()->sync($request->tags, false);



        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::where('id', $id)->firstOrFail();
        $categories = Category::orderBy('id','desc')->get();

        return view('products.show', compact('product','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
