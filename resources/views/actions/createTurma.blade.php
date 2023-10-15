@extends('adminlte::page')

@section('title', 'Nova Pizza')

@section('content_header')
    <h1>
    Nova Turma
    </h1>
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                <h5>
                    <i class="icon fas fa-ban"></i>
                    Ocorreu um erro
                </h5>
                @foreach ($errors->all() as $error )
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>

    @endif
    <div class="card">
        <div class="card-body">

            <form action="{{route('turma.store')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nome</label>
                    <div class="col-sm-10">
                        <input type="text" name="nome" value="{{old('nome')}}" class="form-control @error('nome') is-invalid @enderror">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Dias de Aula</label>
                    <div class="col-sm-10">
                    <select class="js-example-basic-multiple col-sm-10 col-form-label" name="dias[]" multiple='multiple'>

                        <option></option>
                        <option value="Domingo">Domingo</option>
                        <option value="Segunda-Feira">Segunda-Feira</option>
                        <option value="Terça-Feira">Terça-Feira</option>
                        <option value="Quarta-Feira">Quarta-Feira</option>
                        <option value="Quinta-Feira">Quinta-Feira</option>
                        <option value="Sexta-Feira">Sexta-Feira</option>
                        <option value="Sábado">Sábado</option>

                    </select>
                    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
                    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
                    <script>
                        $('.js-example-basic-multiple').select2({
                            allowClear: true,
                            theme: "classic",

                        });
                    </script>
                    <link rel="stylesheet"
                        href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">

                    </div>

                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Horario</label>
                    <div class="col-sm-10">
                        <input type="text" name="horario" value="{{old('horario')}}" class="form-control @error('horario') is-invalid @enderror">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Descrição</label>
                    <div class="col-sm-10">
                        <input type="text" name="descricao" value="{{old('descricao')}}" class="form-control @error('descricao') is-invalid @enderror">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Professor Responsável</label>
                    <div class="col-sm-10">
                    <select class="js-example-basic-multiple col-sm-8 col-form-label" name="prof_responsavel" multiple='multiple'>

                        <option></option>
                        @foreach ($prof_responsavel as $prof)
                        <option value="{{ $prof->id }}">{{ $prof->name }}</option>
                        @endforeach


                    </select>
                    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
                    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
                    <script>
                        $('.js-example-basic-multiple').select2({
                            allowClear: true,
                            theme: "classic",

                        });
                    </script>
                    <link rel="stylesheet"
                        href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">

                    </div>

                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-10">
                        <input type="file" name="foto" id="foto" class="form-control-file" class="form-control-file" accept=".jpg, .jpeg, .png"/>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <input type="submit" value="Criar" class="btn btn-success">
                        <a href="#" class="btn btn-danger">Voltar</a>
                    </div>
                </div>




            </form>

        </div>

    </div>
    {{-- {{$pizzas->links('pagination::bootstrap-5') }} --}}
@endsection
