function displayFormChild(event) {
    if (event == "yes") {
        document.getElementsByClassName("input_child")[0].style.display =
            "block";
        setRequired(true);
    } else {
        document.getElementsByClassName("input_child")[0].style.display =
            "none";
        setRequired(false);
    }
}
function setRequired(val) {
    input = document
        .getElementsByClassName("input_child")[0]
        .getElementsByTagName("input");
    for (i = 0; i < input.length; i++) {
        input[i].required = val;
    }
}

let i = 0;
function moreChild() {
    document.getElementById("add-new-person");
    let template = `
    <div id="campo${i}">
        <div class="form-group mt-3">
                <label id="label_child_name" for="child_name">Nome:</label>
                <input type="text" class="form-control" id="child_name" name="people[${i}][nome]" placeholder="Nome Filho" required>
        </div>
        <div class="form-group mt-3">
            <label id="label_idade" for="idade">Idade:</label>
            <input type="number" class="form-control" id="idade" name="people[${i}][idade]" min="1" placeholder="idade" required>
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
        </div>
    `;

    let container = document.getElementById("people-container");
    let div = document.createElement("div");
    div.innerHTML = template;

    container.before(div);

    // container.apendChild(div);

    i++;
}

function removerCampo(idCampo) {
    document.getElementById("campo" + idCampo).remove();
    document.getElementById("campo" + idCampo).remove();
}
