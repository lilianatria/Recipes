@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card shadow-sm">
                <div class="card-body p-5 bg-light rounded">
                    <h2 class="mb-4">Modifica Ricetta</h2>
                    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form method="POST" action="{{ route('dishes.update', $dish->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                       
                        <div class="mb-3">
                            <label for="name" class="form-label">Nome</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $dish->name }}">
                        </div>

                       


                       
                        <div class="mb-3">
                            <label for="region" class="form-label">Località di origine</label>
                            <select name="region_id" id="region" class="form-control" required>
                                @foreach($regions as $region)
                                    <option value="{{ $region->id }}" {{ $dish->region_id == $region->id ? 'selected' : '' }}>{{ $region->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        
                        <div class="mb-3">
                            <label for="ingredients" class="form-label">Ingredienti</label>
                            <select name="ingredients[]" id="ingredients" class="form-control" multiple required>
                                @foreach($ingredients as $ingredient)
                                    <option value="{{ $ingredient->id }}" {{ in_array($ingredient->id, $dish->ingredients->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $ingredient->name }}</option>
                                @endforeach
                            </select>
                        </div>

                       
                        <div class="mb-3">
                            <label for="difficulty" class="form-label">Difficoltà</label>
                            <select name="difficulty_id" id="difficulty" class="form-control" required>
                                @foreach($difficulties as $difficulty)
                                    <option value="{{ $difficulty->id }}" {{ $dish->difficulty_id == $difficulty->id ? 'selected' : '' }}>{{ $difficulty->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Costo</label>
                            <select name="price_id" id="price" class="form-control" required>
                                @foreach($prices as $price)
                                    <option value="{{ $price->id }}" {{ $dish->price_id == $price->id ? 'selected' : '' }}>{{ $price->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="preparation_min" class="form-label">Tempo di preparazione in minuti </label>
                            <input type="number" name="preparation_min" id="preparation_min" class="form-control" value="{{ $dish->preparation_min }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="cooking_min" class="form-label">Tempo di cottura in minuti </label>
                            <input type="number" name="cooking_min" id="cooking_min" class="form-control" value="{{ $dish->cooking_min }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="description" class="form-label">Descrizione</label>
                            <textarea name="description" id="description" class="form-control" required>{{ $dish->description }}</textarea>
                        </div>

                       
                        <div class="mb-3">
                            <label for="poster" class="form-label">Immagine della ricetta</label>
                            <input type="file" name="poster" id="poster" class="form-control-file">
                            <img src="{{ asset('storage/' . $dish->poster) }}" alt="{{ $dish->name }}" class="img-thumbnail mt-2" style="max-width: 150px;">
                        </div>

                        <button type="submit" class="btn btn-primary">Salva Modifiche</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection