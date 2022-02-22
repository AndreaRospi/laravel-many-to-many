@extends('layouts.app')

@section('content')
    <div class="container">

        <h1 class="mb-3">Modifica tag {{$tag->name}}</h1>

        <form action="{{route('tags.update', $tag->id)}}" method="POST" class="mb-5">
            @csrf
            @method("PUT")

            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Modifica nome del tag" value="{{old('name', $tag->name)}}">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Modifica tag</button>

        </form>

        <a href="{{route('tags.index')}}"><button type="button" class="btn btn-dark">Lista tag</button></a>
    </div>
@endsection 