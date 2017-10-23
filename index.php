<!DOCTYPE html>
<html>
<head>

	<title>Errors</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<div class="row"><h1>Users</h1>
		</div>
		<div class="row">
			<div class="col"><h2>List</h2>
				<table class="table">
					<thead>
						<tr>
							<th>Name</th>
							<th>Surname</th>
							<th>Email</th>
							<th>Phone</th>
						</tr>

					</thead>
					<tbody id="user_table_body">
					
					</tbody>
				</table>
			</div>
			<div class="col">
				<h2>Register</h2>
				<div id="alert"></div>
				
					<div class="input-group">
						<input class="form-control" type="text" name="name" placeholder="Name" id="form_name">
					</div><br/>
					<div class="input-group">
						<input class="form-control" type="text" name="surname"	placeholder="Surname" id="form_surname">
					</div><br/>
					<div class="input-group">
						<input class="form-control" type="text" name="email" placeholder="Email" id="form_email">
					</div><br/>
					<div class="input-group">
						<input class="form-control" type="text" name="phone" placeholder="Phone" id="form_phone">
					</div><br/>
					<div>
						<input onclick="add()" class="btn btn-danger" type="button" value="Add">
					</div>
					<div>
						<input id="ajax_post" class="btn btn-warning" type="button" value="AJAX post">
					</div>

			</div>
		</div>
	</div>
<script src="add.js"></script>
</body>
</html>