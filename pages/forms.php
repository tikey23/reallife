<div class='flex justify-center'>
    <?php

        //Gallery Add Category
        if(@$_GET['page'] == 'gallery' && isset($_SESSION['admin'])){
            echo $twig->render('gallery/addCategoryForm.twig');
        }

        //Become Member Form
        if(@$_GET['page'] == 'becomeMember'){
            echo $twig->render('member/becomeMemberForm.twig');
        }

        //New Member Form
        if(@$_GET['page'] == 'memberlist' && isset($_SESSION['admin'])){
            echo $twig->render('member/newMemberForm.twig');
        }
    ?>
</div>