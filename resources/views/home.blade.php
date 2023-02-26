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
                                <a href="{{ route('products.create') }}" class="btn btn-outline-primary  my-2 float-start">Create Product</a>
                                <a href="{{ route('categories.index') }}" class="btn btn-outline-success  ms-2 my-2 float-end">Categories</a>
                                <a href="{{ route('tags.index') }}" class="btn btn-outline-danger  my-2 float-end">Tags</a>
                            </div>
                            <div class="card-body">
                                {{-- <div class="form-search">
                                    <div class="form-group">
                                        <input type="text" name="search_name" class="form-controll">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div> --}}
                                    <label class="ms-1">Search products by Name</label>

                                    
                                    <form action="{{ route('search')}}" class="my-2" method="GET">
                                        
                                        <div class="row">

                                        <div class="form-outline col-md-6">
                                            <input type="search" id="form1" class="form-control" name="search" value="" placeholder="search"/>
                                        </div>
                                        <button type="button" class="btn btn-primary btn-s flolat-end col-md-2">
                                            Search
                                        </button>
                                    </div>

                                    </form>
                                <hr>
                                <label class="ms-1">Search products by Category</label>

                                <form action="{{ route('searchByCategory')}}" class=" my-2" method="GET">
        
                                    <div class="row">
        
                                    <div class="form-outline col-md-6">
                                        <input type="search" id="form1" class="form-control" name="search" value="" placeholder="search"/>
                                    </div>
                                    <button type="button" class="btn btn-primary btn-s flolat-end col-md-2">
                                        Search
                                    </button>
                                </div>
                                </form>
                                <hr>

                                <label class="ms-1">Search products by Tag</label>

                                <form action="{{ route('searchByTag')}}" class=" my-2" method="GET">

                                    <div class="row">

                                    <div class="form-outline col-md-6">
                                        <input type="search" id="form1" class="form-control" name="search" value="" placeholder="search"/>
                                    </div>
                                    <button type="button" class="btn btn-primary btn-s flolat-end col-md-2">
                                        Search
                                    </button>
                                </div>
                                </form>
                                

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
