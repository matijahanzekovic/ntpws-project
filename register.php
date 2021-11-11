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
                        <main class="container">
                            <h1 class="mt-4 mb-4">Registration Form</h1>
                            <form action="" id="registration_form" name="registration_form" method="POST">
                                <input type="hidden" id="_action_" name="_action_" value="TRUE">
                                <div class="form-group row mt-4 mb-2">
                                    <label for="firstname" class="col-sm-2 col-form-label">First name <span style="color: red;">*</span></label>
                                    <div class="col-sm-6">
                                    <input type="text" class="form-control" name=firstname id="firstname" placeholder="First name" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label for="lastname" class="col-sm-2 col-form-label">Last name <span style="color: red;">*</span></label>
                                    <div class="col-sm-6">
                                    <input type="text" class="form-control" name=lastname id="lastname" placeholder="Last name" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label for="dateOfBirth" class="col-sm-2 col-form-label">Date of birth <span style="color: red;">*</span></label>
                                    <div class="col-sm-6">
                                    <input type="date" class="form-control" name=dateOfBirth id="dateOfBirth" placeholder="Select date" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label for="country" class="col-sm-2 col-form-label">Country <span style="color: red;">*</span></label>
                                    <div class="form-group col-sm-6">
                                        <select name=country id="country" class="form-control">
                                            <option value="">Choose...</option>';
                                                $query  = "SELECT * FROM country";
                                                $result = @mysqli_query($mysql, $query);
                                                while($row = @mysqli_fetch_array($result)) {
                                                    print '<option value="' . $row['country_code'] . '">' . $row['country_name'] . '</option>';
                                                }
                                            print '
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label for="city" class="col-sm-2 col-form-label">City <span style="color: red;">*</span></label>
                                    <div class="col-sm-6">
                                    <input type="text" class="form-control" name=city id="city" placeholder="City" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label for="street" class="col-sm-2 col-form-label">Street <span style="color: red;">*</span></label>
                                    <div class="col-sm-6">
                                    <input type="text" class="form-control" name=street id="street" placeholder="Street" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label for="email" class="col-sm-2 col-form-label">Email <span style="color: red;">*</span></label>
                                    <div class="col-sm-6">
                                        <input type="email" class="form-control" name=email id="email" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label for="username" class="col-sm-2 col-form-label">Username <span style="color: red;">*</span></label>
                                    <div class="col-sm-6">
                                    <input type="text" class="form-control" name=username id="username" placeholder="Username" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label for="password" class="col-sm-2 col-form-label">Password <span style="color: red;">*</span></label>
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
                    $query .= " WHERE email='" .  $_POST['email'] . "'";
                    $query .= " OR username='" .  $_POST['username'] . "'";
                    $result = @mysqli_query($mysql, $query);
                    $row = @mysqli_fetch_array($result, MYSQLI_ASSOC);

                    if ($row['email'] == '' || $row['username'] == '') {
                        $pass_hash = password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost' => 12]);
                        
                        $query  = "INSERT INTO user (first_name, last_name, email, username, password, country, city, street, date_of_birth)";
                        $query .= " VALUES ('" . $_POST['firstname'] . "', '" . $_POST['lastname'] . "', '" . $_POST['email'] . "', '" . $_POST['username'] . "', '" . $pass_hash . "', '" . $_POST['country'] . "', '" . $_POST['city'] . "', '" . $_POST['street'] . "', '" . $_POST['dateOfBirth'] . "')";
                        $result = @mysqli_query($mysql, $query);
                        
                        print '<div class=text-center><p>' . ucfirst(strtolower($_POST['firstname'])) . ' ' .  ucfirst(strtolower($_POST['lastname'])) . ', thank you for registration </p></div>';
                    } else {
                        print '<p>User with this email or username already exist!</p>';
                    }
                }    
                print '      
                    <footer class="navbar navbar-expand-sm bg-primary">
                        <p class="text-center mx-auto mt-2" style="color:white">Copyright &copy; 2021 Matija Hanžeković</p>
                    </footer>
                </body>
        </html>';

?>        