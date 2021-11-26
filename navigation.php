<?php

    print '
        <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
        <div class="navbar-collapse">
            <ul class="navbar-nav me-auto">
                <li><a class="nav-item nav-link active" href="index.php?menu=1">Home</a></li>
                <li><a class="nav-item nav-link" href="index.php?menu=2">News</a></li>
                <li><a class="nav-item nav-link" href="index.php?menu=3">Contact</a></li>
                <li><a class="nav-item nav-link" href="index.php?menu=4">About</a></li>
                <li><a class="nav-item nav-link" href="index.php?menu=5">Gallery</a></li>
                <li><a class="nav-item nav-link" href="index.php?menu=9">Weather Forecast</a></li>
            </ul>
            <ul class="navbar-nav">';
                if (isset($_SESSION['user']['valid']) || $_SESSION['user']['valid'] == 'true') {
                    print '<li><a class="nav-item nav-link" href="index.php?menu=8">Admin</a></li>';
                    print '<li><a class="nav-item nav-link" href="logout.php">Logout</a></li>';
                } else {
                    print '    
                        <li><a class="nav-item nav-link" href="index.php?menu=6">Register</a></li>
                        <li><a class="nav-item nav-link" href="index.php?menu=7">Login</a></li>';
                }
            print '    
            </ul>    
            </div>
        </div>
    </nav>';

?>