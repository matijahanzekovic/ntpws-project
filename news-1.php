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
                        <img class="card-img-top" src="img/news-1.jpg" alt="Breaking news" title="Breaking news">
                        <div class="card-body">
                            <p class="card-text">Haiti kidnappers 'demand $17m' for missionaries.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 mb-4">    
                    <div class="card border-dark h-100">
                        <img class="card-img-top" src="img/news-1-1.jpeg" alt="Breaking news" title="Breaking news">
                        <div class="card-body">
                            <p class="card-text">162 number of gangs reportedly active in Haiti.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 mb-4">      
                    <div class="card border-dark h-100">
                        <img class="card-img-top" src="img/news-1-2.jpg" alt="Breaking news" title="Breaking news">
                        <div class="card-body">
                            <p class="card-text">Many streets in Port-au-Prince were empty after unions called for a strike.</p>
                        </div>
                    </div>
                </div>
            </div>
            <hr><h1>Haiti kidnappers 'demand $17m' for missionaries</h1>
            <h2>A gang which kidnapped a group of missionaries from the US and Canada in Haiti on Saturday is demanding $1m (£725,000) in ransom for each of the 17 people it is holding.</h2>
            <p>The gang is notorious for kidnapping groups of people for ransom.</p>
            <p>The same gang, 400 Mazowo, abducted a group of Catholic clergy in April.</p>
            <p>The clergy were later released but it is not clear if a ransom was paid.</p>
            <p>All of those kidnapped are US citizens, except one who is a Canadian national.</p>
            <p>Among those seized are five men, seven women and five children. The youngest child is reportedly only two years old.</p>
            <p>They worked for Christian Aids Ministries, a non-profit missionary organisation based in the US state of Ohio, which supplies Haitian children with shelter, food and clothing.</p>
            <br>
            <p class="text-right"><time datetime="2021-10-19"><small class="text-muted">19 October 2021</small></time></p>
            <p>Source: <a href="https://www.bbc.com/news/world-latin-america-58966154">BBC.com</a></p>
            <p><a href="news.php">Back to news</a></p>
		</main>
		<footer class="navbar navbar-expand-sm bg-primary">
			<p class="text-center mx-auto mt-2" style="color:white">Copyright &copy; 2021 Matija Hanžeković</p>
		</footer>
    </body>
</html>