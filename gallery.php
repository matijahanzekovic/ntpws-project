<?php

    $db = $GLOBALS['db'];
    $menu = $_GET['menu'];

    $query  = "SELECT * FROM image";
    $result = @mysqli_query($db, $query);
    print '
    <div class="container news-details">
        <br>
        <div class="row">
            <h1>Gallery</h1>
        </div>
        <div class="row mt-4">';
        while ($row = @mysqli_fetch_array($result)) {
            print '
                <div class="col-lg-4 col-md-4 col-sm-6 mb-4">
                    <div class="card border-dark h-100">
                        <img class="card-img-top" src="img/' . $row['name'] . '" alt="' . $row['title'] . '" title="' . $imgRow['title'] . '">
                        <div class="card-body">
                            <p class="card-text">' . $row['description'] . '</p>
                        </div>
                    </div>
                </div>';
        }
        print '
        </div>
        <br>
        <p><a href="index.php?menu='.$menu.'&amp;action='.$action.'">Back</a></p>
    </div>';

?>