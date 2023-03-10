<!-- <form action="demo2.php" method='post'>
    <input name='pwd' size='20' placeholder='Password'>
    <button>Senden</button>
</form>
 -->
 <!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Real Life Café</title>
	<link rel="stylesheet" href="/css/format.css">
	<link rel="stylesheet" href="/css/output.css">
	<link rel="icon" type="image/png" href="/img/faviconRL.png">
	<script type="text/javascript" src="/js/navigation.js"></script>
	<script src="/node_modules/tw-elements/dist/js/index.min.js"></script>

</head>
<body id="idBody" class='text-lg bg-fixed bg-zinc-200'>
<form action='demo3.php' method='post'>
    <h1 class='font-bold underline mb-5 text-center'>Mitarbeiter Login</h1>
    <div class='flex justify-center'>
        <div class="form-floating mb-3 xl:w-80">
            <input type='password' name='pwd' class="
            form-control
            block
            w-full
            px-3
            py-1.5
            text-base
            font-normal
            text-gray-700
            bg-white bg-clip-padding
            border border-solid border-gray-300
            rounded
            transition
            ease-in-out
            m-0
            focus:text-gray-700 focus:bg-white focus:border-black focus:outline-none"
            placeholder="Kennwort"
            required="required"
            id="inputUserPassword">
            <label for="inputUserPassword" class="text-gray-700">Kennwort</label>
        </div><br>
    </div>

    <div class='flex justify-center'><button class='hover:opacity-40'><img src='img/icons/login.png' class='w-10 h-10 inline' title='Anmelden'></button></div>
</form>
</div>
</body>
</html>