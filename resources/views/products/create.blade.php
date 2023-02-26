@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ route('products.index') }}" class="btn btn-dark btn-lg my-2">Back</a>

            <div class="card card-default">
                <div class="card-header">Create new Product</div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group m-2">
                            <input type="text" class="form-control" placeholder="Name" name="name">
                        </div>
                        <div class="form-group m-2">
                            <textarea name="description" cols="5" rows="5" placeholder="Description" class="form-control"></textarea>
                        </div>
                        <div class="form-group m-2">
                            <input class="form-control" id="validationCustom02" type="text" placeholder="price" name="price">
                            {{-- <input type="text" class="form-control" aria-label="Dollar amount (with dot and two decimal places)" name="price">
                            <span class="input-group-text">$</span>
                            <span class="input-group-text">0.00</span> --}}
                        </div>
                        <div class="form-group m-2">
                            {{-- <label class="input-group-text" for="inputGroupSelect01" name='category_id'>Options</label> --}}
                            <select class="form-select" id="inputGroupSelect01" name="category_id">
                              <option selected>Choose a Category</option>
                              @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="form-group m-2">
                            <input class="form-control dropify" id="validationCustom05" type="file" name="image">
                            {{-- <label class="input-group-text" for="inputGroupFile02">Upload</label> --}}
                        </div>
                        <div class="form-group m-2">
                            <select class="form-select" id="multiple-select-field" name='tags[]' data-placeholder="Choose anything" multiple>
                                @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                                @endforeach
                            </select>

{{-- 

                            <select class="selectpicker" id="validationTags" multiple>
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                                @endforeach
                            </select> --}}
                        </div>


                        <div class="form-group text-center m-2">
                            <button class="btn btn-success">Create Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
<script>
    $( '#multiple-select-field' ).select2( {
        theme: "bootstrap-5",
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        placeholder: $( this ).data( 'placeholder' ),
        closeOnSelect: false,
        // val: json_encode($product->tags()->getRelatedIds())
    } );
</script>

@endsection