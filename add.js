function add(){

	name = document.getElementById('form_name').value;
	surname = document.getElementById('form_surname').value;
	email = document.getElementById('form_email').value;
	phone =	document.getElementById('form_phone').value;


	user_table_body = document.getElementById('user_table_body');
	
	user_table_body.innerHTML += "<tr><td>" + name + "</td><td>" + surname +  "</td><td>" + email + "</td><td>" + phone + "</td></tr>";


}