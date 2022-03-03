@extends('layouts.main')

@section('title', $register->nome)

@section('content')


<div class="col-md-10 offset-md-1">
    <div class="row">
      <div id="info-container" class="col-md-6">
        <h1>{{ $register->nome }}</h1>
        <label for="nome">Telefone:</label>
        <p class="event-city"><ion-icon name="call-outline"></ion-icon> {{ $register->telefone }}</p>
        <label for="nome">E-mail:</label>
        <p class="event-city"><ion-icon name="mail-outline"></ion-icon> {{ $register->email }}</p>
        <label for="nome">CPF:</label>
        <p class="event-city"><ion-icon name="finger-print-outline"></ion-icon> {{ $register->cpf}}</p>
        <label for="nome">Data de Nascimento:</label>
        <p class="event-city"><ion-icon name="calendar-outline"></ion-icon> {{ date('d/m/Y', strtotime($register->datanasci)) }}</p>
        <label for="nome">Filhos:</label>
        @if ($children)
        {{-- Pegando e informando filhos se houver.--}}
        @foreach ($children as $child)
        <p class="event-city">Nome: {{ $child['nome']}} </p>
         <p class="event-cit">Idade:  {{ $child['idade']}} </p>
         <p class="event-cit">Sexo:  {{ $child['sexo']}} </p>

        @endforeach
        @else
        <p class="event-city"><ion-icon name="balloon-outline"></ion-icon> não possui filhos </p>
        @endif
    </div>
    <div class="container-changes">
        <div>
            <button type="submit" class="btn btn-primary delete-btn">
                <ion-icon name="create-outline"></ion-icon><a href="/registers/edit/{{ $register->id }}">Editar</a>
            </button>
        </div>
        <div>
            <form action="/registers/{{ $register->id}}" method="POST">
                @csrf 
                @method('DELETE')
                <button type="submit" class="btn btn-danger delete-btn">
                    <ion-icon name="trash-outline"></ion-icon>Deletar
                </button>
            </form>
        </div>
    </div>
</div>

@endsection