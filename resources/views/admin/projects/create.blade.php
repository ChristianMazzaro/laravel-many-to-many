@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('main-content')
    <h1 class="text-center">Aggiungi un nuovo progetto</h1>
    <div class="container">

        <form action="{{ route('admin.projects.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Inserisci il titolo del progetto</label>
                <input type="text" id="title" name="title" class="form-control" required>

                <label for="slug">Inserisci lo slug:</label>
                <input type="text" id="slug" name="slug" class="form-control" required>

                <label for="content">Inserisci la descrizione del progetto:</label>
                <input type="text" id="content" name="content" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="type_id" class="form-label">Tipologia</label>
                <select class="form-select " id="type_id" name="type_id">
                    <option selected>Scegli una tipologia per il progetto...</option>
                    @foreach ($types as $type)
                    <option value="{{$type->id}}">{{$type->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary my-5">Crea un nuovo progetto</button>
            </div>
        </form>
    </div>
@endsection