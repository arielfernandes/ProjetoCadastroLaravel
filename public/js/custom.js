function displayFormChild(event){
    if(event == 'yes') {
        document.getElementsByClassName('input_child')[0].style.display = "block";
        setRequired(true);
    }else {
        document.getElementsByClassName('input_child')[0].style.display = "none";
        setRequired(false);
    }
}
function setRequired(val){
    input = document.getElementsByClassName("input_child")[0].getElementsByTagName('input');
    for(i = 0; i < input.length; i++){
        input[i].required = val;
    }
}   



function removerCampo(idCampo){
    document.getElementById('campo' + idCampo).remove();
}

