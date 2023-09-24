@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('main-content')
    <h1 class="text-center">Aggiungi una nuova categoria</h1>
    <div class="container">

        <form action="{{ route('admin.types.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title" class="form-label">Inserisci il nome della categoria</label>
                <input type="text" id="title" name="title" class="form-control" required>

                <label for="slug" class="form-label">Inserisci lo slug:</label>
                <input type="text" id="slug" name="slug" class="form-control" required>

            </div>

            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary my-5">Crea una nuova categoria</button>
            </div>
        </form>
    </div>
@endsection