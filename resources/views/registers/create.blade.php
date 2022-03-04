@extends('layouts.main')

@section('title', 'Cadastrar Pessoa')

@section('content')
<div id="register-create-container" class="col-md-6 offset-md-3">
    <h1>Cadastre um usuário</h1>
    <form action="/registers" method="POST">
        @csrf
        <div class="form-group mt-3">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" required>
        </div>
        <div class="form-group mt-3">
            <label for="telefone">Telefone:</label>
            <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone" required>
        </div>
        <div class="form-group mt-3">
            <label for="email">E-mail:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" required>
        </div>
        <div class="form-group mt-3">
            <label for="cpf">CPF:</label>
            <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF" required>
        </div>
        <div class="form-group mt-3">
            <label for="datanasci">Data de Nascimento:</label>
            <input type="date" class="form-control" id="datanasci" name="datanasci" required>
        </div>
        <div class="form-group mt-3">
            <label for="">Possui Filhos?</label></br>
            <input type="radio"  id="child_yes" name="child_" value="0" onclick="displayFormChild('yes')" required>
            <label for="child_yes">Sim</label>
            <input type="radio" id="child_no" name="child_" value="1" onclick="displayFormChild('no')" required>
            <label for="child_no">Não</label><br>  
         </div>

        <div class="input_child " id="people-container">
            <div class="form-group mt-3">
                <label id="label_child_name" for="child_name">Nome:</label>
                <input type="text" class="form-control" id="child_name" name="people[1][nome]" placeholder="Nome Filho" required>
            </div>
               <div class="form-group mt-3">
                <label id="label_idade" for="idade">Idade:</label>
                <input type="number" class="form-control" id="idade" name="people[1][idade]" placeholder="idade" required>
               </div>
                <div class="form-group mt-3">
                    <label id="label_sexo" for="sexo">Sexo: </label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="people[1][sexo]" id="inlineRadio1" value="Masc">
                        <label class="form-check-label" for="inlineRadio1">Masculino</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="people[1][sexo]" id="inlineRadio2" value="Fem">
                        <label class="form-check-label" for="inlineRadio2">Femino</label>
                      </div>
                    </div>
                    <a href="javascript:;" class="btn btn-primary mt-3" id="add-new-person">Add Filho</a>
               </div>
               <!--button type="button" class="btn btn-primary mt-3" onclick="adicionarCampo()" value="Filhos">+</button-->
               <input type="submit" class="btn btn-primary mt-3 " value="Cadastrar">
            </div>
        </div>
    </form>
</div>

<script>
    document.onload = function() {
        
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!
        var yyyy = today.getFullYear();

        if (dd < 10) {
           dd = '0' + dd;
        }

        if (mm < 10) {
           mm = '0' + mm;
        } 

        today = yyyy + '-' + mm + '-' + dd;
        document.getElementById("datanasci").setAttribute("max", today);
    }
    let i = 3;
    document.getElementById('add-new-person').onclick = function () {
        let template = `
        <div id="campo${i}">
            <div class="form-group mt-3">
                    <label id="label_child_name" for="child_name">Nome:</label>
                    <input type="text" class="form-control" id="child_name" name="people[${i}][nome]" placeholder="Nome Filho" required>
            </div>
            <div class="form-group mt-3">
                <label id="label_idade" for="idade">Idade:</label>
                <input type="number" class="form-control" id="idade" name="people[${i}][idade]" placeholder="idade" required>
            </div>
            <div class="form-group mt-3">
                <label id="label_sexo" for="sexo">Sexo: </label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="people[${i}][sexo]"" id="inlineRadio1" value="Masc">
                        <label class="form-check-label" for="inlineRadio1">Masculino</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="people[${i}][sexo]"" id="inlineRadio2" value="Fem">
                        <label class="form-check-label" for="inlineRadio2">Femino</label>
                      </div>
                    </div>
            </div>
            <button type="button" class="btn btn-primary mt-3" id="campo${i}" onclick="removerCampo(${i})"> - </button>
        </div>`;

        let container = document.getElementById('people-container');
        let div = document.createElement('div');
        div.innerHTML = template;
        container.appendChild(div);

        i++;
    }

</script>

@endsection