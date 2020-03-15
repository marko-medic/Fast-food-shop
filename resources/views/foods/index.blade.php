@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Food list</div>

                <div class="card-body">
                @if(!count($foodList)) 
                    <h3>There are no available food yet!</h3>
                @else
                   @foreach($foodList as $food)
                    <p><strong>Food name: </strong><a href="{{Route('foods.show', $food->id)}}">{{$food->name}}</a></p>
                    <p><strong>Food price: </strong>${{$food->price}}</p>
                     @auth
                    <div class="actions">
                        <a class="btn btn-secondary" href="{{Route('foods.edit', $food->id)}}">EDIT</a>
                        <span class="m-2">|</span>
                         <form class="d-inline" action="{{Route('foods.destroy', $food->id)}}" method="POST">
                        @csrf
                        @method("DELETE")
                            <button class="btn btn-danger">DELETE</button>
                        </form>
                    </div>
                        @endauth
                    <hr>
                   @endforeach
                   {{$foodList->links()}}
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
