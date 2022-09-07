
<div class="galerie">

    <?php
        echo "<form action='/index.php?page=galeriebilder' method='post'>";
        require_once('functions/galleryfunctions.php');
        // $con = new mysqli("", "root", "", "reallife");

        showGallery();
        addGallerycategoryicon();

        echo "</form>";
        adminGallery();

    ?>

</div>

