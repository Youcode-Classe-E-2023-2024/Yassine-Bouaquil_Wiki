<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <title>Document</title>
</head>
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
        <?php } else { ?>
            <li class="px-2 md:px-4 hidden md:block">
                <a href="login_view.php" class="text-gray-500 font-semibold hover:text-blue-600"> Login </a>
            </li>
            <li class="px-2 md:px-4 hidden md:block">
                <a href="register_view.php" class="text-gray-500 font-semibold hover:text-blue-600">
                    Register </a>
            </li>

        <?php } ?>
    </ul>

    </header>
</body>
</html>