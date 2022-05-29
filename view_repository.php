<?php
session_start();
include 'db_conn.php';
include 'logic-php/set_role.php';
include 'index_footer.php';

if ($_SESSION['role'] == 'creator') {
    include "other_header.php";
    $repo = $_GET['repo_id'];
    $sql = "SELECT repository_video.repo_video from repository_video where repo_id = $repo";
    $query = mysqli_query($conn, $sql);
    $name = "SELECT repo_name from repository_details where repo_id = $repo";
    $repo_name = mysqli_fetch_array(mysqli_query($conn, $name));
    $isEmptyVideo = true; ?>

    <div class="mt-5 pt-2">

    </div>
    <div class="head-color">
        <h2 class="text-center p-5 text-light font-weight-bolder text-capitalize"><?php echo $repo_name['repo_name'] ?></h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb font-weight-bold">
                <li class="breadcrumb-item"><a class="text-dark" href="home.php">Repositories</a></li>
                <li class="breadcrumb-item text-capitalize breadcrumb-active"><a class="text-dark" href=""><?php echo ($repo_name['repo_name']) ?></a></li>
                <?php
                if ($_SESSION['role'] == 'creator') { ?>
                    <li class="breadcrumb-item">
                        <div class="dropdown">
                            <button class="btn btn-sm btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Upload
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="insert_video.php?repo_id=<?php echo $repo; ?>">Video</a>
                                <a class="dropdown-item" href="insert_pdf.php?repo_id=<?php echo $repo; ?>">Pdf</a>
                            </div>
                        </div>
                    </li>
                <?php } ?>
            </ol>
        </nav>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="d-flex d-inline-block">
                    <p class="h3 font-weight-bolder m-auto">Video</p>
                </div>
                <!-- Display Video -->

                <div class="d-flex justify-content-center m-5">
                    <?php if (mysqli_num_rows($res) > 0) { ?>
                        <div class="flex-container">

                            <?php while ($info = mysqli_fetch_array($query)) {
                                $isEmptyVideo = false;
                            ?>

                                <div class="rounded">
                                    <div class="d-flex d-inline-block">
                                        <a href="view_video.php?repo_video=<?php echo $info["repo_video"]; ?>"><img src="./assets/img/video-icon.png" alt="folder-icon" width="80px"></a>
                                        <div class="dropdown pl-1">
                                            <button class="btn btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                                    <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                                                </svg>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item text-danger" href="delete_video.php?repo_video=<?php echo $info["repo_video"] ?>&repo_id=<?php echo $repo; ?>">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                    <span><a class="font-weight-bolder text-capitalize text-dark pt-2" href="view_video.php?repo_video=<?php echo $info["repo_video"]; ?>" style="width:140px; display: block;">
                                    <?php echo $info["repo_video"]; ?></a></span>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>

                <!-- Checking for empty video -->

                <?php
                if ($isEmptyVideo) { ?>
                        <div class="text-center">
                        <p class="font-weight-bold m-5 h5 text-center text-danger">Empty!</p>

                        </div>
                <?php }?>

                <!-- Video Completed -->

            </div>
            <div class="col-lg-6">
                <!-- Pdf Start -->
                <div class="d-flex d-inline-block">
                    <p class="h3 font-weight-bolder m-auto">PDF</p>
                </div>

                <?php
                $isEmptyPdf = true;
                $sql = "SELECT repository_content.repo_doc from repository_content where repo_id = $repo";
                $query = mysqli_query($conn, $sql);
                ?>

                <!-- Display PDF -->

                <div class="d-flex justify-content-center m-5">
                    <?php if (mysqli_num_rows($res) > 0) { ?>
                        <div class="flex-container">

                            <?php while ($info = mysqli_fetch_array($query)) {
                                $isEmptyPdf = false;
                            ?>

                                <div class="rounded">
                                    <div class="d-flex d-inline-block">
                                        <a href="view_pdf.php?repo_doc=<?php echo $info["repo_doc"]; ?>"><img src="./assets/img/file-icon.png" alt="file-icon" width="80px"></a>
                                        <div class="dropdown pl-1">
                                            <button class="btn btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                                    <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                                                </svg>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item text-danger" href="delete_file.php?repo_doc=<?php echo $info["repo_doc"]; ?>&repo_id=<?php echo $repo; ?>">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                    <a class="font-weight-bolder text-capitalize text-dark pt-2" href="view_pdf.php?repo_doc=<?php echo $info["repo_doc"]; ?>" style="width:140px; display: block;"><?php echo $info["repo_doc"]; ?></a>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>

                <!-- Checking for empty pdf -->

                <?php
                if ($isEmptyPdf) { ?>
                        <div class="text-center">
                        <p class="font-weight-bold m-5 h5 text-center text-danger">Empty!</p>
                        </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } else {
    include "guest_header.php";
    $repo = $_GET['repo_id'];
    $sql = "SELECT repository_video.repo_video from repository_video where repo_id = $repo";
    $query = mysqli_query($conn, $sql);
    $name = "SELECT repo_name from repository_details where repo_id = $repo";
    $repo_name = mysqli_fetch_array(mysqli_query($conn, $name));
    $isEmptyVideo = true; ?>

    <div class="mt-5 pt-2">

    </div>
    <div class="head-color">
        <h2 class="text-center p-5 text-light font-weight-bolder text-capitalize"><?php echo $repo_name['repo_name'] ?></h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb font-weight-bold">
                <li class="breadcrumb-item"><a class="text-dark" href="home.php">Repositories</a></li>
                <li class="breadcrumb-item text-capitalize breadcrumb-active"><a class="text-dark" href=""><?php echo ($repo_name['repo_name']) ?></a></li>
            </ol>
        </nav>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">

                <p class="h3 font-weight-bolder text-center">Video</p>
                <!-- Display Video -->

                <div class="d-flex justify-content-center m-5">
                    <?php if (mysqli_num_rows($res) > 0) { ?>
                        <div class="flex-container">

                            <?php while ($info = mysqli_fetch_array($query)) {
                                $isEmptyVideo = false;
                            ?>

                                <div class="border rounded">
                                    <div class="d-flex d-inline-block">
                                        <a href="view_video.php?repo_video=<?php echo $info["repo_video"]; ?>"><img src="./assets/img/video-icon.png" alt="folder-icon" width="80px"></a>
                                    </div>
                                    <span><a class="font-weight-bolder text-capitalize text-dark pt-2" href="view_video.php?repo_video=<?php echo $info["repo_video"]; ?>" style="width:140px; display: block;"><?php echo $info["repo_video"]; ?></a></span>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>

                <!-- Checking for empty video -->

                <?php
                if ($isEmptyVideo) { ?>
                        <p text-center class="font-weight-bold m-5 h5 text-center text-danger">Empty!</p>
                <?php } ?>

                <!-- Video Completed -->

            </div>
            <div class="col-lg-6">
                <!-- Pdf Start -->
                <p class="h3 font-weight-bolder text-center">PDF</p>

                <?php
                $isEmptyPdf = true;
                $sql = "SELECT repository_content.repo_doc from repository_content where repo_id = $repo";
                $query = mysqli_query($conn, $sql);
                ?>

                <!-- Display PDF -->

                <div class="d-flex justify-content-center m-5">
                    <?php if (mysqli_num_rows($res) > 0) { ?>
                        <div class="flex-container">

                            <?php while ($info = mysqli_fetch_array($query)) {
                                $isEmptyPdf = false;
                            ?>

                                <div class="border rounded">
                                    <div class="d-flex d-inline-block">
                                        <a href="view_pdf.php?repo_doc=<?php echo $info["repo_doc"]; ?>"><img src="./assets/img/file-icon.png" alt="file-icon" width="80px"></a>
                                    </div>
                                    <a class="font-weight-bolder text-capitalize text-dark pt-2" href="view_pdf.php?repo_doc=<?php echo $info["repo_doc"]; ?>" style="width:140px; display: block;"><?php echo $info["repo_doc"]; ?></a>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>

                <!-- Checking for empty video -->

                <?php
                if ($isEmptyPdf) { ?>
                        <p text-center class="font-weight-bold m-5 h5 text-center text-danger">Empty!</p>
                <?php } ?>

            </div>
        </div>
    </div>
<?php } ?>