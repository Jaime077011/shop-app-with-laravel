@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
        
                <h1 class='text-center my-5'>Tags Page</h1>
                <a href="{{ route('tags.create') }}" class="btn btn-primary my-2 btn-lg float-end">Create Tag</a>

                <a href="{{ route('home') }}" class="btn btn-outline-dark btn-lg my-2">Dashboard</a>

                <div class='card'>
                    <div class='card-header'>
                        Tags
                    </div>
                    <div class="card-body">
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

                        <ul class='list-group'>
                            @foreach($tags as $tag)
                                <li class='list-group-item'>
                                    {{ $tag->title }}  
                                    <a href="#" class="btn btn-danger btn-sm my-2 ms-2 float-end">Delete</a>

                                    <a href="#" class="btn btn-success btn-sm my-2  float-end ">Edit</a>
                                </li>

                            @endforeach
                        </ul>
                    </div>
                    
                </div>
                <div class="justify-content-center m-2">{{ $tags->links()}}</div>
                </div>
            </div>
            
    </div>
    
@endsection