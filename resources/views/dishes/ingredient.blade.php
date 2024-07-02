@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Ricette con questi ingredienti: {{ $ingredient->name }}</h2>

    <div class="row">
        @foreach ($dishes as $dish)
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card">
                @if (filter_var($dish->poster, FILTER_VALIDATE_URL))
                <img src="{{ $dish->poster }}" class="card-img-top" alt="{{ $dish->name }}">
                @elseif($dish->poster === null)
                <img src="{{ asset('storage/default/default.png')}}" class="card-img-top"
                    alt="{{ $dish->name }}">
                @else
                <img src="{{ asset('storage/' . $dish->poster) }}" class="card-img-top" alt="{{ $dish->name }}">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $dish->name }}</h5>
                    <p class="card-text">{{ $dish->description }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>

   
</div>
@endsection