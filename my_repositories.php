<?php
include "db_conn.php";
$output = "";
if (isset($_SESSION['username']) && isset($_SESSION['id'])) { ?>
	<!DOCTYPE html>
	<html>

	<head>
		<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.0/css/jquery.dataTables.css">
		<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.0/css/jquery.dataTables_themeroller.css">
		<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.7.1.min.js"></script>
		<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.0/jquery.dataTables.min.js"></script>
		<script>
			$(document).ready(function() {
				$('#myTable').DataTable();
			});
		</script>
	</head>

    <body>
		<div >
			<?php if ($_SESSION['role'] == 'creator') { ?>
				<!-- For Creator -->
				<?php
				include "other_header.php";
				include "logic-php/set_role.php";
				?>
				<div class="mt-5 pt-2">

				</div>
				<div class="head-color">
					<h2 class="text-center p-5 text-light font-weight-bolder">My Repositories</h2>
				</div>
				
				<div class="d-flex justify-content-center m-5 pt-5" id="myList">
					<?php include 'logic-php/fetch_repo.php';
					if (mysqli_num_rows($res) > 0) { ?>
						<div class="flex-container">
							<?php while ($rows = mysqli_fetch_assoc($res)) { ?>
								<div class="border rounded">
									<div class="d-flex d-inline-block">
										<a href="view_repository.php?repo_id=<?php echo $rows["repo_id"]; ?>"><img src="./assets/img/folder-icon.png" alt="folder-icon" width="80px"></a>
										<div class="dropdown pl-1">
											<button class="btn btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
													<path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
												</svg>
											</button>
											<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
												<a class="dropdown-item text-danger" href="delete_repository.php?repo_id=<?php echo $rows["repo_id"]; ?>">Delete</a>
											</div>
										</div>
									</div>
									<a class="font-weight-bolder text-capitalize text-dark" href="view_repository.php?repo_id=<?php echo $rows["repo_id"]; ?>"><span><?= $rows['repo_name'] ?></span></a>
								</div>
							<?php } ?>
						</div>
					<?php } ?>
				</div>
			<?php
				include "index_footer.php";
			} else {
				include "guest_header.php"; ?>
				<!-- FOR Guests -->
				<div class="mt-5 pt-2">

				</div>
				<div class="head-color">
					<h2 class="text-center p-5 text-light font-weight-bolder">Repositories</h2>
				</div>

				<div class="d-flex justify-content-center m-5 pt-5">
					<?php include 'logic-php/fetch_repo_guest.php';
					if (mysqli_num_rows($res) > 0) { ?>
						<div class="flex-container">
							<?php while ($rows = mysqli_fetch_assoc($res)) { ?>
								<div class="border rounded">
									<div class="d-flex d-inline-block">
										<a href="view_repository.php?repo_id=<?php echo $rows["repo_id"]; ?>"><img src="./assets/img/folder-icon.png" alt="folder-icon" width="80px"></a>
									</div>
									<a class="font-weight-bolder text-capitalize text-dark" href="view_repository.php?repo_id=<?php echo $rows["repo_id"]; ?>"><span><?= $rows['repo_name'] ?></span></a>
								</div>
							<?php } ?>
						</div>
				<?php }
					include "index_footer.php";
				} ?>
				</div>
	</body>

	</html>
<?php } else {
	header("Location: index.php");
} ?>