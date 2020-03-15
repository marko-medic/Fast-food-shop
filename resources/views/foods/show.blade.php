@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Food item</div>

                <div class="card-body">
                    <p><strong>Food name: </strong> {{$food->name}}</p>
                    <p><strong>Food price: </strong>${{$food->price}}</p>
                    <p><strong>Food Description: </strong>{!!$food->description!!}</p>
                    @if (!empty($food->toppings))
                    <p><strong>Toppings:</strong></p>
                    <ul>
                        @foreach($food->toppings as $topping)
                        <li>{{$topping}}</li>
                        @endforeach
                    </ul>
                    @else
                        <strong>- No toppings</strong>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
