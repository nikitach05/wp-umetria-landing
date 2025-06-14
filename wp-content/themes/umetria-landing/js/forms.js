// Sending forms
const formBtn = document.querySelectorAll('.send-form');
formBtn.forEach(btn => {
	btn.addEventListener('click', async (e) => {
		e.preventDefault();
		let form = e.target.closest('form');
		let formData = new FormData(form);
		let fields = form.querySelectorAll('.required');
		let state = validate(fields);
		if (state) {
			sendForm(formData);
		}
	});
});

async function sendForm(formData) {
	formData.append('action', 'send_form');
	let response = await fetch('/wp-admin/admin-ajax.php', {
		method: 'POST',
		body: formData
	});
	let result = await response.text();
	
	if (result == 'ok0' || result == '0') {

		const modals = document.querySelectorAll('.modal');
        modals.forEach(modal => modal.classList.remove('modal--opened'));

		ym(97788233,'reachGoal','submit');

		// amoCRM
		let response = await fetch('/amo/amo.php', {
			method: 'POST',
			body: formData
		});

		document.querySelector('#modal-success').classList.add('modal--opened');
		
		// Clear input data
		document.querySelectorAll('input[type="text"], input[type="tel"]').forEach(input => input.value = '');
	}
}

const formQuizBtn = document.querySelectorAll('.quiz__submit');
formQuizBtn.forEach(btn => {
	btn.addEventListener('click', async (e) => {
		e.preventDefault();
		let form = e.target.closest('form');
		let formData = new FormData(form);
		let fields = form.querySelectorAll('.required');
		let state = validate(fields);
		if (state) {
			sendQuizForm(formData);
		}
	});
});

async function sendQuizForm(formData) {
	formData.append('action', 'send_quiz_form');
	let response = await fetch('/wp-admin/admin-ajax.php', {
		method: 'POST',
		body: formData
	});
	let result = await response.text();
	result = JSON.parse(result);
	
	console.log(result);
	
	if (result.status == 'success') {

		const quizItems = document.querySelectorAll('.quiz__form-item');
		quizItems.forEach(item => item.classList.remove('active'));

		const finishQuizItem = document.querySelector('.quiz__form-item:last-of-type');
		if (finishQuizItem) {
			finishQuizItem.classList.add('active');
		}
		
		ym(97788233,'reachGoal','submit');

		// amoCRM
		formData.set('file', result.file);
		let response = await fetch('/amo/amo.php', {
			method: 'POST',
			body: formData
		});
		
		// Clear input data
		document.querySelectorAll('input[type="text"], input[type="tel"]').forEach(input => input.value = '');
	}
}

function validate(fields) {
	let state = true;
	fields.forEach(input => {
		if (input.value == '') {
			input.classList.add('error');
			state = false;
		} else {
			input.classList.remove('error');
		}

		if (input.type == 'tel') {
			let tel = input.value.replace(/[^0-9]/g,"");
			if (tel.length !== 11) {
				input.classList.add('error');
				state = false;
			} else {
				input.classList.remove('error');
			}
		}
		if (input.type == 'checkbox') {
			input.parentNode.querySelector('.checkbox-field__box').classList.toggle('error', !input.checked);

			if (input.parentNode.querySelector('.checkbox-field__box').classList.contains('error')) {
				state = false;
			}
		}
	});
	return state;
}