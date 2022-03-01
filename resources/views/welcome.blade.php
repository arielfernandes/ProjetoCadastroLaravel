@extends('layouts.main')

@section('title', 'Cadastro')

@section('content')
@auth
<div id="search-container" class="col-md-12">
    <h1>Busque uma pessoa </h1>
    <form action="/" method="GET">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
        <div class="row mt-3">
          <div class="col-md-6">
            <label>De</label>
            <input type="date" id="date_search_begin"  name="date_search_begin" class="form-control" >
          </div>
          <div class="col-md-6">
            <label>Até</label>
            <input type="date" id="date_search_end"  name="date_search_end" class="form-control" >
          </div>
        </div>
        <input type="submit" class="btn btn-primary mt-5" value="Buscar">

    </form>
</div>
<div id="register-container" class="col-md-12">
  @if($search)  
  <h2>Buscando por: {{ $search }}</h2>
  @else 
  <h1>Cadastros</h1>
  @endif
      <div>
        <div class="options_">
          <div id="csv_container">
                <form action="/csv" method="GET">
                 <input type="submit" name="generate_csv" class="btn btn-warning" value="Gerar CSV">
                </form>
          </div>
          <div id="container-order"> 
            <form action="{{ route('index') }}" method="GET">
              <div id="container-options">
                <input type="submit" class="btn btn-primary" value="Ordenar">
                <div class="form-group col-md-6">
                   <select id="orderBy" name="orderBy" class="form-control">
                    <option value="">--Select--</option>
                    <option value="name_asc">Nome cresc.</option>
                    <option value="age_asc">Data Nasc. cresc.</option>
                    <option value="name_desc">Nome desc</option>
                    <option value="age_desc">Data Nasc. decre.</option>
                  </select>
                </div>
              </div>
            </form>
          </div>
       </div>
        <table class="table table-dark">
            <tr>
                <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nome</th>
                      <th scope="col">Telefone</th>
                      <th scope="col">E-mail</th>
                      <th scope="col">CPF</th>
                      <th scope="col">Data de Nascimento</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody>
                @foreach($registers as $register)
                    <tr>
                      <th scope="row">{{ $loop->index+1}}</th>
                      <td>{{ $register->nome }}</td>
                      <td>{{ $register->telefone }}</td>
                      <td>{{ $register->email }}</td>
                      <td>{{ $register->cpf }}</td>
                      <td>{{ date('d/m/Y', strtotime($register->datanasci ))  }}</td>
                      <td><a href="/registers/{{ $register->id}}" class="btn btn-primary">mais</a></td>
                    </tr>
                    @endforeach
                  </tbody>
           </tr>
        </table>
        <!-- Pagination -->
        <div class="d-flex justify-content-center">
        {{$registers->links() ?? ""}}
        </div>
      </div>
        @if(count($registers) == 0 && $search)
        <p>Não foi possível encontrar nenhum usuário com {{ $search }}! <a href="/">Ver todos!</a></p>
        @elseif(count($registers) == 0)
        <p>Não há nenhum cadastro!</p>
        @endif
</div>
@endauth
@endsection