<?php
if (!isset($_SESSION['bejelentkezes'])) {
?>    

<h2>Kérjük, jelentkezz be</h2><br>
<form action="index.php" name="bejelentkezes" method="post">
    <label for="">Szavazó azonosító</label>
    <input type="text" name="szavazoazon" size="10">
    <br>
    <br>
    <label for="">Jelszó</label>
    <input type="password" name="jelszo" size="10">
    <br>
    <br>
    <input type="submit" value="bejelentkezes">
    <input type="hidden" name="tartalom" value="ellenorzes">
</form>
<?php
} else {
    echo "<h2>Üdvözöl a Filmes Szavazó</h2>\n";
    echo "<br><br>\n";
    echo "<p>Ez a program nyomon követi a szavazók és a filmek adatait</p>\n";
    echo "<p>Kérjük, használd a navigációs sáv hivatkozásait</p>\n";
    echo "<p>Kérjük, NE HASZNÁLD a böngésző navigációs gombjait!</p>\n";
}
?>
<script language="javascript">
    document.bejelentkezes.szavazoazon.focus();
    document.bejelentkezes.szavazoazon.select();
</script>
