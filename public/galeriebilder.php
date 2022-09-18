<div class="galeriebilder">
    <?php
        require_once('functions/galleryfunctions.php');

        if(isset($_POST['folder'])) {
            $_SESSION['folder'] = $_POST['folder'];
            $folder = $_POST['folder'];
        }

        $folder = $_SESSION['folder'];
        global $con;

        newcategory($folder);

        echo "<h1 class='text-3xl font-bold underline'>$folder</h1>";

        if(isset($_SESSION['password'])) {
			echo $twig->render("gallery/addpic.twig");
			uploadpic($folder);
        }

        showpics($folder);
    ?>
</div>
