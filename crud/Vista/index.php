<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CRUD CON PHP</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<script src="js/main.js"></script>
<script src="js/script.js"></script>
<body>
	<nav class="navbar navbar-expand-lg bg-body-tertiary">
	  <div class="container-fluid">
	    <a class="navbar-brand" href="#">Navbar</a>
	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
	      <div class="navbar-nav">
	        <a class="nav-link active" aria-current="page" href="#">Home</a>
	        <a class="nav-link" href="#">Features</a>
	        <a class="nav-link" href="#">Pricing</a>
	      </div>
	    </div>
	  </div>
	</nav>
	<div class="container-fluid">
		<h2 style="text-align: center;">Lista de usuarios</h2>

		<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
  </tbody>
</table>
	</div>

	<div class="container-fluid">
<form class="row g-3" action="Guardar();" id="frmIngresar" name="frmIngresar">
	<input type="hidden" class="form-control" id="id" value="" required>
  <div class="col-md-4">
    <label for="validationDefault01" class="form-label">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre" value="Mark" required>
  </div>
  <div class="col-md-4">
    <label for="validationDefault02" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" value="Otto" required>
  </div>

  <div class="col-12">
    <button class="btn btn-primary" type="submit">Submit form</button>
  </div>
</form>
</div>
</body>
</html>