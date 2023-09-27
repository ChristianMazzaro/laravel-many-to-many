@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">{{$project->title}}</h5>
                  <h6 class="card-subtitle mb-2 text-muted">{{$project->slug}}</h6>
                  <p class="card-text">{{$project->content}}</p>
                  @if (count($project->technologies) > 0)
                  @foreach ($project->technologies as $technology)
                  <div class="card-text">
                    <span class="badge rounded-pill text-bg-info">{{$technology->title}}</span>
                  </div>
                  @endforeach  
                  @else
                  <div>
                    ---
                  </div>
                  @endif
                  <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning my-2">Modifica</a>
                  <form action="{{ route('admin.projects.destroy', ['id' => $project->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Elimina</button>
                  </form>
                  <a href="{{ route('admin.projects') }}" class="card-link">Torna ai progetti</a>
                </div>
              </div>
        </div>
    </div>
@endsection
