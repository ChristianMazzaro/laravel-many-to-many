
@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('main-content')
    <h1 class="text-center">Modifica categoria</h1>
    <div class="container">

        <form action="{{ route('admin.types.update', $type->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Inserisci il nuovo nome della categoria</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $type->title) }}" required>

                <label for="slug">Inserisci il nuovo slug:</label>
                <input type="text" id="slug" name="slug" class="form-control" value="{{ old('slug', $type->slug) }}" required>

            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary my-5">Salva modifiche</button>
            </div>
        </form>
    </div>
@endsection