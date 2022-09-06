
<div class="galerie">
<form action='/index.php?page=galeriebilder' method='post'>
    <?php
        require_once('functions/galleryfunctions.php');
        // $con = new mysqli("", "root", "", "reallife");

        showGallery($con);
        addGallerycategoryicon($con);
       
    ?>

</div>

</form>


