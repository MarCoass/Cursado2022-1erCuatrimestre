var campoCandidato = document.getElementById('txCandidato');
var campoSexo = document.getElementById('txSexo');
var campoDNI = document.getElementById('txDNI');
var divVotantes = document.getElementById('Votantes');

var RegistroVotantes = new Array();

function registrar(){
    var candidato = campoCandidato.value;
    var sexo = campoSexo.value;
    var dni = campoDNI.value;
    if(!verificarCampos(candidato, sexo, dni)){
            RegistroVotantes.push(parseInt(dni));
            campoCandidato.value='';
            campoDNI.value='';
            campoSexo.value='';
            sumarVoto(candidato.toLowerCase());
            divVotantes.innerHTML = divVotantes.innerHTML + dni + " - "
    }
}

function verificarCampos(candidato, sexo, dni){
    var camposInvalidos = false;
        if(candidato=='' || !verificarCandidato(candidato)){
            campoCandidato.classList.add('campoIncorrecto')
            camposInvalidos = true;
        } else {
            if( campoCandidato.classList.contains('campoIncorrecto')){
                campoCandidato.classList.remove('campoIncorrecto')
            }
        }
        if(dni=='' || !verificarDNI(dni)){
            campoDNI.classList.add('campoIncorrecto')
            camposInvalidos = true;
        } else {
            if( campoDNI.classList.contains('campoIncorrecto')){
                campoDNI.classList.remove('campoIncorrecto')
            }
        }
        if(sexo=='' || !verificarSexo(sexo)){
            campoSexo.classList.add('campoIncorrecto')
            camposInvalidos = true;
        } else {
            if( campoSexo.classList.contains('campoIncorrecto')){
                campoSexo.classList.remove('campoIncorrecto')
            }
        
    }
    return camposInvalidos;
}

function verificarCandidato(candidato){
    var candidatoValido = true;
    candidato = candidato.toLowerCase();
    if(candidato== 'kodos' || candidato == 'kang' || candidato == 'blanco'){
        if( campoCandidato.classList.contains('campoIncorrecto')){
            campoCandidato.classList.remove('campoIncorrecto')
        }
    } else {
        candidatoValido = false;
        campoCandidato.classList.add('campoIncorrecto')
    }
    return candidatoValido;
}

function verificarSexo(sexo){
    var sexoValido = true;
    sexo = sexo.toLowerCase();
    if(sexo== 'm' || sexo == 'f'){
        if( campoSexo.classList.contains('campoIncorrecto')){
            campoSexo.classList.remove('campoIncorrecto')
        }
    } else {
        sexoValido = false;
        campoSexo.classList.add('campoIncorrecto')
    }
    return sexoValido;
}
function verificarDNI(dni){
    var dniValido = true;
    dni = parseInt(dni);
    if(!isNaN(dni) && dni >= 1000000 && dni <=999999999 && verificarVotoRepetido(dni)){
        if( campoDNI.classList.contains('campoIncorrecto')){
            campoDNI.classList.remove('campoIncorrecto')
        }
    } else {
        dniValido = false;
        campoDNI.classList.add('campoIncorrecto')
    }
    return dniValido;
}

function verificarVotoRepetido(dni){
    var noVoto = false;
    if(RegistroVotantes.indexOf(dni) == -1){
        noVoto = true;
    }
    return noVoto;
}

function sumarVoto(candidato){
    if(candidato == 'kang'){
        document.getElementById('ResultadosKang').innerHTML = parseInt(document.getElementById('ResultadosKang').innerHTML)+1;
        console.log('kang')
    } else if(candidato == 'kodos'){
        document.getElementById('ResultadosKodos').innerHTML = parseInt(document.getElementById('ResultadosKodos').innerHTML)+1;
        console.log(candidato == 'kodos')
    } else if(candidato == 'blanco'){
        document.getElementById('ResultadosBlanco').innerHTML = parseInt(document.getElementById('ResultadosBlanco').innerHTML)+1;
    }
}
