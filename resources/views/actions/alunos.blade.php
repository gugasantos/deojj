@extends('adminlte::page')

@section('title', 'Alunos')

@section('content_header')
    <h1>
    Alunos
    <a href="{{route('alunos.create')}}" class="btn btn-sm btn-success">Adicionar novo Aluno</a>
    </h1>
@endsection


@section('content')


<div class="card">
    <form action="client" method="GET">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar Cliente">
    </form>
</div>

<div class="card">
    <div class="table-responsive-sm card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th width='250'>Nome</th>
                    <th width='250'>Idade</th>
                    <th width='250'>Telefone</th>
                    <th width='530'>Endereço</th>
                    <th width='250'>tp_faixa</th>
                    <th width='250'>grau</th>
                    <th width='250'>ativo</th>
                </tr>
                <tbody>
                @foreach ($alunos as $aluno)
                <tr>
                    <td>{{$aluno->nome}}</td>
                    <td>{{$aluno->idade}}</td>
                    <td>{{$aluno->telefone}}</td>
                    <td>{{$aluno->endereco}}</td>
                    <td>{{$aluno->tp_faixa}}</td>
                    <td>{{$aluno->grau}}</td>
                    <td>{{$aluno->ativo}}</td>
                    <td>
                    <a href="{{route('client.edit',[$aluno->id])}}" class="btn btn-sm btn-info">Editar</a>
                        <form class="d-inline" action="{{route('client.destroy',[$aluno->id])}}" method="POST" onsubmit="return confirm('Tem certeza que deseja exluir esse Aluno?')">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </thead>
        </table>
    </div>
</div>
    {{$alunos->links('pagination::bootstrap-5') }}
@endsection