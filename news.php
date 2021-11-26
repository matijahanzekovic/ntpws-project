<?php

    $db = $GLOBALS['db'];
    $menu = $_GET['menu'];

    if (isset($_GET['id']) && $_GET['id'] != '') {
        $query  = "SELECT * FROM news";
        $query .= " WHERE id=".$_GET['id'];
        $query .= " ORDER BY date DESC";
        $result = @mysqli_query($db, $query);
        $row = @mysqli_fetch_array($result, MYSQLI_ASSOC);

        $imgQuery  = "SELECT * FROM image";
        $imgQuery .= " WHERE news_id=".$_GET['id'];
        $imgResult = @mysqli_query($db, $imgQuery);
        print '
        <div class="container news-details">
            <br>
            <div class="row">
                <h1>News overview</h1>
            </div>
            <div class="row mt-4">';
            while ($imgRow = @mysqli_fetch_array($imgResult)) {
                print '
                    <div class="col-lg-4 col-md-4 col-sm-6 mb-4">
                        <div class="card border-dark h-100">
                            <img class="card-img-top" src="img/' . $imgRow['name'] . '" alt="' . $imgRow['title'] . '" title="' . $imgRow['title'] . '">
                            <div class="card-body">
                                <p class="card-text">' . $imgRow['description'] . '</p>
                            </div>
                        </div>
                    </div>';
            }
            print '
            </div>
            <hr>
            <h2>' . $row['title'] . '</h2>
            <p>' . $row['description'] . '</p>
            <p><time datetime="' . $row['date'] . '">' . $row['date'] . '</small></time></p>
            <p><a href="index.php?menu='.$menu.'&amp;action='.$action.'">Back</a></p>
        </div>';
    } else {
        print '
		<div class="container news">
			<div class="row">
                <h1>News</h1>
            </div>
			<br>
			<div class="row">';
			$query  = "SELECT * FROM news";
			$query .= " ORDER BY date DESC";
			$result = @mysqli_query($db, $query);

			while($row = @mysqli_fetch_array($result)) {
				$imgQuery  = "SELECT * FROM image";
				$imgQuery .= " WHERE news_id=".$row['id'];
				$imgQuery .= " LIMIT 1";
				$imgResult = @mysqli_query($db, $imgQuery);
				$imgRow = @mysqli_fetch_array($imgResult);

				$description = substr($row['description'], 0, 100);
				print '
				<div class="col-lg-4 col-md-4 col-sm-6 mb-4">
				<div class="card border-dark h-100">
					<img class="card-img-top" src="img/' . $imgRow['name'] . '" alt="' . $imgRow['title'] . '" title="' . $imgRow['title'] . '">
					<div class="card-body">
						<h5 class="card-title">' . $row['title'] . '</h5>
						<p class="card-text">' . $description . '
							<span><a href="index.php?menu=' . $menu . '&amp;action=' . $action . '&amp;id=' .$row['id']. '"><small class="text-muted">More...</small></a></span></p>
						<p><time datetime="' . $row['date'] . '">' . $row['date'] . '</small></time></p>
					</div>
				</div>
			</div>';
			}
			print '
			</div>
		</div>';
    }

    @mysqli_close($db);
?>