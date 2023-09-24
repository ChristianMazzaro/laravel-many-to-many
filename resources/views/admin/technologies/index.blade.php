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
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($technologies as $technology)
                    <tr>
                        <th scope="row">{{$technology->id}}</th>
                        <td>{{$technology->title}}</td>
                        <td>{{$technology->slug}}</td>
                        <td>
                            <a href="technologies/{{$technology->id}}" class="btn btn-primary my-2">Dettagli</a>
                            <a href="technologies/{{$technology->id}}/edit" class="btn btn-warning my-2">Modifica</a>
                            <form action="{{ route('admin.technologies.destroy', [$technology->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button technology="submit" class="btn btn-danger">Elimina</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection