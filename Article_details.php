<?php
require_once 'includes/config_session.inc.php';
require_once 'model/dashboard_model.php';
require_once 'includes/dbh.inc.php';

?>
<?php
require_once('includes/header.php');
if (!isset($_SESSION["user_id"])) {
    header("location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Article Display</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <!-- Custom style to override h2 size -->
    
</head>
<body>
<?php
    include_once 'includes/navbar.php';
    ?>


    <!-- sidebar -->
    <?php
    include_once 'includes/sidebar.php';
    $id = $_GET['id'];
    
    $Article = get_article_by_id($pdo, $id);


    ?>
     <div class="container mt-44">
        <div class="card">
            <img src="article_image.jpg" class="card-img-top" alt="Article Image">
            <div class="card-body">
                <h2 class="card-title"><?= $Article['title']; ?></h2>
                <p class="card-text"><?= $Article['content']; ?></p>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>