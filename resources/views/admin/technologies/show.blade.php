@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('main-content')
  <div class="row mb-4">
      <div class="col">
          <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title">{{$technology->title}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{$technology->slug}}</h6>
                <a href="{{ route('admin.technologies.edit', [$technology->id]) }}" class="btn btn-warning my-2 ">Modifica</a>
                <form action="{{ route('admin.technologies.destroy', [$technology->id]) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button technology="submit" class="btn btn-danger">Elimina</button>
                </form>
                <a href="{{ route('admin.projects') }}" class="card-link">torna ai progetti</a>
                <a href="{{ route('admin.technologies.index') }}" class="card-link">torna alle tecnologie</a>
              </div>
            </div>
      </div>
  </div>

@endsection