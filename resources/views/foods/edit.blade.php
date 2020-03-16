@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit food</div>

                <div class="card-body">
                <form action="/foods/{{$food->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                        <input class="form-control" type="text" placeholder="Food name" name="name" value="{{$food->name}}">
                        <input class="form-control" type="number" placeholder="Food price($)" name="price" value="{{$food->price}}">
                        <textarea id='summary-ckeditor' class='form-control' name="description" id="" cols="30" rows="5" placeholder="Food description">{{$food->description}}</textarea>
                        <fieldset class='mt-2'>
                            <label>Extra toppings:</label> <br/>
                            <input type="checkbox" name="toppings[]" value="Ketchup" {{in_array('Ketchup', $food->toppings) ? 'checked' : ''}}>Ketchup<br/>
                            <input type="checkbox" name="toppings[]" value="Eggs" {{in_array('Eggs', $food->toppings) ? 'checked' : ''}}>Eggs<br/>
                            <input type="checkbox" name="toppings[]" value="Salad" {{in_array('Salad', $food->toppings) ? 'checked' : ''}}>Salad<br/>
                            <input type="checkbox" name="toppings[]" value="Cheese" {{in_array('Cheese', $food->toppings) ? 'checked' : ''}}>Cheese<br/>
                        </fieldset>
                    <img class="img my-2" style="width:200px" src="/storage/featured_images/{{$food->featured_image}}" alt="featured-image">
                    <br>
                        <input type="file" name="featured_image">
                        <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
