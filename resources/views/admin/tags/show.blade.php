@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>{{$tag->name}}</h2>
                </div>

                <div class="card-body">
                    <div class="mb-3">
                        Slug: {{$tag->slug}}
                    </div>

                    @if (count($tag->posts) > 0)
                    <div class="mb-3">
                        <h3>Lista Posts associati</h3>
                        <ul>
                            @foreach ($tag->posts as $post)
                                <li>{{$post->title}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
            <div class="d-flex mt-3">
                <a href="{{route('tags.edit', $tag->id)}}"><button type="button" class="btn btn-warning">Modifica tag</button></a>
                <form action="{{route('tags.destroy', $tag->id)}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger mx-3" onclick="return confirm('Sei sicuro di voler eliminare il tag?')">Elimina</button>
                 <a href="{{route('tags.index')}}" class="btn btn-primary">Torna ai tag</a>
              </form>
            </div>
        </div>
    </div>
</div>
@endsection 