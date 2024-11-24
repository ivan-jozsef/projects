<?php
$szavazoazon = $_POST['szavazoazon'];
// var_dump($szavazoazon);
$jelszo = $_POST['jelszo'];
// var_dump($jelszo);
$lekerdezes = "SELECT nev FROM rendszergazdak WHERE felhasznaloazonosito = ? AND jelszo = ?";
$adatb = new mysqli("localhost", "ricsi", "H0ssz@bbJelsz0", "szavazas");
// var_dump($adatb) . "\n";
$ut = $adatb->prepare($lekerdezes);
$ut->bind_param("ss", $szavazoazon, $jelszo);
$ut->execute();
$ut->bind_result($nev);
// var_dump($ut);
$ut->fetch();
// var_dump($nev);
if (isset($nev)) {
    echo "<h2>Üdvözöl a Filmes Szavazó</h2>\n";
    $_SESSION['bejelentkezes'] = $nev;
    header("Location: index.php");
} else {
    echo "<h2>Sajnos helytelenek a bejelentkezési adatok</h2>\n";
    echo "<a href=\"index.php\">Próbálkozz újra</a>\n";
}
?>