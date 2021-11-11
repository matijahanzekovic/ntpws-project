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
		<main class="container news">
            <div class="row">
                <h1>News</h1>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 mb-4">
                    <div class="card h-100">
                        <img class="card-img-top" src="img/news-1.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Haiti kidnappers 'demand $17m' for missionaries</h5>
                            <p class="card-text">A gang which kidnapped a group of missionaries from the US and Canada in Haiti on Saturday is demanding $1m (£725,000) in ransom for each of the 17 people it is holding, the Haitian justice minister has told the Wall Street Journal.
                                <span><a href="news-1.php"><small class="text-muted">More...</small></a></span></p>
                            <p><time datetime="2021-10-19"><small class="text-muted">19 October 2021</small></time></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 mb-4">    
                    <div class="card h-100">
                        <img class="card-img-top" src="img/news-2.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Ecuador crime wave triggers state of emergency</h5>
                            <p class="card-text">A 60-day nationwide state of emergency has come into force in Ecuador. The measure was announced by President Guillermo Lasso on Monday evening in response to a wave of violent crime.
                                <span><a href="news-2.php"><small class="text-muted">More...</small></a></span></p>
                            <p><time datetime="2021-10-19"><small class="text-muted">19 October 2021</small></time></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 mb-4">      
                    <div class="card h-100">
                        <img class="card-img-top" src="img/news-3.png" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Cleo Smith: 'Grave concerns' for Australian girl missing from beach campsite</h5>
                            <p class="card-text">Australian police say they have "grave concerns" for a four-year-old girl who disappeared from a remote coastal campsite at the weekend. 
                                <span><a href="news-3.php"><small class="text-muted">More...</small></a></span></p>
                            <p><time datetime="2021-10-19"><small class="text-muted">19 October 2021</small></time></p>
                        </div>
                    </div>
                </div>
            </div>
		</main>
		<footer class="navbar navbar-expand-sm bg-primary">
			<p class="text-center mx-auto mt-2" style="color:white">Copyright &copy; 2021 Matija Hanžeković</p>
		</footer>
    </body>
</html>