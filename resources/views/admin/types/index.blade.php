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
                    @foreach ($types as $type)
                    <tr>
                        <th scope="row">{{$type->id}}</th>
                        <td>{{$type->title}}</td>
                        <td>{{$type->slug}}</td>
                        <td>
                            <a href="types/{{$type->id}}" class="btn btn-primary my-2">Dettagli</a>
                            <a href="types/{{$type->id}}/edit" class="btn btn-warning my-2">Modifica</a>
                            <form action="{{ route('admin.types.destroy', ['id' => $type->id]) }}" method="POST">
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