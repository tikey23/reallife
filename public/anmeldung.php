
<style>
    input
    {
        padding: 2px;
        margin: 2px;
        border-radius: 2px;
        border: 1px solid black;
    }
    input:hover
    {
        background-color: #c4b5fd; /* bg-violet-300 */
        padding: 2px;
    }
</style>

<form action='/index.php?page=admin' method='post'>
    <h2>Bitte Kennwort eingeben:</h2>
    <p><input type='password' name='kennwort'></p>
    <p><b><input type='submit' value='Anmelden'></b></p>
</form>