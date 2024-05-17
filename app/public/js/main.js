function changeMenu() {
	const btnMenu = document.getElementById('menu');
	const optionsMenu = document.getElementById('menuOptions');
	if (btnMenu.checked) {
		optionsMenu.style.display = "block";
	} else {
		optionsMenu.style.display = "none";
	}
}

function changeImg() {
	const defaultImg = '/app/public/img/userDefault.png';
	const imgPP = document.getElementById('imgPP');
	const previewimg = document.getElementById('previewImgPP');
	const imgInput = document.getElementById('img');
	imgInput.addEventListener('change', e => {
		if (e.target.files[0]) {
			const reader = new FileReader();
			reader.onload = function (e) {
				previewimg.src = e.target.result;
				previewimg.style.display = 'block';
				imgPP.style.display = 'none';
			}
			reader.readAsDataURL(e.target.files[0]);
		} else {
			previewimg.style.display = 'none';
			previewimg.src = defaultImg;
			imgPP.style.display = 'block';
		}
	})
}

function activateInput(inputNumber) {
	// obtencion de los inputs
	const name = document.getElementById('name');
	const lastname = document.getElementById('lastname');
	const username = document.getElementById('username');
	const email = document.getElementById('email');
	const password = document.getElementById('password');
	switch (inputNumber) {
		case 1:
			name.disabled = false;
			lastname.disabled = true;
			username.disabled = true;
			email.disabled = true;
			password.disabled = true;
			break;
		case 2:
			name.disabled = true;
			lastname.disabled = false;
			username.disabled = true;
			email.disabled = true;
			password.disabled = true;
			break;
		case 3:
			name.disabled = true;
			lastname.disabled = true;
			username.disabled = false;
			email.disabled = true;
			password.disabled = true;
			break;
		case 4:
			name.disabled = true;
			lastname.disabled = true;
			username.disabled = true;
			email.disabled = false;
			password.disabled = true;
			break;
		case 5:
			name.disabled = true;
			lastname.disabled = true;
			username.disabled = true;
			email.disabled = true;
			password.disabled = false;
			break;

		default:
			break;
	}
}

function showSpecialities (){
	const select = document.getElementById('role');
	const speciality = document.getElementById('especilidades');

	if (select.value == 2) {
		speciality.style.display = 'block';
	} else {
		speciality.style.display = 'none';	
	}

}