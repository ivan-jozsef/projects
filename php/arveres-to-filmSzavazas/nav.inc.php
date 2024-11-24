<table width="100%" cellpadding="3">
    <tr>
        <?php
            if (!isset($_SESSION['bejelentkezes']))
                echo "<td></td>\n";
            else {
                echo "<td><h3>Üdv, {$_SESSION['bejelentkezes']}</h3></td>\n";
            }
            ?>
    </tr>
    <tr>
        <td>
            <a href="index.php"><strong>Kezdőlap</strong></a>
        </td>
    </tr>
    <tr>
        <td><strong>Szavazók</strong></td>
    </tr>
    <tr>
        <td>
            &nbsp;&nbsp;&nbsp;<a href="index.php?tartalom=szavazolista"><strong>Szavazók listázása</strong></a>
        </td>
    </tr>
    <tr>
        <td>
            &nbsp;&nbsp;&nbsp;<a href="index.php?tarrtalom=ujszavazo"><strong>Új szavazó hozzáadása</strong></a>
        </td>
    </tr>
    <tr>
        <td><strong>Filmek</strong></td>
    </tr>
    <tr>
        <td>
            &nbsp;&nbsp;&nbsp;<a href="index.php?tartalom=filmlista"><strong>Filmek listázása</strong></a>
        </td>
    </tr>
    <tr>
        <td>
            &nbsp;&nbsp;&nbsp;<a href="index.php?tartalom=ujfilm"><strong>Új film hozzáadása</strong></a>
        </td>
    </tr>
    <tr>
        <td><hr/></td>
    </tr>
    <tr>
        <td>
            <a href="index.php?tartalom=kijelentkezes"><strong>Kijelentkezés</strong></a>
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>
            <form action="index.php" method="post">
                <label for="">Film keresése</label><br>
                <input type="text" name="filmazon" size="14">
                <input type="submit" value="kereses">
                <input type="hidden" name="tartalom" value="filmfrissites">
            </form>
        </td>
    </tr>
    <tr>
        <td>
            <form action="index.php" method="post">
                <label for="">Szavazó keresése: </label><br>
                <input type="text" name="szavazoazon" size="14">
                <input type="submit" value="kereses">
                <input type="hidden" name="tartalom" value="szavazomegjelenites">
            </form>
        </td>
    </tr>
</table>