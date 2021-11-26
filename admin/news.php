<?php

	include("modal.php");

	$db = $GLOBALS['db'];
	$menu = $_GET['menu'];

	#Add news
	if (isset($_POST['_action_']) && $_POST['_action_'] == 'add_news') {
		$approved = 'Y';
		if ($_SESSION['user']['role'] === 'user') {
			$approved = 'N';
		}

		$query  = "INSERT INTO news (title, description, date, archive, approved)";
		$query .= " VALUES ('" . htmlspecialchars($_POST['title'], ENT_QUOTES) . "', '" . htmlspecialchars($_POST['description'], ENT_QUOTES) . "', '" . $_POST['date'] . "', '" . $_POST['archive'] . "', '" . $approved . "')";
		$result = @mysqli_query($db, $query);
		
		$ID = mysqli_insert_id($db);

		# add pictures
		$numberOfPictures = count($_FILES['picture']['name']);

		for ($i = 0; $i < $numberOfPictures; $i++) {
			$ext = strtolower(strrchr($_FILES['picture']['name'][$i], "."));
            $_picture = $ID . '-' . rand(1,100) . $ext;
			copy($_FILES['picture']['tmp_name'][$i], "img/".$_picture);	
			if ($ext == '.jpg' || $ext == '.png' || $ext == '.jpeg' || $ext == '.gif') {
				$query = "INSERT INTO image (title, description, name, news_id)";
				$query .= " VALUES ('" . $_POST['imgTitle'] . "', '" . $_POST['imgDescription'] . "', '" . $_picture . "', '" . $ID . "')";
				$result = @mysqli_query($db, $query);
			}
		}

		# show message and redirect
		createModal('News', 'You successfully added news!');
        showModal();
		header("refresh:2; url=index.php?menu=8&action=2");
	}
	
	# Update news
	if (isset($_POST['_action_']) && $_POST['_action_'] == 'edit_news') {
		if (isset($_POST['approved'])) {
			$approved = $_POST['approved'];
		} else {
			$approved = 'N';
		}

		$query  = "UPDATE news SET title='" . htmlspecialchars($_POST['title'], ENT_QUOTES) . "', description='" . htmlspecialchars($_POST['description'], ENT_QUOTES) . "', archive='" . $_POST['archive'] . "'" . "', approved='" . $approved . "'";
        $query .= " WHERE id=" . (int)$_POST['edit'];
        $query .= " LIMIT 1";
        $result = @mysqli_query($db, $query);
		
		# picture
        if($_FILES['picture']['error'] == UPLOAD_ERR_OK && $_FILES['picture']['name'] != "") {
			$ext = strtolower(strrchr($_FILES['picture']['name'], "."));
            
			$_picture = (int)$_POST['edit'] . '-' . rand(1,100) . $ext;
			copy($_FILES['picture']['tmp_name'], "img/".$_picture);
			
			if ($ext == '.jpg' || $ext == '.png' || $ext == '.jpeg' || $ext == '.gif') { 
				$query = "INSERT INTO image (title, description, name, news_id)";
				$query .= " VALUES ('" . $_POST['imgTitle'] . "', '" . $_POST['imgDescription'] . "', '" . $_picture . "', '" . $ID . "')";
				$result = @mysqli_query($db, $query);
			}
        }

		# show message and redirect
		createModal('News', 'You successfully changed news!');
        showModal();
		header("refresh:2; url=index.php?menu=8&action=2");
	}
	# End update news
	
	# Delete news
	if (isset($_GET['delete']) && $_GET['delete'] != '') {
		
		# Delete picture
        $query  = "SELECT name FROM image";
        $query .= " WHERE id=".(int)$_GET['delete']." LIMIT 1";
        $result = @mysqli_query($db, $query);
        $row = @mysqli_fetch_array($result);
        @unlink("img/".$row['name']);
		
		$query  = "DELETE FROM image";
		$query .= " WHERE news_id=".(int)$_GET['delete'];
		$result = @mysqli_query($db, $query);
		
		# Delete news
		$query  = "DELETE FROM news";
		$query .= " WHERE id=".(int)$_GET['delete'];
		$query .= " LIMIT 1";
		$result = @mysqli_query($db, $query);

		# show message and redirect
		createModal('News', 'You successfully deleted news!');
        showModal();
		header("refresh:2; url=index.php?menu=8&action=2");
	}
	# End delete news
	
	
	#Show news info
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
		<div class="container news-details" style="margin-top:-3rem">
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
	}
	#Add news 
	else if (isset($_GET['add']) && $_GET['add'] != '') {
		print '
		<div class="container" style="margin-top:-3rem">
			<br>
			<h2>Add news</h2>
			<form action="" id="news_form" name="news_form" method="POST" enctype="multipart/form-data">
				<input type="hidden" id="_action_" name="_action_" value="add_news">

				<div class="form-group row mt-4 mb-2">
					<label for="title" class="col-sm-2 col-form-label">Title <span style="color: red;">*</span></label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name=title id="title" placeholder="Title" required>
					</div>
				</div>
				<div class="form-group row mb-2">
					<label for="description" class="col-sm-2 col-form-label">Description <span style="color: red;">*</span></label>
					<div class="col-sm-6">
						<textarea type="text" rows="5" class="form-control" name=description id="description" placeholder="Description"></textarea>
					</div>
				</div>
				<div class="form-group row mb-2">
					<label for="date" class="col-sm-2 col-form-label">Date <span style="color: red;">*</span></label>
					<div class="col-sm-6">
						<input type="date" class="form-control" name=date id="date" placeholder="Select date" required>
					</div>
				</div>
				<div class="form-group row mb-2">
					<label for="picture[]" class="col-sm-2 col-form-label">Picture <span style="color: red;">*</span></label>
					<div class="col-sm-6">
						<input type="file" multiple class="form-control" name="picture[]" id="picture" placeholder="Picture" required>
					</div>
				</div>
				<div class="form-group row mt-4 mb-2">
					<label for="imgTitle" class="col-sm-2 col-form-label">Picture title <span style="color: red;">*</span></label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name=imgTitle id="imgTitle" placeholder="Picture title" required>
					</div>
				</div>
				<div class="form-group row mb-2">
					<label for="imgDescription" class="col-sm-2 col-form-label">Picture description <span style="color: red;">*</span></label>
					<div class="col-sm-6">
						<textarea type="text" rows="3" class="form-control" name=imgDescription id="imgDescription" placeholder="Picture description"></textarea>
					</div>
				</div>
				<div class=form-group row mb-2">
					<label for="archive" class="col-sm-2 col-form-label">Archive <span style="color: red;">*</span></label>
					<div class="col-sm-1 form-check form-check-inline" style="padding-left: 2.5rem !important">
						<input class="form-check-input" type="radio" name="archive" id="archive" value="Y">
						<label class="form-check-label" for="archive">
							YES
						</label>
					</div>
					<div class="col-sm-1 form-check form-check-inline" style="padding-left: 2.5rem !important">	
						<input class="form-check-input" type="radio" name="archive" id="archive" value="N" checked>
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
	#Edit news
	else if (isset($_GET['edit']) && $_GET['edit'] != '') {
		$query  = "SELECT * FROM news";
		$query .= " WHERE id=".$_GET['edit'];
		$result = @mysqli_query($db, $query);
		$row = @mysqli_fetch_array($result);
		$checked_archive = false;
		$checked_approved = false;

		$imgQuery  = "SELECT * FROM image";
		$imgQuery .= " WHERE news_id=".$_GET['edit'];
		$imgResult = @mysqli_query($db, $imgQuery);
		$imgRow = @mysqli_fetch_array($imgResult);

		print '
		<div class="container" style="margin-top:-3rem">
			<br>
			<h2>Edit news</h2>
			<form action="" id="news_form_edit" name="news_form_edit" method="POST" enctype="multipart/form-data">
				<input type="hidden" id="_action_" name="_action_" value="edit_news">
				<input type="hidden" id="edit" name="edit" value="' . $row['id'] . '">

				<div class="form-group row mt-4 mb-2">
					<label for="title" class="col-sm-2 col-form-label">Title <span style="color: red;">*</span></label>
					<div class="col-sm-6">
						<input type="text" class="form-control" value="' . $row['title'] . '" name=title id="title" placeholder="Title" required>
					</div>
				</div>
				<div class="form-group row mb-2">
					<label for="description" class="col-sm-2 col-form-label">Description <span style="color: red;">*</span></label>
					<div class="col-sm-6">
						<textarea type="text" rows="5" class="form-control" name=description id="description" placeholder="Description">' . $imgRow['description'] . '</textarea>
					</div>
				</div>
				<div class="form-group row mb-2">
					<label for="picture[]" class="col-sm-2 col-form-label">Picture <span style="color: red;">*</span></label>
					<div class="col-sm-6">
						<input type="file" multiple class="form-control" name=picture id="picture[]" placeholder="Picture" required>
					</div>
				</div>
				<div class="form-group row mt-4 mb-2">
					<label for="imgTitle" class="col-sm-2 col-form-label">Picture title <span style="color: red;">*</span></label>
					<div class="col-sm-6">
						<input type="text" class="form-control" value="' . $imgRow['title'] . '" name=imgTitle id="imgTitle" placeholder="Picture title" required>
					</div>
				</div>
				<div class="form-group row mb-2">
					<label for="imgDescription" class="col-sm-2 col-form-label">Picture description <span style="color: red;">*</span></label>
					<div class="col-sm-6">
						<textarea type="text" rows="3" class="form-control" name=imgDescription id="imgDescription" placeholder="Picture description">' . $imgRow['description'] . '</textarea>
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
				</div>';
				if ($_SESSION['user']['role'] === 'administrator') {
					print '
						<div class=form-group row mb-2">
							<label for="approved" class="col-sm-2 col-form-label">Approved <span style="color: red;">*</span></label>
							<div class="col-sm-1 form-check form-check-inline" style="padding-left: 1.7rem !important">
								<input class="form-check-input" type="radio" name="approved" id="approved" value="Y"'; if($row['approved'] == 'Y') { echo ' checked="checked"'; $checked_approved = true; } print'>
								<label class="form-check-label" for="approved">
									YES
								</label>
							</div>
							<div class="col-sm-1 form-check form-check-inline" style="padding-left: 1.7rem !important">	
								<input class="form-check-input" type="radio" name="approved" id="approved" value="N"'; if($checked_approved == false) { echo ' checked="checked"'; $checked_approved = true; } print'>
								<label class="form-check-label" for="approved">
									NO
								</label>
							</div>
						</div>
					';
				}
				print '
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
		<div class="container news" style="margin-top:-3rem">
			<div class="row">
                <h1>News</h1>
            </div>
			<a href="index.php?menu=' . $menu . '&amp;action=' . $action . '&amp;add=true" class="AddLink"><i class="fa fa-plus-square" style="margin-right:0.5rem"></i>Add news</a>
			<br><br>
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
						<hr>';
						if ($_SESSION['user']['role'] === 'administrator' || $_SESSION['user']['role'] === 'editor') {
							print '<a style="margin-left:2rem; color:green;" href="index.php?menu='.$menu.'&amp;action='.$action.'&amp;edit=' .$row['id']. '"><i class="fa fa-pencil fa-lg"></i></a>';
						}
						if ($_SESSION['user']['role'] === 'administrator') {
							print '<a style="margin-left:2rem; color:red;" href="index.php?menu='.$menu.'&amp;action='.$action.'&amp;delete=' .$row['id']. '"><i class="fa fa-trash fa-lg"></i></a>';
						}
					print '
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