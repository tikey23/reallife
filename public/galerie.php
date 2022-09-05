<style>
    .galerie {
        display: flex;
    }

    .galerie button:hover {
        transform: scale(1.1);
        background-color: #ddd6fe; /* bg-violet-200 */
    }


</style>
<div class="galerie">
<form action="/index.php?page=galeriebilder" method='post'>
    <?php
        $con = new mysqli("", "root", "", "reallife");
        $sql ="SELECT * FROM gallery GROUP BY thema ORDER BY id";
        $res = $con->query($sql);
        while($data = $res->fetch_assoc())
        {
            echo "<button name='folder' value='" . $data['folder'] . "'>";
		echo "<div id='" . $data['folder'] . " class='text-xl' style='width: 220px; height: 300px; padding: 10px; margin: 10px; border-radius: 20px; background-color: #8b5cf6; /* bg-viloet-500 */; border: 1px solid black'>";
		echo "<img src='/img/galerie/". $data['folder'] . "/titel.jpg' style='height: 200px; width: 100%; object-fit: cover; object-position: top center; border-radius: 10px;'></img><br>";
		echo "<p>" . $data['thema'] . "</p></div></button>";

        }
        
    ?>
</form>
</div>

<!-- <form action="/galeriebilder.php" method='post'> -->

<!--
<form action="/index.php?page=galeriebilder" method='post'>

	<button name='thema' value='unterwasser'>
		<div class="text-xl" style="width: 220px; height: 300px; padding: 10px; margin: 10px; border-radius: 20px; background-color: #8b5cf6; /* bg-viloet-500 */; border: 1px solid black">
			<img src="/img/galerie/unterwasser_abend/3.jpg" style="height: 200px; width: 100%; object-fit: cover; object-position: top center; border-radius: 10px;"></img>
			<br>
			<p>Unterwasser Abend</p>

		</div>
	</button>

</form>

-->
