<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::orderBy('id','desc')->get();
        $categories = Category::orderBy('id','desc')->get();

        return view('home' ,compact('products','categories'));
    }
    public function search(Request $request)
    {
        if($request->search){
            $searchProduct = Product::where('name','LIKE','%'.$request->search.'%')->latest()->paginate(5);
            return view('search', compact('searchProduct'));
        }else{
            return redirect()->back()->with('message', 'empty search');
        }
        
        
        
        
        // $get_name = $request->search_name;
        // $product = Product::where('name','LIKE','%' .$get_name. '%')->get();
        // return view('search', compact('product'));
    }
    public function searchByCategory(Request $request)
    {
        if($request->search){
            $searchCategory = Category::where('title','LIKE','%'.$request->search.'%')->latest()->paginate(5);
            $products = Product::orderBy('id','desc')->get();
            return view('searchByCategory', compact('searchCategory','products'));
        }else{
            return redirect()->back()->with('message', 'empty search');
        }
        
        
        
        
        // $get_name = $request->search_name;
        // $product = Product::where('name','LIKE','%' .$get_name. '%')->get();
        // return view('search', compact('product'));
    }
    public function searchByTag(Request $request)
    {
        if($request->search){
            $searchTag = Tag::where('title','LIKE','%'.$request->search.'%')->latest()->paginate(5);
            $products = Product::orderBy('id','desc')->get();
            return view('searchByTag', compact('searchTag','products'));
        }else{
            return redirect()->back()->with('message', 'empty search');
        }
        

    }

}
