@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('main-content')
  <div class="row mb-4">
      <div class="col">
          <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title">{{$type->title}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{$type->slug}}</h6>
                <a href="{{ route('admin.types.edit', ['id' => $type->id]) }}" class="btn btn-warning my-2 ">Modifica</a>
                <form action="{{ route('admin.types.destroy', ['id' => $type->id]) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger">Elimina</button>
                </form>
                <a href="{{ route('admin.projects') }}" class="card-link">torna ai progetti</a>
                <a href="{{ route('admin.types') }}" class="card-link">torna alle tipologie</a>
              </div>
            </div>
      </div>
  </div>
  <div class="row">
    <div class="col bg-dark">
      <h2>
        Progetti della categoria
      </h2>

      <ul>
        @foreach ($type->projects as $project)
          <li>
            <a href="{{ route('admin.projects.show', $project->id) }}">
              {{$project->title}}
            </a>
          </li>
        @endforeach
      </ul>
    </div>
  </div>

@endsection