<?php

    print '
        <!DOCTYPE HTML>
        <html>';
            include("dbconnection.php");
            print'
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
                    <div class="header-img"></div>';
                    include("navigation.php");
                print '    
                </header>';
                if ($_POST['_action_'] == FALSE) {
                    print '
                        <main class="col-lg-6 col-md-6 col-sm-6 container justify-content-center">
                            <h1 class="mt-4 mb-4">Login</h1>
                            <form action="" id="login_form" name="login" method="POST">
                                <input type="hidden" id="_action_" name="_action_" value="TRUE">
                                <div class="form-group row mb-2">
                                    <label for="username" class="col-sm-3 col-form-label">Username <span style="color: red;">*</span></label>
                                    <div class="col-sm-6">
                                    <input type="text" class="form-control" name=username id="username" placeholder="Username" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label for="password" class="col-sm-3 col-form-label">Password <span style="color: red;">*</span></label>
                                    <div class="col-sm-6">
                                    <input type="password" class="form-control" name=password id="password" placeholder="Password" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                <div class="col-sm-6">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                                </div>
                            </form>
                        </main>';
                } else if ($_POST['_action_'] == TRUE) {
                    $query  = "SELECT * FROM user";
                    $query .= " WHERE username='" .  $_POST['username'] . "'";
                    $result = @mysqli_query($mysql, $query);
                    $row = @mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    if (password_verify($_POST['password'], $row['password'])) {
                        $_SESSION['user']['valid'] = 'true';
                        $_SESSION['user']['id'] = $row['id'];
                        $_SESSION['user']['firstname'] = $row['firstname'];
                        $_SESSION['user']['lastname'] = $row['lastname'];
                        $_SESSION['message'] = '<p>Welcome, ' . $_SESSION['user']['firstname'] . ' ' . $_SESSION['user']['lastname'] . '</p>';
                        header("Location: index.php?menu=8");
                    } else {
                        // print '<p>You entered wrong email or password!</p>';
                        unset($_SESSION['user']);
                        $_SESSION['message'] = '<p>You entered wrong email or password!</p>';
                        header("Location: index.php?menu=7");
                    }
                }    
                print '      
                    <footer class="navbar navbar-expand-sm bg-primary">
                        <p class="text-center mx-auto mt-2" style="color:white">Copyright &copy; 2021 Matija Hanžeković</p>
                    </footer>
                </body>
        </html>';

?>        