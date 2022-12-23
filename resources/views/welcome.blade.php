@extends('layouts.main')

@section('title', 'Pagina Inicial')


@section('content')
    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>Categorias</h1>
    </div>
    <div class="col-md-10 offset-md-1 dashboard-events-container">
        @if (count($categories) > 0)
            <table class="table">
                <thead class="thead-black">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td scope="row">{{ $loop->index + 1 }}</td>
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
        @else
            <p>Você ainda não tem categorias, <a href="events/create">Criar Categoria</a></p>
        @endif
    </div>
@endsection
