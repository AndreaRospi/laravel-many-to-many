@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Lista Tags</div>

                <div class="card-body">
                    <div class="mb-3">
                        <a href="{{route("tags.create")}}"><button type="button" class="btn btn-success">Aggiungi un tag</button></a>
                    </div>
                    <table class="table table-dark my-4">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Azioni</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($tags as $tag)
                          <tr>
                            <td>{{$tag->id}}</td>
                            <td>{{$tag->name}}</td>
                            <td>{{$tag->slug}}</td>

                            <td class="d-flex">
                                <a href="{{route("tags.show", $tag->id)}}"><button type="button" class="btn btn-primary">Visualizza</button></a>
                                <a class="mx-2" href="{{route('tags.edit', $tag->id)}}"><button type="button" class="btn btn-warning">Modifica</button></a>
                                <form action="{{route('tags.destroy', $tag->id)}}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger" onclick="return confirm('Sei sicuro di voler eliminare il post?')">Elimina</button>
                              </form>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      <a href="{{route('posts.index')}}" class="btn btn-primary">Torna ai posts</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection 