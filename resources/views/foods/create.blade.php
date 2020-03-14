@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create new food</div>

                <div class="card-body">
                    <form action="/foods" method="POST">
                    @csrf
                        <input class="form-control" type="text" placeholder="Food name" name="name">
                        <input class="form-control" type="number" placeholder="Food price($)" name="price">
                        <textarea class='form-control' name="description" id="" cols="30" rows="5" placeholder="Food description"></textarea>
                        <fieldset class='mt-2'>
                        <label>Extra toppings:</label> <br/>
                        <input type="checkbox" name="topping[]" value="Ketchup">Ketchup<br/>
                        <input type="checkbox" name="topping[]" value="Eggs">Eggs<br/>
                        <input type="checkbox" name="topping[]" value="Salad">Salad<br/>
                        <input type="checkbox" name="topping[]" value="Cheese">Cheese<br/>
                        
                        </fieldset>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
