@extends('layouts.main')

@section('title', 'Editando Usuário')

@section('content')
    <div id="category-create-container" class="col-md-6 offset-md-3">
        <h1>Editando: {{ $user->name }}</h1>
        <form action="/user/update/{{ $user->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Ex: José da Silva" value="{{$user->name}}">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="example@example.com" value="{{$user->email}}">
            </div>
            <div class="form-group">
                <label for="password">Senha:</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="buttons">
                <input type="submit" class="btn btn-primary" value="Atualizar Usuário">
                <a href="/" class="btn btn-primary">Voltar</a>
            </div>

        </form>
    </div>
@endsection
