@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('main-content')
    <div class="row">
        <div class="col">
            
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Categorie</th>
                    <th scope="col">Pulsanti</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                    <tr>
                        <th scope="row">{{$project->id}}</th>
                        <td>{{$project->title}}</td>
                        <td>{{$project->slug}}</td>
                        <td>
                            <a href="{{ route('admin.types.show', $project->type->id) }}">
                                {{$project->type->title}}
                            </a>
                        </td>
                        <td>
                            <a href="projects/{{$project->id}}" class="btn btn-primary my-2">Dettagli</a>
                            <a href="projects/{{$project->id}}/edit" class="btn btn-warning my-2">Modifica</a>
                            <form action="{{ route('admin.projects.destroy', ['id' => $project->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Elimina</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection