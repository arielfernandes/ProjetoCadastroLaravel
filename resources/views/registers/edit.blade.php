@extends('layouts.main')

@section('title', 'Editar Cadastro '.$register->nome)

@section('content')
<div id="register-create-container" class="col-md-6 offset-md-3">
    <h1>Editar: {{ $register->nome }}</h1>
    <form action="/registers/update/{{ $register->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mt-3">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="{{ $register->nome }}">
        </div>
        <div class="form-group mt-3">
            <label for="telefone">Telefone:</label>
            <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone" value="{{ $register->telefone }}">
        </div>
        <div class="form-group mt-3">
            <label for="email">E-mail:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" value="{{ $register->email }}">
        </div>
        <div class="form-group mt-3">
            <label for="cpf">CPF:</label>
            <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF" value="{{ $register->cpf }}">
        </div>
        <div class="form-group mt-3">
            <label for="datanasci">Data de Nascimento:</label>
            <input type="date" class="form-control" id="datanasci" name="datanasci" value="{{ $register->datanasci }}">
        </div>
        @if ($children)
        {{-- Pegando e informando filhos se houver.--}}
        @foreach ($children as $child)
        <div class="form-group mt-3">
          <label for="telefone">Nome:</label>
          <input type="text" class="form-control" id="child_name" name="child_name" placeholder="Nome Filho" value="{{ $child['nome']}}">
      </div>
      <div class="form-group mt-3">
          <label for="email">Idade:</label>
          <input type="number" class="form-control" id="idade" name="idade" placeholder="idade" value="{{ $child['idade']}}">
      </div>
         <div class="form-group mt-3">
            <label id="label_sexo" for="sexo">Sexo: </label>
          
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="people[1][sexo]"" id="inlineRadio1" value="Masc">
                <label class="form-check-label" for="inlineRadio1">Masculino</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="people[1][sexo]"" id="inlineRadio2" value="Fem">
                <label class="form-check-label" for="inlineRadio2">Femino</label>
              </div>
      </div>
     
        @endforeach
        @else
        <p class="event-city"><ion-icon name="balloon-outline"></ion-icon> não possui filhos </p>
        @endif
        <input type="submit" class="btn btn-primary mt-3" value="Editar">
    </form>
</div>
@endsection