<?php

    print '
        <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
        <div class="navbar-collapse">
            <ul class="navbar-nav me-auto">
                <li><a class="nav-item nav-link active" href="home.php?menu=1">Home</a></li>
                <li><a class="nav-item nav-link" href="news.php?menu=2">News</a></li>
                <li><a class="nav-item nav-link" href="contact.php?menu=3">Contact</a></li>
                <li><a class="nav-item nav-link" href="about.php?menu=4">About</a></li>
                <li><a class="nav-item nav-link" href="gallery.php?menu=5">Gallery</a></li>
            </ul>
            <ul class="navbar-nav">';
                if (isset($_SESSION['user']['valid']) || $_SESSION['user']['valid'] == 'true') {
                    print '<li><a class="nav-item nav-link" href="admin.php?menu=8">Admin</a></li>';
                    print '<li><a class="nav-item nav-link" href="logout.php">Logout</a></li>';
                } else {
                    print '    
                        <li><a class="nav-item nav-link" href="register.php?menu=6">Register</a></li>
                        <li><a class="nav-item nav-link" href="login.php?menu=7">Login</a></li>';
                }
            print '    
            </ul>    
            </div>
        </div>
    </nav>';

?>