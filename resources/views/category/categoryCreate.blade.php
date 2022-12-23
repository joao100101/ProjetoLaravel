@extends('layouts.main')

@section('title', 'Criando Categoria')

@section('content')
    <div id="category-create-container" class="col-md-6 offset-md-3">
        <h1>Crie sua categoria</h1>
        <form action="/category" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Titulo:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Nome da categoria">
            </div>
            <input type="submit" class="btn btn-primary btn-create" value="Criar Categoria">

        </form>
    </div>
@endsection
