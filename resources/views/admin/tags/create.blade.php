@extends('layouts.app')

@section('content')
    <div class="container">

        <h1 class="mb-3">Aggiungi un nuovo tag</h1>

        <form action="{{route('tags.store')}}" method="POST" class="mb-5">
            @csrf

            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Aggiungi nome del tag" value="{{old('name')}}">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Aggiungi tag</button>

        </form>

        <a href="{{route('tags.index')}}"><button type="button" class="btn btn-dark">Lista tags</button></a>
    </div>
@endsection 