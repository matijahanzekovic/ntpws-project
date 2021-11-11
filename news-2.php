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
		<main class="container news-details">
            <div class="row mt-4">
                <div class="col-lg-4 col-md-4 col-sm-6 mb-4">
                    <div class="card border-dark h-100">
                        <img class="card-img-top" src="img/news-2.jpg" alt="Breaking news" title="Breaking news">
                        <div class="card-body">
                            <p class="card-text">Under the new measures, soldiers will patrol the streets in some of the worst-hit areas.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 mb-4">    
                    <div class="card border-dark h-100">
                        <img class="card-img-top" src="img/news-2-1.jpg" alt="Breaking news" title="Breaking news">
                        <div class="card-body">
                            <p class="card-text">The measure was announced by President Guillermo Lasso on Monday evening in response to a wave of violent crime.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 mb-4">      
                    <div class="card border-dark h-100">
                        <img class="card-img-top" src="img/news-2-2.jpg" alt="Breaking news" title="Breaking news">
                        <div class="card-body">
                            <p class="card-text">Guillermo Lasso said police and the armed forces were being mobilised and their presence would be felt "with force" in the streets.</p>
                        </div>
                    </div>
                </div>
            </div>
            <hr><h1>Ecuador crime wave triggers state of emergency</h1>
            <h2>A 60-day nationwide state of emergency has come into force in Ecuador.</h2>
            <p>The measure was announced by President Guillermo Lasso on Monday evening in response to a wave of violent crime.</p>
            <p>Guillermo Lasso said police and the armed forces were being mobilised and their presence would be felt "with force" in the streets.</p>
            <p>Official figures suggest the number of murders in the first eight months of this year are double those in the same period last year.</p>
            <p>Speaking in a televised address, President Lasso said that under the emergency measures, the armed forces and police would carry out "arms checks, inspections, 24-hour patrols, and drug searches, among other actions".</p>
            <p>The measure was introduced weeks after a prison fight in the port city of Guayaquil left 119 inmates dead.</p>
            <p>Analysts said the prison killings had probably been ordered from outside the jail, mirroring a power struggle between Mexican drug cartels currently under way in Ecuador.</p>
            <br>
            <p class="text-right"><time datetime="2021-10-19"><small class="text-muted">19 October 2021</small></time></p>
            <p>Source: <a href="https://www.bbc.com/news/world-latin-america-58966156">BBC.com</a></p>
            <p><a href="news.php">Back to news</a></p>
		</main>
		<footer class="navbar navbar-expand-sm bg-primary">
			<p class="text-center mx-auto mt-2" style="color:white">Copyright &copy; 2021 Matija Hanžeković</p>
		</footer>
    </body>
</html>