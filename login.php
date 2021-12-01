<?php

    include("modal.php");

    $db = $GLOBALS['db'];

    if ($_POST['_action_'] == FALSE) {
        print '
            <div class="col-lg-6 col-md-6 col-sm-6 container justify-content-center">
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
            </div>';
    } else if ($_POST['_action_'] == TRUE) {
        $query  = "SELECT * FROM user";
        $query .= " WHERE username='" .  $_POST['username'] . "'";
        $result = @mysqli_query($db, $query);
        $row = @mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
        if (password_verify($_POST['password'], $row['password'])) {
            $_SESSION['user']['valid'] = 'true';
            $_SESSION['user']['id'] = $row['id'];
            $_SESSION['user']['firstname'] = $row['first_name'];
            $_SESSION['user']['lastname'] = $row['last_name'];
            $_SESSION['user']['role'] = $row['role'];
            createModal('Login page', 'Welcome, ' . $_SESSION['user']['firstname'] . ' ' . $_SESSION['user']['lastname'] . '');
            showModal();
		    header("refresh:2; url=index.php?menu=1");
        } else {
            unset($_SESSION['user']);
            
            createModal('Login page', 'You entered wrong email or password!');
            showModal();
		    header("refresh:2; url=index.php?menu=7");
        }
    }    

?>        