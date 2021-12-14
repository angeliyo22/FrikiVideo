const registroAdminUsuario = document.getElementById('registroUsuario');
const inputsRegistroAdminUsuario = document.querySelectorAll('#registroUsuario input');

const expresionesRegistroAdminUsuario = {
	usuario: /^[a-zA-Z0-9\_\-]{6,20}$/,
	nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/,
	apellido: /^[a-zA-ZÀ-ÿ\s]{1,40}$/,
	fN: /^[0-9]{4}[-/]{1}[0-9]{2}[-/]{1}[0-9]{2}/,
	dni:/^[0-9]{8}[A-Za-z]{1}/,
	password: /^(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}$/,
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	telefono: /^[0-9]{9}/,
	cp: /^(?:0[1-9]|[1-4]\d|5[0-2])\d{3}$/,
	direccion: /^[a-zA-ZÀ-ÿ0-9.\s?\-]{5,100}$/,
    rol: /[A-Za-z]{4,30}/
}

const camposRegistroAdminUsuario = {
	usuario: false,
	password: false,
	nombre: false,
	apellido1: false,
	apellido2: false,
	fN: false,
	dni: false,
	telefono: false,
	correo:false,
	cp: false,
	direccion: false,
    rol: false,
}

const validarFormularioRegistroAdminUsuario = (e) => {
	switch (e.target.name) {
		case "usuario":
			validarCampoRegistroAdminUsuario(expresionesRegistroAdminUsuario.usuario, e.target, 'usuario');
		break;
		case "password":
			validarCampoRegistroAdminUsuario(expresionesRegistroAdminUsuario.password, e.target, 'password');
		break;
		case "nombre":
			validarCampoRegistroAdminUsuario(expresionesRegistroAdminUsuario.nombre, e.target, 'nombre');
		break;
		case "apellido1":
			validarCampoRegistroAdminUsuario(expresionesRegistroAdminUsuario.apellido, e.target, 'apellido1');
		break;
		case "apellido2":
			validarCampoRegistroAdminUsuario(expresionesRegistroAdminUsuario.apellido, e.target, 'apellido2');
		break;
		case "fN":
			validarCampoRegistroAdminUsuario(expresionesRegistroAdminUsuario.fN, e.target, 'fN');
		break;
		case "dni":
			validarCampoRegistroAdminUsuario(expresionesRegistroAdminUsuario.dni, e.target, 'dni');
			compruebaLetra();
		break;
		case "telefono":
			validarCampoRegistroAdminUsuario(expresionesRegistroAdminUsuario.telefono, e.target, 'telefono');
		break;
		case "correo":
			validarCampoRegistroAdminUsuario(expresionesRegistroAdminUsuario.correo, e.target, 'correo');
		break;
		case "cp":
			validarCampoRegistroAdminUsuario(expresionesRegistroAdminUsuario.cp, e.target, 'cp');
			codigoPostal=document.getElementById('cp').value;
			document.getElementById('provincia').value=darProvincia(codigoPostal);
			document.getElementById('comunidad').value=compruebaComunidad(codigoPostal);
		break;
		case "direccion":
			validarCampoRegistroAdminUsuario(expresionesRegistroAdminUsuario.direccion, e.target, 'direccion');
		break;
        case "rol":
			validarCampoRegistroAdminUsuario(expresionesRegistroAdminUsuario.rol, e.target, 'rol');
		break;
	}
}

const validarCampoRegistroAdminUsuario=(expresion, input, campo)=>{
	if (expresion.test(input.value)) {
		document.getElementById(`grupo_${campo}`).classList.remove('grupo_incorrecto');
		document.getElementById(`grupo_${campo}`).classList.add('grupo_correcto');

		document.querySelector(`#grupo_${campo} .inputs`).classList.add('input_correcto');
		document.querySelector(`#grupo_${campo} .inputs`).classList.remove('input_incorrecto');

		camposRegistroAdminUsuario[campo] = true;
		
		
	}
	else{
		document.getElementById(`grupo_${campo}`).classList.add('grupo_incorrecto');
		document.getElementById(`grupo_${campo}`).classList.remove('grupo_correcto');

		document.querySelector(`#grupo_${campo} .inputs`).classList.add('input_incorrecto');
		document.querySelector(`#grupo_${campo} .inputs`).classList.remove('input_correcto');

		camposRegistroAdminUsuario[campo] = false;
		
		
	}
}

//Funcion que devuelve la provincia cuando le pasas el codigo postal
function darProvincia(cpostal){
    var cp_provincias = {
      1: "Alava", 2: "Albacete", 3: "Alicante", 4: "Almeria", 5: "Avila",
      6: "Badajoz", 7: "Baleares", 08: "Barcelona", 09: "Burgos", 10: "Caceres",
      11: "Cadiz", 12: "Castellon", 13: "Ciudad Real", 14: "Cordoba", 15: "Coruña",
      16: "Cuenca", 17: "Gerona", 18: "Granada", 19: "Guadalajara", 20: "Guipuzcoa",
      21: "Huelva", 22: "Huesca", 23: "Jaen", 24: "Leon", 25: "Lerida",
      26: "La Rioja", 27: "Lugo", 28: "Madrid", 29: "Malaga", 30: "Murcia",
      31: "Navarra", 32: "Orense", 33: "Asturias", 34: "Palencia", 35: "Las Palmas",
      36: "Pontevedra", 37: "Salamanca", 38: "Santa Cruz de Tenerife", 39: "Cantabria", 40: "Segovia",
      41: "Sevilla", 42: "Soria", 43: "Tarragona", 44: "Teruel", 45: "Toledo",
      46: "Valencia", 47: "Valladolid", 48: "Vizcaya", 49: "Zamora", 50: "Zaragoza",
      51: "Ceuta", 52: "Melilla"
    };
    if(cpostal.length == 5 && cpostal <= 52999 && cpostal >= 1000){
        document.getElementById(`grupo_provincia`).classList.add('grupo_correcto');
        document.getElementById(`grupo_provincia`).classList.remove('grupo_incorrecto');
        return cp_provincias[parseInt(cpostal.substring(0,2))];
    }
    else{
        document.getElementById(`grupo_provincia`).classList.remove('grupo_correcto');
        document.getElementById(`grupo_provincia`).classList.add('grupo_incorrecto');
	  return "---";
    }
}

//Funcion que comprueba la comunidad
function compruebaComunidad(cpostal){
    let cp_comunidad = {
      1: "Pa\u00EDs Vasco", 2: "Castilla-La Mancha", 3: "Comunidad Valenciana", 4: "Andaluc\u00EDa", 5: "Castilla y Le\u00F3n",
      6: "Extremadura", 7: "Islas Baleares", 08: "Catalu\u00F1a", 09: "Castilla y Le\u00F3n", 10: "Extremadura",
      11: "Andaluc\u00EDa", 12: "Comunidad Valenciana", 13: "Castilla-La Mancha", 14: "Andaluc\u00EDa", 15: "Galicia",
      16: "Castilla-La Mancha", 17: "Catalu\u00F1a", 18: "Andaluc\u00EDa", 19: "Castilla-La Mancha", 20: "Pa\u00EDs Vasco",
      21: "Andaluc\u00EDa", 22: "Arag\u00F3n", 23: "Andaluc\u00EDa", 24: "Castilla y Le\u00F3n", 25: "Catalu\u00F1a",
      26: "La Rioja", 27: "Galicia", 28: "Comunidad de Madrid", 29: "Andaluc\u00EDa", 30: "Regi\u00F3n de Murcia",
      31: "Comunidad de Navarra", 32: "Galicia", 33: "Principado de Asturias", 34: "Castilla y Le\u00F3n", 35: "Islas Canarias",
      36: "Galicia", 37: "Castilla y Le\u00F3n", 38: "Islas Canarias", 39: "Cantabria", 40: "Castilla y Le\u00F3n",
      41: "Andaluc\u00EDa", 42: "Castilla y Le\u00F3n", 43: "Catalu\u00F1a", 44: "Arag\u00F3n", 45: "Castilla-La Mancha",
      46: "Comunidad Valenciana", 47: "Castilla y Le\u00F3n", 48: "Pa\u00EDs Vasco", 49: "Castilla y Le\u00F3n", 50: "Arag\u00F3n",
      51: "Ceuta", 52: "Melilla"
    };
    if(cpostal.length == 5 && cpostal <= 52999 && cpostal >= 1000){
        document.getElementById(`grupo_comunidad`).classList.add('grupo_correcto');
        document.getElementById(`grupo_comunidad`).classList.remove('grupo_incorrecto');
        return cp_comunidad[parseInt(cpostal.substring(0,2))];
    }
    else{
        document.getElementById(`grupo_comunidad`).classList.remove('grupo_correcto');
        document.getElementById(`grupo_comunidad`).classList.add('grupo_incorrecto');
	  return "---";
    }
}

//Función que comprueba la letra del DNI
function compruebaLetra(){
    let nif = dni.value.substring(0,8);
    const letras = ['T','R','W','A','G','M','Y','F','P','D','X','B','N','J','Z','S','Q','V','H','L','C','K','E','T'];
    indice = nif%23;
    if(letras[indice] == dni.value.substring(8,)){
        camposRegistroAdminUsuario.dni = true;
    } else{
        camposRegistroAdminUsuario.dni = false;
        document.getElementById(`grupo_dni`).classList.add('grupo_incorrecto');
		document.getElementById(`grupo_dni`).classList.remove('grupo_correcto');

		document.querySelector(`#grupo_dni .inputs`).classList.add('input_incorrecto');
		document.querySelector(`#grupo_dni .inputs`).classList.remove('input_correcto');

        document.querySelector(`#grupo_dni .mensaje_error`).classList.add('mensaje_error_visible');
    }
}

inputsRegistroAdminUsuario.forEach((input) => {
	input.addEventListener('keyup', validarFormularioRegistroAdminUsuario);
	input.addEventListener('blur', validarFormularioRegistroAdminUsuario);
});

registroAdminUsuario.addEventListener('submit', (e) => {
	
	if(camposRegistroAdminUsuario.usuario && camposRegistroAdminUsuario.password && camposRegistroAdminUsuario.nombre && camposRegistroAdminUsuario.apellido1 && camposRegistroAdminUsuario.apellido2 && camposRegistroAdminUsuario.fN && camposRegistroAdminUsuario.dni && camposRegistroAdminUsuario.telefono && camposRegistroAdminUsuario.correo && camposRegistroAdminUsuario.cp && camposRegistroAdminUsuario.direccion && camposRegistroAdminUsuario.rol){

		document.querySelector(`#registroUsuario .mensaje_exito_boton`).classList.add('grupo_correcto');
		document.querySelector(`#registroUsuario .mensaje_exito_boton`).classList.add('mensaje_error_visible');
		setTimeout(() => {
			document.getElementById('boton_exito').classList.remove('mensaje_error_visible');
		}, 5000);
	} else {
		e.preventDefault();
		document.querySelector(`#registroUsuario .mensaje_error_boton`).classList.add('grupo_incorrecto');
		document.querySelector(`#registroUsuario .mensaje_error_boton`).classList.add('mensaje_error_visible');
		setTimeout(() => {
			document.getElementById('boton_error').classList.remove('mensaje_error_visible');
		}, 5000);
	}
});
