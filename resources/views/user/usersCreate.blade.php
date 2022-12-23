@extends('layouts.main')

@section('title', 'Criando Usuario')

@section('content')
    <div id="category-create-container" class="col-md-6 offset-md-3">
        <h1>Criando novo usuário</h1>
        <form action="/user" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Ex: José da Silva">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="example@example.com">
            </div>
            <div class="form-group">
                <label for="password">Senha:</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <input type="submit" class="btn btn-primary btn-create" value="Criar Usuário">

        </form>
    </div>
@endsection
