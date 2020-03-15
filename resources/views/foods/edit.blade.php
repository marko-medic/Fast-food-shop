@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit food</div>

                <div class="card-body">
                <form action="/foods/{{$food->id}}" method="POST">
                    @csrf
                    @method('put')
                        <input class="form-control" type="text" placeholder="Food name" name="name" value="{{$food->name}}">
                        <input class="form-control" type="number" placeholder="Food price($)" name="price" value="{{$food->price}}">
                        <textarea id='summary-ckeditor' class='form-control' name="description" id="" cols="30" rows="5" placeholder="Food description">{{$food->description}}</textarea>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
