<?php


require_once 'models\dashboard_model.php';
require_once 'includes\dbh.inc.php';

?>
<?php
require_once('includes/header.php');
if (!isset($_SESSION["user_id"])) {
    header("location: views/index.php");
}
?>

<!--
    colers : blue = #4A9DEC / white / black
    font : class taillwind "italic font-mono"
 -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-dfJvW1RlZj5FpxJ3z9+uL4P6blgM5ZPaUwT4uFR16n1UvA6HgPQ9CExlJEPi2Jmw" crossorigin="anonymous">
    <!--- Css File Link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Bootstrap CSS -->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

    <!-- Popper.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-dfJvW1RlZj5FpxJ3z9+uL4P6blgM5ZPaUwT4uFR16n1UvA6HgPQ9CExlJEPi2Jmw" crossorigin="anonymous">
    <style>
        .carded {
            padding: 40px;
            border-radius: 15px;
        }
    </style>
    <title>Your Title</title>


</head>

<div class="h-screen flex flex-wrap w-16 left-0 fixed bg-white top-12">
        <div class="h-full w-full">
            
            <div class="w-full flex-col items-center py-8 justify-between flex mb-auto h-3/5">
                <a href="home.html">

                </a>

                <a href="articles.php">
                    <img class="hover:bg-gray-200 hover:cursor-pointer w-full p-3" width="37" height="37" src="https://img.icons8.com/ios/37/news.png" alt="news" />
                </a>
                <a href="about.html">
                    <img class="hover:bg-gray-200 hover:cursor-pointer w-full p-3" width="37" height="37" src="https://img.icons8.com/ios/37/info--v1.png" alt="info--v1" />
                </a>
                <?php
               if (isset($_SESSION["role"]) && $_SESSION["role"] === "admin") {?>
                <a href="dashboard.php">
                    <img class="hover:bg-gray-200 hover:cursor-pointer w-full p-3" width="37" height="37" src="https://img.icons8.com/ios/37/settings--v1.png" alt="settings--v1" />
                </a>
                <?php } ?>
                <?php
                if (isset($_SESSION["user_id"])) { ?>
                    <form class="form-inline my-2 my-lg-0" action="includes\logout.inc.php" method="post">

                        <button><img class="hover:bg-gray-200 hover:cursor-pointer w-full p-3" width="35" height="35" src="https://img.icons8.com/ios/35/exit--v1.png" alt="exit--v1" /></button>
                    </form>
                <?php } ?>

            </div>
        </div>
    </div>


<body class="max-w-screen-lg mx-auto">
<header class="flex items-center justify-between py-2">
    <a href="index.php" class="px-2 lg:px-0 font-bold capitalize">
        WIKI
    </a>
    <ul class="hidden md:inline-flex items-center">
        <li class="px-2 md:px-4">
            <a href="index.php" class="text-red-800 font-semibold hover:text-blue-600"> Home </a>
        </li>
        <li class="px-2 md:px-4">
            <a href="#" class="text-gray-500 font-semibold hover:text-blue-600"> About </a>
        </li>
        <li class="px-2 md:px-4">
            <a href="#" class="text-gray-500 font-semibold hover:text-blue-600"> Press </a>
        </li>
        <li class="px-2 md:px-4">
            <a href="#" class="text-gray-500 font-semibold hover:text-blue-600"> Contact </a>
        </li>

        <li class="px-2 md:px-4">
            <a href="./views/index.php" class="text-red-500 font-semibold hover:text-blue-600"> LOGOUT </a>
        </li>
        <?php if (isset($_SESSION["login"])) {

            if (empty($_SESSION["admin"])) {
                ?>
                <li class="px-2 md:px-4 hidden md:block">
                    <a id="manage-wikis-btn" class="cursor-pointer text-gray-500 font-semibold hover:text-blue-600"> Manage My Wikis </a>
                </li>
            <?php } else { ?>
                <li class="px-2 md:px-4 hidden md:block">
                    <a id="manage-wikis-btn" class="cursor-pointer text-gray-500 font-semibold hover:text-blue-600"> Manage Wikis </a>
                </li>
            <?php } ?>      
            <li class="px-2 md:px-4 hidden md:block">
                <form action="index.php?page=home" method="post">
                    <button name="logout" class="text-gray-500 font-semibold hover:text-green-600"> Logout</button>
                </form>
            </li>
        <?php }  else { ?>
            


            


        <?php } ?>
    </ul>

    </header>




<div class="container mt-20">
    <div class="row">

        <div class="col-lg-4 mb-4 rounded">
            <div class="carded shadow-lg bg-success text-white p-3">
                <h5 class="card-title">Articles</h5>
                <p class="card-text">Total articles: <?php $artclsData =  get_articles_and_count($pdo);
                                                        $count = $artclsData['count'];
                                                        echo $count;
                                                        ?></p>
                <a href="articles.php" class="btn btn-danger"><i class="fas fa-eye"></i> View Articles</a>
            </div>
        </div>

        <div class="col-lg-4 mb-4 rounded">
            <div class="carded shadow-lg bg-warning text-dark p-3">
                <h5 class="card-title">Tags</h5>
                <p class="card-text">Total Tags: <?php $tagsData = get_tags_and_count($pdo);
                                                    $count = $tagsData['count'];
                                                    echo $count;
                                                    ?></p>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addTagModal"><i class="fas fa-plus"></i> Add Tag</button>
                <a href="tags.php" class="btn btn-danger"><i class="fas fa-eye"></i> View Tags</a>
            </div>
        </div>

        <div class="col-lg-4 mb-4 rounded">
            <div class="carded shadow-lg bg-danger text-white p-3">
                <h5 class="card-title">Categories</h5>
                <p class="card-text">Total categories: <?php $ctgrsData = get_categories_and_count($pdo);
                                                            $count = $ctgrsData['count'];
                                                            echo $count; ?></p>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addcategorieModal"><i class="fas fa-plus"></i> Add Category</button>
                <a href="categories.php" class="btn btn-warning"><i class="fas fa-eye"></i> View Categories</a>
            </div>
        </div>

    </div>
</div>

    <!-- Add Tag Modal -->
    <?php include_once 'add_modals.php'; ?>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>



</html>