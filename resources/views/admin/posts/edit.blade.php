@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Modifica {{$post->title}}</div>
               
                <div class="card-body">
                    <form action="{{route("posts.update", $post->id)}}" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="form-group">
                          <label for="title">Titolo</label>
                          <input type="text" class="form-control @error ('title') is-invalid @enderror" id="title" name="title" placeholder="Inserisci il titolo del post" value="{{old('title') ? old('title') : $post->title}}">
                          @error('title')
                            <div class="alert-alert-danger">
                                <div>{{$message}}</div>    
                            </div>
                          @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="content">Contenuto</label>
                            <textarea class="form-control @error ('content') is-invalid @enderror" id="content" name="content" rows="6" placeholder="Inserisci il contenuto">{{old('content')? old('content') : $post->content}}</textarea>
                            @error('content')
                                <div class="alert-alert-danger">
                                    <div>{{$message}}</div>
                                </div>
                            @enderror
                        </div>
                       <div>
                            <label for="category">Categoria</label>
                            <select name="category_id" class="custom-select @error ('category_id') is-invalid @enderror" id="category">
                                <option value="">Selezione una Categoria</option>
                                @foreach ($categories as$category)
                                    <option value="{{$category->id}}" {{old("category_id",$post->category_id) == $category->id ? "selected" : ""}}>{{$category->name}}></option>
                                @endforeach
                        </select>
                        @error('category_id')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        </div>
                        <div class="form-group form-check">
                            @php
                                $published = old('published') ? old('published') : $post->published;
                            @endphp
                            <input type="checkbox" class="form-check-input @error ('content') is-invalid @enderror" id="published" name="published" {{$published ? 'checked' : ''}}>
                            <label class="form-check-lable" for="published">Pubblica</label>  
                            @error('published')
                                <div class="alert alert-danger">
                                    <div>{{$message}}</div>
                                </div>
                            @enderror  
                        </div>
                        <div class="form-group">
                            <p>Tags</p>

                            @foreach ($tags as $tag)
                            <div class="form-check form-check-inline">

                                @if (old("tags"))
                                <input type="checkbox" class="form-check-input" id="{{$tag->slug}}" name="tags[]" value="{{$tag->id}}" {{in_array($tag->id, old("tags", [])) ? "checked" : ""}}>
                                @else
                                <input type="checkbox" class="form-check-input" id="{{$tag->slug}}" name="tags[]" value="{{$tag->id}}" {{$post->tags->contains($tag) ? "checked" : ""}}>
                                @endif

                                <label class="form-check-label" for="{{$tag->slug}}">{{$tag->name}}</label>
                            </div>
                            @endforeach
                            @error('tags')
                                <div class="alert alert-danger">{{$message}}</div>
                              @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Modifica</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection