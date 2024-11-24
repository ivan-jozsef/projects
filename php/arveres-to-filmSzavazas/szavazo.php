<?php
class Szavazo {
    public $szavazoazonosito;
    public $vezeteknev;
    public $keresztnev;
    public $email;

    function __construct($szavazoazonosito, $vnev, $knev, $email) {
        $this->szavazoazonosito = $szavazoazonosito;
        $this->vezeteknev = $vnev;
        $this->keresztnev = $knev;
        $this->email = $email;
    }

    function __toString() {
        $kimenet = 
            "<h2>Szavazó száma: $this->szavazoazonosito</h2>\n" . 
            "<h2>$this->vezeteknev, $this->keresztnev</h2>\n" . 
            "<h2>$this->email<\h2>";
        return $kimenet;
    }

    function szavazoMentese() {
        $adatb = new mysqli("localhost", "sz_felhasznalo", "Szavazo", "szavazas");
        $lekerdezes = "INSERT INTO szavazok VALUES {?, ?, ?, ?, ?}";
        $ut = $adatb->prepare($lekerdezes);
        $ut->bind_param("issss", $this->szavazoazonosito, $this->vezeteknev, $this->keresztnev, $this->email);
        $eredmeny = $ut->execute();
        $adatb->close();
        return $eredmeny;
    }

    function szavazoFrissitese() {
        $adatb = new mysqli("localhost", "sz_felhasznalo", "Szavazo", "szavazas");
        $lekerdezes = 
            "UPDATE szavazok 
            SET szavazoazonosito = ?, vezeteknev = ?, " . "keresztnev = ?, email = ?" . "WHERE szavazoazonosito = $this->szavazoazonosito";
            $ut = $adatb->prepare($lekerdezes);
            $ut->bind_param("issss", $this->szavazoazonosito, $this->keresztnev, $this->vezeteknev, $this->email);
            $eredmeny = $ut->execute();
            $adatb->close();
            return $eredmeny;
    }

    function szavazoEltavolitasa() {
        $adatb = new mysqli("localhost", "sz_felhasznalo", "Szavazo", "szavazas");
        $lekerdezes = "DELETE FROM szavazok WHERE szavazoazonosito = $this->szavazoazonosito";
        $eredmeny = $adatb->query($lekerdezes);
        $adatb->close();
        return $eredmeny;
    }

    static function szavazokLekerese () {
        $adatb = new mysqli("localhost", "sz_felhasznalo", "Szavazo", "szavazas");
        $lekerdezes = "SELECT * FROM szavazok";
        $eredmeny = $adatb->query($lekerdezes);
        if (mysqli_num_rows($eredmeny) > 0) {
            $szavazok = array();
            while ($sor = $eredmeny->fetch_array(MYSQLI_ASSOC)) {
                $szavazo = new Szavazo($sor['szavazoazonosito'], $sor['vezeteknev'], $sor['keresztnev'], $sor['email']);
                array_push($szavazok, $szavazo);
                unset($szavazo);
            }
            $adatb->close();
            return $szavazok;
        } else {
            $adatb->close();
            return NULL;
        }
    }

    static function szavazoKeresese ($szavazoazonosito) {
        $adatb = new mysqli("localhost", "sz_felhasznalo", "Szavazo", "szavazas");
        $lekerdezes = "SELECT * FROM szavazok WHERE szavazoazonosito = $szavazoazonosito";
        $eredmeny = $adatb->query($lekerdezes);
        $sor = $eredmeny->fetch_array(MYSQLI_ASSOC);
        if ($sor) {
            $szavazo = new Szavazo($sor['szavazoazonosito'], $sor['vezeteknev'], $sor['keresztnev'], $sor['email']);
            $adatb->close();
            return $szavazo;
        } else {
            $adatb->close();
            return NULL;
        }
    }
}