@extends('layouts.main')

@section('title', 'Categorias')


@section('content')
    <div id="search-container" class="col-md-12">
        <h1>Busque uma categoria</h1>
        <form action="/categories" method="GET">
            <input type="text" id="search" name="search" class="form-control" placeholder="Procurar....">
        </form>
    </div>
    <div class="col-md-10 offset-md-1 dashboard-title-container">
        @if ($search)
        <h2>Buscando por: "{{ $search }}"</h2>
    @else
        <h1>Categorias</h1>
    @endif
    </div>
    <div class="col-md-10 offset-md-1 dashboard-events-container">
        @if (count($categories) > 0)
            <table class="table">
                <thead class="thead-black">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id}}</td>
                            <td>{{ $category->title }}</td>
                            <td class="actions">
                                <a href="/category/edit/{{ $category->id }}" class="btn btn-info edit-btn">
                                    <ion-icon name="create-outline"></ion-icon> Editar
                                </a>
                                <form action="category/{{ $category->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger delete-btn">
                                        <ion-icon name="trash-outline"></ion-icon> Deletar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{$categories->links()}}
            </div>
        @else
            @if (count($categories) == 0 && $search)
                <p>Não foi possível encontrar nenhuma categoria com: "{{ $search }}"! <a href="/categories">Ver Todas</a></p>
            @elseif(count($categories) == 0)
                <p>Você ainda não tem categorias, <a href="category/create">Criar Categoria</a></p>
            @endif

        @endif
    </div>
@endsection
