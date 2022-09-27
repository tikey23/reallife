<div class="pictures">
    <?php
        require_once('functions/galleryfunctions.php');

        use \Rl\Models\Picture;
        use \Rl\Models\Gallerycategory;

        //Create New Category
        if(isset($_POST['newCategory'])) {

            global $con;
            $categoryTitle = $con->real_escape_string($_POST['newCategory']);
            $gallerycategoryId = newCategory($categoryTitle); 

        } else if(isset($_POST['picUpload'])){
            $gallerycategoryId = $_POST['picUpload'];

        } else {
            $gallerycategoryId = $_POST['gallerycategoryId'];
        }

        // Upload new pic
        $gallerycategorys = findOne(Gallerycategory::class, $gallerycategoryId);
        if(isset($_POST['picUpload'])){
            $categoryName = $gallerycategorys->categoryName;
            $uploadedFile = $_FILES['fileToUpload']['name'];
            $tempFile = $_FILES['fileToUpload']['tmp_name'];
            uploadpic($categoryName, $gallerycategoryId, $uploadedFile, $tempFile);
        }

        // Show pics
        $gallerycategorys = findOne(Gallerycategory::class, $gallerycategoryId);
        $pictures = findAllByColumn(Picture::class, "categoryId", $gallerycategoryId);
        echo $twig->render('gallery/showPics.twig',[
            "isAdmin" => $_SESSION['password'],
            "gallerycategorys" => $gallerycategorys,
            "pictures" => $pictures
        ]);


      

    
        

/*
        $folder = $_SESSION['gallerycategoryId'];
        global $con;

        newcategory($folder);

        echo "<h1 class='text-3xl font-bold underline'>$folder</h1>";

        if(isset($_SESSION['password'])) {
			echo $twig->render("gallery/addpic.twig");
			uploadpic($folder);
        }

        showpics($folder);



    /*
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
        */
    ?>
</div>
