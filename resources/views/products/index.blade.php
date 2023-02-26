@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
        
                <h1 class='text-center my-5'>Products Page</h1>
                <a href="{{ route('products.create') }}" class="btn btn-primary float-end btn-lg my-2">create product</a>
                <a href="{{ route('home') }}" class="btn btn-outline-dark btn-lg my-2">Dashboard</a>


                <div class='card'>
                    <div class='card-header'>
                        products
                    </div>
                    <div class="card-body">
                        <div>
                            <table class="table">
                                <thead class="table-dark">
                                  <tr>
                                    <th scope="col">image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Tags</th>
                                    <th scope="col">Price</th>
                                    <th scope="col"></th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)

                                    <tr>
                                        <th scope="row"><img src={{asset('images/'.$product->image)}} width="120px" height="60px" alt=""></th>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->description}}</td>
                                        <td>
                                            @foreach($categories as $category)
                                                @if($product->category_id == $category->id)
                                                    {{$category->title}}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($product->tags as $tag)
                                            {{ $tag->title }},
                                            @endforeach
                                        </td>
        
                                        <td>{{$product->price}}</td>
                                        <td><a href="{{route('products.show', $product->id)}}" class="btn btn-dark btn-sm float-end ">view</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                    </div>
                    <div class="justify-content-center m-2">{{ $products->links()}}</div>

                    
                </div>

                </div>
                
            </div>
            
    </div>
    
@endsection