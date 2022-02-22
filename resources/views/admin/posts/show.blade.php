@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{route("posts.index")}}"><button type="button" class="btn btn-primary my-3">Torna ai Post</button></a>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>{{$post->title}}</h2>
                </div>

                <div class="card-body">
                    <div class="mb-3 ">
                        <a href="{{route("posts.edit",$post->id)}}"><button type="button" class="btn btn-warning">Modifica</button></a>
                            <form action="{{route('posts.destroy', $post->id)}}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-danger my-3">Elimina</button>
                            </form>
                    </div>
                    <div class="mb-3">
                       <strong>Stato:</strong> 
                        @if($post->published)
                            <span class="badge badge-success">Pubblicato</span>
                        @else
                            <span class="badge badge-secondary">Bozza</span>
                        @endif
                    </div>
                    @if($post->category)
                            <div class="mb-3" >
                                <strong>Categoria:</strong>
                                {{($post->category->name)}}
                            </div>
                    @endif
                    @if(count($post->tags) > 0)
                        <div class="mb-3">
                            <strong>Tags:</strong>
                            @foreach ($post->tags as $tag)
                                <span class="badge badge-primary">{{$tag->name}}</span>
                            @endforeach
                        </div>
                    @endif
                    <strong>Descrizione:</strong>
                    {{$post->content}}
                </div>

                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection