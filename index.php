<?php
$title = "Accueil"; // title for current page
include("partials/header.php");

?>
<!-- main content -->
<div class="pt-16 wrap__content">
    <div class="pt-16 wrap__content-head text-center">
        <!-- head -->
        <h1 class="text-blue-500 text-5xl font-black">App Game</h1>
    </div>
    <!-- table -->
    <div class="">
        <table class="table container">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Genre</th>
                    <th>Plateforme</th>
                    <th>Prix</th>
                    <th>Pegi</th>
                    <th>Voir</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>1</th>
                    <td>Mario</td>
                    <td>Aventure</td>
                    <td>Switch</td>
                    <td>3</td>
                    <td>12</td>
                    <td><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="magnifying-glass" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-5 icon"><path fill="currentColor" d="M500.3 443.7l-119.7-119.7c27.22-40.41 40.65-90.9 33.46-144.7C401.8 87.79 326.8 13.32 235.2 1.723C99.01-15.51-15.51 99.01 1.724 235.2c11.6 91.64 86.08 166.7 177.6 178.9c53.8 7.189 104.3-6.236 144.7-33.46l119.7 119.7c15.62 15.62 40.95 15.62 56.57 0C515.9 484.7 515.9 459.3 500.3 443.7zM79.1 208c0-70.58 57.42-128 128-128s128 57.42 128 128c0 70.58-57.42 128-128 128S79.1 278.6 79.1 208z" class=""></path></svg></td>
                </tr>
            </tbody>
        </table>
        
    </div>
</div>
<!-- footer -->
<?php
include("partials/footer.php");
?>