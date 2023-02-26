@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


            <div class=" mt-5 mb-5">
                
                <div class="row d-flex justify-content-center">
                    
                    <div class="col-md-10">
                        <a href="{{ route('products.index') }}" class="btn btn-dark btn-lg my-2 ">Back</a>
                        <a href="#" class="btn btn-danger btn-lg my-2 ms-2 float-end">Delete</a>

                        <a href="#" class="btn btn-success btn-lg my-2  float-end ">Edit</a>


                        <div class="card">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="images p-3">
                                        <div class="text-center p-4"> <img id="main-image" src={{asset('images/'.$product->image)}} width="250"/> </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="product p-4">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center"> <i class="fa fa-long-arrow-left"></i>  </div> <i class="fa fa-shopping-cart text-muted"></i>
                                        </div>
                                        <div class="mt-4 mb-3"> 
                                            <h4 class="text-uppercase">{{$product->name}}</h4>
                                            <strong>Category:</strong>

                                            <span class="text-uppercase text-muted brand">
                                                @foreach($categories as $category)
                                                @if($product->category_id == $category->id)
                                                    {{$category->title}}
                                                @endif
                                                @endforeach
                                            </span>

                                            <div class="price d-flex flex-row align-items-center"><strong>Price: </strong>
                                                <span class="act-price"> {{ $product->price }} $</span>
                                            </div>
                                            <strong>Tags:</strong>

                                            <span class=" text-muted brand">
                                                @foreach ($product->tags as $tag)
                                                {{ $tag->title }},
                                                @endforeach
                                            </span>
                                        </div>
                                        <span class="act-price">Description:</span>
                                        <h5 class="about">{{$product->description}}</h5>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection




























