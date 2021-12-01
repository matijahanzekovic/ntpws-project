<?php 

	include("../modal.php");

	$db = $GLOBALS['db'];
	$menu = $_GET['menu'];
	
	# Update user profile
	if (isset($_POST['edit']) && $_POST['_action_'] == 'TRUE') {
		$query  = "UPDATE user SET first_name='" . $_POST['firstname'] . "', last_name='" . $_POST['lastname'] . "', email='" . $_POST['email'] . "', username='" . $_POST['username'] . "', country='" . $_POST['country'] . "', city='" . $_POST['city'] . "', street='" . $_POST['street'] . "', date_of_birth='" . $_POST['dateOfBirth'] . "', role='" . $_POST['role'] . "', archive='" . $_POST['archive'] . "'";
        $query .= " WHERE id=" . (int)$_POST['edit'];
        $query .= " LIMIT 1";
        $result = @mysqli_query($db, $query);

		# show message and redirect
		createModal('User profile', 'You successfully changed user profile!');
        showModal();
		header("refresh:2; url=index.php?menu=8&action=1");
	}
	
	# Delete user profile
	if (isset($_GET['delete']) && $_GET['delete'] != '') {
	
		$query  = "DELETE FROM user";
		$query .= " WHERE id=".(int)$_GET['delete'];
		$query .= " LIMIT 1";
		$result = @mysqli_query($db, $query);

		# show message and redirect
		createModal('User profile', 'You successfully deleted user profile!');
        showModal();
		header("refresh:2; url=index.php?menu=8&action=1");
	}	
	
	#Show user info
	if (isset($_GET['id']) && $_GET['id'] != '') {
		$query  = "SELECT * FROM user";
		$query .= " WHERE id=".$_GET['id'];
		$result = @mysqli_query($db, $query);
		$row = @mysqli_fetch_array($result);

		$countryQuery  = "SELECT * FROM country";
		$countryQuery .= " WHERE country_code='" . $row['country'] . "'";
		$countryResult = @mysqli_query($db, $countryQuery);
		$countryRow = @mysqli_fetch_array($countryResult, MYSQLI_ASSOC);
		print '
		<div class="container" style="margin-top:-3rem">
			<br>
			<h2>User profile</h2>
			<p><b>First name:</b> ' . $row['first_name'] . '</p>
			<p><b>Last name:</b> ' . $row['last_name'] . '</p>
			<p><b>Username:</b> ' . $row['username'] . '</p>
			<p><b>Email:</b> ' . $row['email'] . '</p>
			<p><b>Role:</b> ' . $row['role'] . '</p>
			<p><b>Country:</b> ' . $countryRow['country_name'] . '</p>
			<p><b>City:</b> ' . $row['city'] . '</p>
			<p><b>Street:</b> ' . $row['street'] . '</p>
			<p><b>Date of birth:</b> ' . $row['date_of_birth'] . '</p>
			<p><b>Archive:</b>';if ($row['archive'] == 'Y') { 
									print ' Active'; 
								} else if ($row['archive'] == 'N') { 
									print ' Inactive'; 
								} print '</p>
			<br>
			<p><a href="index.php?menu='.$menu.'&amp;action='.$action.'">Back</a></p>
		</div>';
	}
	#Edit user profile
	else if (isset($_GET['edit']) && $_GET['edit'] != '') {
		$query  = "SELECT * FROM user";
		$query .= " WHERE id=".$_GET['edit'];
		$result = @mysqli_query($db, $query);
		$row = @mysqli_fetch_array($result);
		$checked_archive = false;
		
		print '
		<div class="container" style="margin-top:-3rem">
			<br>
			<h2>Edit user profile</h2>
			<form action="" id="registration_form" name="registration_form" method="POST">
				<input type="hidden" id="_action_" name="_action_" value="TRUE">
				<input type="hidden" id="edit" name="edit" value="' . $_GET['edit'] . '">
				<div class="form-group row mt-4 mb-2">
					<label for="firstname" class="col-sm-2 col-form-label">First name <span style="color: red;">*</span></label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name=firstname id="firstname" value="' . $row['first_name'] . '" placeholder="First name" required>
					</div>
				</div>
				<div class="form-group row mb-2">
					<label for="lastname" class="col-sm-2 col-form-label">Last name <span style="color: red;">*</span></label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name=lastname id="lastname" value="' . $row['last_name'] . '" placeholder="Last name" required>
					</div>
				</div>
				<div class="form-group row mb-2">
					<label for="dateOfBirth" class="col-sm-2 col-form-label">Date of birth <span style="color: red;">*</span></label>
					<div class="col-sm-6">
						<input type="date" class="form-control" name=dateOfBirth id="dateOfBirth" value="' . $row['date_of_birth'] . '" placeholder="Select date" required>
					</div>
				</div>
				<div class="form-group row mb-2">
					<label for="country" class="col-sm-2 col-form-label">Country <span style="color: red;">*</span></label>
					<div class="form-group col-sm-6">
						<select name=country id="country" class="form-control">
							<option value="">Choose...</option>';
							$countryQuery  = "SELECT * FROM country";
							$countryResult = @mysqli_query($db, $countryQuery);
							while($countryRow = @mysqli_fetch_array($countryResult)) {
								print '<option value="' . $countryRow['country_code'] . '"';
								if ($row['country'] == $countryRow['country_code']) { print ' selected'; }
								print '>' . $countryRow['country_name'] . '</option>';
							}
							print '
							</select>
					</div>
				</div>
				<div class="form-group row mb-2">
					<label for="city" class="col-sm-2 col-form-label">City <span style="color: red;">*</span></label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name=city id="city" value="' . $row['city'] . '" placeholder="City" required>
					</div>
				</div>
				<div class="form-group row mb-2">
					<label for="street" class="col-sm-2 col-form-label">Street <span style="color: red;">*</span></label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name=street id="street" value="' . $row['street'] . '" placeholder="Street" required>
					</div>
				</div>
				<div class="form-group row mb-2">
					<label for="email" class="col-sm-2 col-form-label">Email <span style="color: red;">*</span></label>
					<div class="col-sm-6">
						<input type="email" class="form-control" name=email id="email" value="' . $row['email'] . '" placeholder="Email" required>
					</div>
				</div>
				<div class="form-group row mb-2">
					<label for="username" class="col-sm-2 col-form-label">Username <span style="color: red;">*</span></label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name=username id="username" value="' . $row['username'] . '" placeholder="Username" required>
					</div>
				</div>
				<div class="form-group row mb-2">
					<label for="role" class="col-sm-2 col-form-label">Role <span style="color: red;">*</span></label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name=role id="role" value="' . $row['role'] . '" placeholder="Username" required>
					</div>
				</div>
				<div class="form-group row mb-2">
					<label for="archive" class="col-sm-2 col-form-label">Archive <span style="color: red;">*</span></label>
					<div class="col-sm-1 form-check form-check-inline" style="padding-left: 2.5rem !important">
						<input class="form-check-input" type="radio" name="archive" id="archive" value="Y"'; if($row['archive'] == 'Y') { echo ' checked="checked"'; $checked_archive = true; } print'>
						<label class="form-check-label" for="archive">
							YES
						</label>
					</div>
					<div class="col-sm-1 form-check form-check-inline" style="padding-left: 2.5rem !important">	
						<input class="form-check-input" type="radio" name="archive" id="archive" value="N"'; if($checked_archive == false) { echo ' checked="checked"'; $checked_archive = true; } print'>
						<label class="form-check-label" for="archive">
							NO
						</label>
					</div>
				</div>	
				<div class="form-group row mb-2">
					<div class="col-sm-6">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</div>
			</form>
			<br>
			<p><a href="index.php?menu='.$menu.'&amp;action='.$action.'">Back</a></p>
		</div>';
	}
	else {
		print '
		<div class="container mb-4" style="margin-top:-3rem">
		<h2>List of users</h2>
		<div class="table-responsive">
			<table class="table table-hover table-dark">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">First name</th>
						<th scope="col">Last name</th>
						<th scope="col">Date of birth</th>
						<th scope="col">Country</th>
						<th scope="col">City</th>
						<th scope="col">Street</th>
						<th scope="col">Email</th>
						<th scope="col">Username</th>
						<th scope="col">Role</th>
						<th scope="col">Archive</th>
						<th scope="col" colspan=3>Action</th>
					</tr>
				</thead>
				<tbody>';
					$query  = "SELECT * FROM user";
					$result = @mysqli_query($db, $query);
					while($row = @mysqli_fetch_array($result)) {
						print '
						<tr>
							<td>' . $row['id'] . '</td>
							<td>' . $row['first_name'] . '</td>
							<td>' . $row['last_name'] . '</td>
							<td>' . $row['date_of_birth'] . '</td>
							<td>';
								$countryQuery  = "SELECT * FROM country";
								$countryQuery .= " WHERE country_code='" . $row['country'] . "'";
								$countryResult = @mysqli_query($db, $countryQuery);
								$countryRow = @mysqli_fetch_array($countryResult, MYSQLI_ASSOC);
								print $countryRow['country_name'] . '
							</td>
							<td>' . $row['city'] . '</td>
							<td>' . $row['street'] . '</td>
							<td>' . $row['email'] . '</td>
							<td>' . $row['username'] . '</td>
							<td>' . $row['role'] . '</td>
							<td>';
								if ($row['archive'] == 'Y') { print 'Active'; }
								else if ($row['archive'] == 'N') { print 'Inactive'; }
							print '
							</td>
							<td>
								<a href="index.php?menu='.$menu.'&amp;action='.$action.'&amp;id=' .$row['id']. '"/><i class="fa fa-eye"/>
							</td>
							<td>
								<a style="color:green;" href="index.php?menu='.$menu.'&amp;action='.$action.'&amp;edit=' .$row['id']. '"/><i class="fa fa-pencil"/>
							</td>
							<td>
								<a style="color:red;" href="index.php?menu='.$menu.'&amp;action='.$action.'&amp;delete=' .$row['id']. '"/><i class="fa fa-trash"/>
							</td>
						</tr>';
					}
				print '
				</tbody>
			</table>
		</div>
		</div>';		
	}
	
	@mysqli_close($db);
?>