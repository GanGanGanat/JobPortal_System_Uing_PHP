<?php include('header.php');
include('Connection.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ServiceWala.com</title>
    <link rel="stylesheet" href="./css//bootstrap.min.css">
    <script src="./js/bootstrap.bundle.js"></script>
</head>
<body>
    <main>
    <div class="container py-4">
        <header class="pb-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center text-body-emphasis text-decoration-none">
        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-newspaper mt-2" viewBox="0 0 16 16">
            <path d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5v-11zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5H12z"/>
            <path d="M2 3h10v2H2V3zm0 3h4v3H2V6zm0 4h4v1H2v-1zm0 2h4v1H2v-1zm5-6h2v1H7V6zm3 0h2v1h-2V6zM7 8h2v1H7V8zm3 0h2v1h-2V8zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1z"/>
        </svg>
            <span class="fs-4 mx-2 mt-1">Latest News</span>
        </a>
        </header>
    </div>
    </main>
    <div class="container">
        <?php
            $sql = "select * from news_master";
            $result = mysqli_query($conn,$sql) or die( mysqli_error($con));
            while($row = mysqli_fetch_array($result)){ ?>
            <div class="d-flex flex-row">
                <div class="card mt-2" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Date : <?php echo $row['NewsDate']; ?></h5>
                        <p class="card-text">New Update : <?php echo $row['News']; ?></p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>
            </div>
            <?php } ?>    
    </div>
</body>
</html>