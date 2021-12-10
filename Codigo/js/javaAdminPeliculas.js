const registroAdminPeliculas = document.getElementById('registroPeliculas');
const inputsRegistroAdminPeliculas = document.querySelectorAll('#registroPeliculas input');

const expresionesRegistroAdminPeliculas = {
	titulo: /^[0-9a-zA-ZÀ-ÿ':,\s]{1,100}$/,
	publicacion: /^[0-9]{4}[-]{1}[0-9]{2}[-]{1}[0-9]{2}/,
	stock: /^[0-9]{1,10}/,
	precio: /^[0-9]{1,10}/

}

const camposRegistroAdminPeliculas = {
	titulo: false,
    productora: false,
	publicacion: false,
	stock: false,
	precio: false,

}

const validarFormularioRegistroAdminPeliculas = (e) => {
	switch (e.target.name) {
		case "titulo":
			validarCampoRegistroAdminPeliculas(expresionesRegistroAdminPeliculas.titulo, e.target, 'titulo');
		break;
        case "productora":
			validarCampoRegistroAdminPeliculas(expresionesRegistroAdminPeliculas.titulo, e.target, 'productora');
		break;
		case "publicacion":
			validarCampoRegistroAdminPeliculas(expresionesRegistroAdminPeliculas.publicacion, e.target, 'publicacion');
		break;
		case "stock":
			validarCampoRegistroAdminPeliculas(expresionesRegistroAdminPeliculas.stock, e.target, 'stock');
		break;
		case "precio":
			validarCampoRegistroAdminPeliculas(expresionesRegistroAdminPeliculas.precio, e.target, 'precio');
		break;
	}
}

const validarCampoRegistroAdminPeliculas=(expresion, input, campo)=>{
	if (expresion.test(input.value)) {
		document.getElementById(`grupo_${campo}`).classList.remove('grupo_incorrecto');
		document.getElementById(`grupo_${campo}`).classList.add('grupo_correcto');

		document.querySelector(`#grupo_${campo} .inputs`).classList.add('input_correcto');
		document.querySelector(`#grupo_${campo} .inputs`).classList.remove('input_incorrecto');

		camposRegistroAdminPeliculas[campo] = true;
		
		
	}
	else{
		document.getElementById(`grupo_${campo}`).classList.add('grupo_incorrecto');
		document.getElementById(`grupo_${campo}`).classList.remove('grupo_correcto');

		document.querySelector(`#grupo_${campo} .inputs`).classList.add('input_incorrecto');
		document.querySelector(`#grupo_${campo} .inputs`).classList.remove('input_correcto');

		camposRegistroAdminPeliculas[campo] = false;
		
		
	}
}

inputsRegistroAdminPeliculas.forEach((input) => {
	input.addEventListener('keyup', validarFormularioRegistroAdminPeliculas);
	input.addEventListener('blur', validarFormularioRegistroAdminPeliculas);
});

registroAdminPeliculas.addEventListener('submit', (e) => {
	
	if(camposRegistroAdminPeliculas.titulo && camposRegistroAdminPeliculas.productora && camposRegistroAdminPeliculas.publicacion && camposRegistroAdminPeliculas.stock && camposRegistroAdminPeliculas.precio){

		document.querySelector(`#registroPeliculas .mensaje_exito_boton`).classList.add('grupo_correcto');
		document.querySelector(`#registroPeliculas .mensaje_exito_boton`).classList.add('mensaje_error_visible');
		setTimeout(() => {
			document.getElementById('boton_exito').classList.remove('mensaje_error_visible');
		}, 5000);
	} else {
		e.preventDefault();
		document.querySelector(`#registroPeliculas .mensaje_error_boton`).classList.add('grupo_incorrecto');
		document.querySelector(`#registroPeliculas .mensaje_error_boton`).classList.add('mensaje_error_visible');
		setTimeout(() => {
			document.getElementById('boton_error').classList.remove('mensaje_error_visible');
		}, 5000);
	}
});