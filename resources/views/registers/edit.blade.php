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
            <input type="text" class="form-control" id="telefone" name="telefone" data-js="telefone" placeholder="Telefone" value="{{ $register->telefone }}">
        </div>
        <div class="form-group mt-3">
            <label for="email">E-mail:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" value="{{ $register->email }}">
        </div>
        <div class="form-group mt-3">
            <label for="cpf">CPF:</label>
            <input type="text" class="form-control" id="cpf" name="cpf" data-js="cpf" placeholder="CPF" value="{{ $register->cpf }}">
        </div>
        <div class="form-group mt-3">
            <label for="datanasci">Data de Nascimento:</label>
            <input type="date" class="form-control" id="datanasci" name="datanasci" value="{{ $register->datanasci }}">
        </div>
        @if ($children)
        {{-- Pegando e informando filhos se houver.--}}
        @foreach ($children as $child)
        <div id="people-container">
        <div class="form-group mt-3">
          <label for="telefone">Nome:</label>
          <input type="text" class="form-control" id="child_name" name="people[{{ $child['id'] }}][nome]" placeholder="Nome Filho" value="{{ $child['nome']}}">
      </div>
      <div class="form-group mt-3">
          <label for="email">Idade:</label>
          <input type="number" class="form-control" id="idade" name="people[{{ $child['id'] }}][idade]" placeholder="idade" value="{{ $child['idade']}}">
      </div>
         <div class="form-group mt-3">
            <label id="label_sexo" for="sexo">Sexo: </label>
      
            <div class="form-check form-check-inline">
                <input  class="form-check-input" type="radio" name="people[{{ $child['id'] }}][sexo]"  id="masc_{{ $child['id'] }}" value="Masc" required>
                <label class="form-check-label" for="inlineRadio1">Masculino</label>
              </div>
              <div class="form-check form-check-inline">
                <input   class="form-check-input" type="radio" name="people[{{ $child['id'] }}][sexo]"  id="fem_{{ $child['id'] }}"  value="Fem" required>
                <label class="form-check-label" for="inlineRadio2">Feminino</label>
              </div>
      </div>
      <div>
        @endforeach
        @else
        <p class="event-city"><ion-icon name="balloon-outline"></ion-icon> não possui filhos </p>
        @endif
        
        
        <input type="submit" class="btn btn-primary mt-3" value="Editar">
        <input type="button" class="btn btn-primary mt-3" id="add-new-person" onclick="moreChild()" value="Add Filho">

    </form>
</div>
<!--script src="/js/custom.js"></script-->
<script>
    window.onload = function() {
    const masks = {
        cpf (value) {
            return value
            .replace(/\D/g, '')
            .replace(/(\d{3})(\d)/, '$1.$2')
            .replace(/(\d{3})(\d)/, '$1.$2')
            .replace(/(\d{3})(\d{1,2})/, '$1-$2')
            .replace(/(-\d{2})\d+?$/, '$1')
            
        },
        telefone (value) {
            return value
            .replace(/\D/g, '')
            .replace(/(\d{2})(\d)/, '($1)$2')
            .replace(/(\d{4})(\d)/, '$1-$2')
            .replace(/(\d{4})-(\d)(\d{4})/, '$1$2-$3')
            .replace(/(-\d{4})\d+?$/, '$1')

            
        }
    }

    document.querySelectorAll('input').forEach(($input) => {
        const field = $input.dataset.js;

        $input.addEventListener('input', (e) => {
            e.target.value = masks[field](e.target.value)
        }, false);
    });
}
</script>
@endsection