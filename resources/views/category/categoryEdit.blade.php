@extends('layouts.main')

@section('title', 'Editando ' . $category->title)

@section('content')
    <div id="category-create-container" class="col-md-6 offset-md-3">
        <h1>Editando: {{ $category->title }}</h1>
        <form action="/category/update/{{ $category->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Categoria:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Nome da categoria"
                    value="{{ $category->title }}">
            </div>
            <div class="buttons">
                <input type="submit" class="btn btn-primary" value="Atualizar Categoria">
                <a href="/categories" class="btn btn-primary">Voltar</a>
            </div>

        </form>
    </div>
@endsection
