
@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('main-content')
    <h1 class="text-center">Modifica tecnologia</h1>
    <div class="container">

        <form action="{{ route('admin.technologies.update', $technology->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Inserisci il nuovo nome della tecnologia</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $technology->title) }}" required>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary my-5">Salva modifiche</button>
            </div>
        </form>
    </div>
@endsection