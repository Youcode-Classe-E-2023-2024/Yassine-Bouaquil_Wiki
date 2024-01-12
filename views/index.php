<?php
       require_once '../models/dashboard_model.php';
       require_once '../includes/dbh.inc.php';
       require_once '../includes/config_session.inc.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <title>Document</title>
</head>

<?php ?>

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
                    <a href="register_view.php" class="text-gray-500 font-semibold hover:text-blue-600"> Login </a>
                </li>
                <li class="px-2 md:px-4 hidden md:block">
                    <a href="register_view.php" class="text-gray-500 font-semibold hover:text-blue-600">
                        Register </a>
                </li>




            <?php } ?>
        </ul>

    </header>

    <!-- Header Section with Background Image -->
    <header class="relative h-screen flex flex-col justify-center items-center bg-cover bg-center" style="background-image: url('../asset/img/Wiki-video.jpg');">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="container mx-auto text-center relative z-10">
            <h1 class="text-5xl font-bold mb-4 text-white">Explorez le Monde des Articles Innovants</h1>
            <p class="text-lg text-gray-300 mb-8">Découvrez des articles passionnants sur divers sujets.</p>
            <a href="#articles" class="bg-white text-indigo-800 px-6 py-3 rounded-full font-semibold transition duration-300 hover:bg-indigo-600 hover:text-white">Découvrir</a>
        </div>
    </header>

    <!-- Articles Section -->
    <section id="articles" class="py-12">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold mb-8 text-center">Derniers Articles</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Article Card 1 -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-bold mb-4">Titre de l'article 1</h3>
                    <p class="text-gray-600 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam non urna ut velit sollicitudin ullamcorper.</p>
                    <a href="#" class="text-indigo-600 hover:underline">Lire l'article</a>
                </div>

                <!-- Article Card 2 -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-bold mb-4">Titre de l'article 2</h3>
                    <p class="text-gray-600 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam non urna ut velit sollicitudin ullamcorper.</p>
                    <a href="#" class="text-indigo-600 hover:underline">Lire l'article</a>
                </div>

                <!-- Article Card 3 -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-bold mb-4">Titre de l'article 3</h3>
                    <p class="text-gray-600 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam non urna ut velit sollicitudin ullamcorper.</p>
                    <a href="#" class="text-indigo-600 hover:underline">Lire l'article</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="bg-gray-200 py-12">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold mb-8 text-center">Nous Contacter</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Contact Form -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-bold mb-4">Formulaire de Contact</h3>
                    <form action="#" method="post">
                        <!-- Ajoutez les champs du formulaire nécessaires ici -->
                        <div class="mb-4">
                            <label for="name" class="block text-gray-600">Nom</label>
                            <input type="text" id="name" name="name" class="w-full px-4 py-2 border rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-gray-600">E-mail</label>
                            <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="message" class="block text-gray-600">Message</label>
                            <textarea id="message" name="message" rows="4" class="w-full px-4 py-2 border rounded-md"></textarea>
                        </div>
                        <button type="submit" class="bg-indigo-600 text-white px-6 py-3 rounded-full font-semibold hover:bg-indigo-700 transition duration-300">Envoyer</button>
                    </form>
                </div>

                <!-- Contact Information -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-bold mb-4">Coordonnées</h3>
                    <p class="mb-4"><strong>Adresse:</strong> YOUCODE-SAFI</p>
                    <p class="mb-4"><strong>Téléphone:</strong> +1 234 567 890</p>
                    <p><strong>E-mail:</strong> wiki@contact.com</p>
                </div>
            </div>
        </div>
    </section>


    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-4">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 WIKI. Tous droits réservés.</p>
        </div>
    </footer>
</body>

</html>