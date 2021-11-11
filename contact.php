<!DOCTYPE HTML>
<html>
	<head>
		<title>Programiranje web aplikacija</title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="author" content="Matija Hanžeković">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
		<link rel="stylesheet" href="style.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	</head>
    <body>
		<header>
			<div class="header-img"></div>
			<?php include("navigation.php"); ?>
		</header>
		<main class="container">
			<h1 class="mt-4 mb-4">Contact Form</h1>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2781.7890741539636!2d15.966758816056517!3d45.795453279106205!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4765d68b5d094979%3A0xda8bfa8459b67560!2sUl.+Vrbik+VIII%2C+10000%2C+Zagreb!5e0!3m2!1shr!2shr!4v1509296660756" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
            <form>
                <div class="form-group row mt-4 mb-2">
                    <label for="inputFirstName" class="col-sm-2 col-form-label">First name <span style="color: red;">*</span></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputFirstName" placeholder="First name" required>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="inputLastName" class="col-sm-2 col-form-label">Last name <span style="color: red;">*</span></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputLastName" placeholder="Last name" required>
                    </div>
                </div>
                <div class="form-group row mb-2">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Email <span style="color: red;">*</span></label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail" placeholder="Email" required>
                  </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="inputState" class="col-sm-2 col-form-label">State</label>
                    <div class="form-group col-sm-10">
                        <select id="inputState" class="form-control">
                          <option selected>Choose...</option>
                          <option>Croatia</option>
                          <option>Germany</option>
                          <option>USA</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="inputDescription" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="inputDescription" rows="3" placeholder="Description"></textarea>
                    </div>
                </div>
                <div class="form-group row mb-2">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </form>
        </main>
		<footer class="navbar navbar-expand-sm bg-primary">
			<p class="text-center mx-auto mt-2" style="color:white">Copyright &copy; 2021 Matija Hanžeković</p>
		</footer>
    </body>
</html>