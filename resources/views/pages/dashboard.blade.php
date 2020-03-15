@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <p>You are logged in!</p>
                   <hr>
                   @if (count($userFoods) > 0)
                   <table class='table table-stripped'>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                   <tbody>
                   @foreach($userFoods as $food) 
                        <tr>
                            <td>{{$food->name}}</td>
                            <td><a class='btn btn-secondary' href="{{Route('foods.edit', $food->id)}}">Edit</a></td>
                            <td>
                                <form action="{{Route('foods.destroy', $food->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                   @endforeach
                    </tbody>
                   </table>
                   @else
                    <strong>{{Auth()->user()->name}}, you don't have any foods created!</strong>
                   @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
