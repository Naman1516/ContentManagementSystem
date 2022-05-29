<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .flex-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .flex-container>div {
            margin: 10px;
            padding: 20px;
        }

        .head-color {
            background-color: #5FCF80;
        }
    </style>
</head>

<body>
    <header id="header" class="fixed-top">
        <nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color: #0C0C0C">
            <a href="home.php" class="navbar-brand font-weight-bold">Craft-Ed.org</a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#mynav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynav">
                <ul class="navbar-nav ml-auto font-weight-bold">
                    <li class="nav-item">
                        <a href="" class="nav-link font-weight-bold text-light">Welcome <?= $_SESSION['name'] ?> !</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">
                            <img class="rounded" style="width: 30px;" src="./assets/img/guest-default.png">
                        </a>
                    </li>
                    <?php if ($_SESSION['name']) { ?>
                        <li class="nav-item"><a class="nav-link text-danger" href="logic-php/logout.php">Logout</a></li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
    </header>
</body>

</html>