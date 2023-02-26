@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

                <div class="row justify-content-center">
                    <div class="col-md-8">
                
                        {{-- <a href="{{ route('categories.create') }}" class="btn btn-primary  my-2">create category</a> --}}
        
                        <div class='card'>
                            <div class='card-header'>
                                <a href="{{ route('home') }}" class="btn btn-outline-primary  my-2 float-start">Dashboard</a>

                            </div>
                            <div class="card-body">
                                {{-- <div class="form-search">
                                    <div class="form-group">
                                        <input type="text" name="search_name" class="form-controll">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div> --}}
                                


                                <ul class='list-group'>
                                    @foreach($searchProduct as $product)
                                        <li class='list-group-item'>
                                            {{ $product->name }}  
                                            <a href="" class="btn btn-primary btn-sm float-end m-2">view</a>
                                        </li>
        
                                    @endforeach
                                </ul>
                            </div>

                        </div>
                        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary  ms-2 my-2 float-end">View all products</a>

                    {{-- <div class="justify-content-center m-2">{{ $products->links()}}</div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
