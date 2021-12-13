const login = document.getElementById('formulario');
const inputsLogin = document.querySelectorAll('#formulario input');

const expresionesLogin = {
	usuario: /^[a-zA-Z0-9\_\-]{6,20}$/,
	password: /^(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}$/

}

const camposLogin = {
	usuario: false,
	password: false,
}

const validarFormularioLogin = (e) => {
	switch (e.target.name) {
		case "usuario":
			validarCampoLogin(expresionesLogin.usuario, e.target, 'usuario');
		break;
		case "password":
			validarCampoLogin(expresionesLogin.password, e.target, 'password');
		break;
	}
}

const validarCampoLogin=(expresion, input, campo)=>{
	if (expresion.test(input.value)) {
		document.getElementById(`grupo_${campo}`).classList.remove('grupo_incorrecto');
		document.getElementById(`grupo_${campo}`).classList.add('grupo_correcto');

		document.querySelector(`#grupo_${campo} .inputs`).classList.add('input_correcto');
		document.querySelector(`#grupo_${campo} .inputs`).classList.remove('input_incorrecto');

		document.querySelector(`#grupo_${campo} .mensaje_error`).classList.remove('mensaje_error_visible');
		camposLogin[campo] = true;

		let primeraLetra=usuario.value.charAt(0).toUpperCase();
		usuario.value=primeraLetra.concat("", usuario.value.slice(1,));
	}
	else{
		document.getElementById(`grupo_${campo}`).classList.add('grupo_incorrecto');
		document.getElementById(`grupo_${campo}`).classList.remove('grupo_correcto');

		document.querySelector(`#grupo_${campo} .inputs`).classList.add('input_incorrecto');
		document.querySelector(`#grupo_${campo} .inputs`).classList.remove('input_correcto');

		document.querySelector(`#grupo_${campo} .mensaje_error`).classList.add('mensaje_error_visible');
		camposLogin[campo] = false;

		let primeraLetra=usuario.value.charAt(0).toUpperCase();
		usuario.value=primeraLetra.concat("", usuario.value.slice(1,));
	}
}

inputsLogin.forEach((input) => {
	input.addEventListener('keyup', validarFormularioLogin);
	input.addEventListener('blur', validarFormularioLogin);
});

login.addEventListener('submit', (e) => {
	
	if(camposLogin.usuario && camposLogin.password){

		document.querySelector(`#formulario .mensaje_exito_boton`).classList.add('grupo_correcto');
		document.querySelector(`#formulario .mensaje_exito_boton`).classList.add('mensaje_error_visible');
		setTimeout(() => {
			document.getElementById('boton_exito').classList.remove('mensaje_error_visible');
		}, 5000);
	} else {
		e.preventDefault();
		document.querySelector(`#formulario .mensaje_error_boton`).classList.add('grupo_incorrecto');
		document.querySelector(`#formulario .mensaje_error_boton`).classList.add('mensaje_error_visible');
		setTimeout(() => {
			document.getElementById('boton_error').classList.remove('mensaje_error_visible');
		}, 5000);
	}
});