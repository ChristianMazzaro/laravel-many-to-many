@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('main-content')
    <h1 class="text-center">Aggiungi una nuova tecnologia</h1>
    <div class="container">

        <form action="{{ route('admin.technologies.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title" class="form-label">Inserisci il nome della tecnologia:</label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>

            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary my-5">Crea una nuova tecnologia</button>
            </div>
        </form>
    </div>
@endsection