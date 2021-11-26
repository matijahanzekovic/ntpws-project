<?php 
	if ($_SESSION['user']['valid'] == 'true') {
		if (!isset($_GET['action'])) {
            $action = 0;
        }

		print '
            <div class="container" style="margin-bottom:4.5rem">
                <h1 class="mt-2 mr-2">Administration</h1>
                <div class="col-4">
                    <ul class="list-group">';
                    if ($_SESSION['user']['role'] === 'administrator') {
                    print '
                         <li class="list-group-item border-dark"><a href="index.php?menu=8&amp;action=1">Users</a></li>';
                    } 
                    print '
                        <li class="list-group-item border-dark"><a href="index.php?menu=8&amp;action=2">News</a></li>
                    </ul>
                </div>
            </div>';

        $action = $_GET['action'];

        if ($action == 1) { 
            include("admin/users.php"); 
        } else if ($action == 2) { 
            include("admin/news.php"); 
        }
	} else {
		$_SESSION['message'] = '<p>Please register or login using your credentials!</p>';
		header("Location: index.php?menu=7");
	}
    
?>