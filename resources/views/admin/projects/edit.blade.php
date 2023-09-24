
@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('main-content')
    <h1 class="text-center">Modifica progetto</h1>
    <div class="container">

        <form action="{{ route('admin.projects.update', $project->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Inserisci il nuovo titolo del progetto</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $project->title) }}" required>

                <label for="slug">Inserisci il nuovo slug:</label>
                <input type="text" id="slug" name="slug" class="form-control" value="{{ old('slug', $project->slug) }}" required>

                <label for="content">Inserisci la nuova descrizione del progetto:</label>
                <input type="text" id="content" name="content" class="form-control" value="{{ old('content', $project->content) }}" required>
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
                <button type="submit" class="btn btn-primary my-5">Salva modifiche</button>
            </div>
        </form>
    </div>
@endsection