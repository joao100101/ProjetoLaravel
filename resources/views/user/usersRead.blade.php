@extends('layouts.main')

@section('title', 'Usuários')


@section('content')
    <div id="search-container" class="col-md-12">
        <h1>Busque um Usuário</h1>
        <form action="/" method="GET">
            <input type="text" id="search" name="search" class="form-control" placeholder="Procurar....">
        </form>
    </div>
    <div class="col-md-10 offset-md-1 dashboard-title-container">
        @if ($search)
            <h2>Buscando por: "{{ $search }}"</h2>
        @else
            <h1>Usuários</h1>
        @endif
    </div>
    <div class="col-md-10 offset-md-1 dashboard-events-container">
        @if (count($users) > 0)
            <table class="table">
                <thead class="thead-black">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td scope="row">{{ $loop->index + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="actions">
                                <a href="/user/edit/{{ $user->id }}" class="btn btn-info edit-btn">
                                    <ion-icon name="create-outline"></ion-icon> Editar
                                </a>
                                <form action="user/{{ $user->id }}" method="POST">
                                    @if ($userLogged->id != $user->id)
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger delete-btn">
                                            <ion-icon name="trash-outline"></ion-icon> Deletar
                                        </button>
                                    @endif
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{$users->links()}}
            </div>
        @else
            @if (count($users) == 0 && $search)
                <p>Não foi possível encontrar nenhum usuário com email ou nome: "{{ $search }}"! <a href="/">Ver
                        Todos</a></p>
            @elseif(count($users) == 0)
                <p>Ainda não existem usuários, <a href="user/create">Criar Usuário</a></p>
            @endif

        @endif
    </div>
@endsection
