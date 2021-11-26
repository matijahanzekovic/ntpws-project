<?php

    include("modal.php");
    $db = $GLOBALS['db'];

    if ($_POST['_action_'] == FALSE) {
        print '
            <div class="container">
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
                                    $result = @mysqli_query($db, $query);
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
            </div>';
    } else if ($_POST['_action_'] == TRUE) {
        $query  = "SELECT * FROM user";
        $query .= " WHERE email='" .  $_POST['email'] . "'";
        $query .= " OR username='" .  $_POST['username'] . "'";
        $result = @mysqli_query($db, $query);
        $row = @mysqli_fetch_array($result, MYSQLI_ASSOC);

        if ($row['email'] == '' || $row['username'] == '') {
            $pass_hash = password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost' => 12]);
                        
            $query  = "INSERT INTO user (first_name, last_name, email, username, password, country, city, street, date_of_birth)";
            $query .= " VALUES ('" . $_POST['firstname'] . "', '" . $_POST['lastname'] . "', '" . $_POST['email'] . "', '" . $_POST['username'] . "', '" . $pass_hash . "', '" . $_POST['country'] . "', '" . $_POST['city'] . "', '" . $_POST['street'] . "', '" . $_POST['dateOfBirth'] . "')";
            $result = @mysqli_query($db, $query);

            # show message and redirect
            createModal('Registration', "Thank you for your registration");
            showModal();
            header("refresh:2; url=index.php?menu=7");
                        
        } else {
            # show message and redirect
            createModal('Registration', 'User with this email or username already exist');
            showModal();
            header("refresh:2; url=index.php?menu=6");
        }
    }    
    
?>        