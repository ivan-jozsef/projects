<?php
class Film {
    public $filmazonosito;
    public $filmcim;
    public $leiras;
    public $szavazatok;

    function __construct($filmazonosito, $filmcim, $leiras, $szavazatok) {
        $this->filmazonosito = $filmazonosito;
        $this->filmcim = $filmcim;
        $this->leiras = $leiras;
        $this->szavazatok = $szavazatok;
    }

    function __toString() {
        $kimenet = 
            "<h2>Filmazonosító : $this->filmazonosito</h2>" . 
            "<h2>Filmcím: $this->filmcim</h2>\n" .
            "<h2>Leírás: $this->leiras</h2>\n" . 
            "<h2>Szavazatok: $this->szavazatok</h2>\n";
        return $kimenet;
    }

    function filmMentese() {
        $adatb = new mysqli("localhost", "sz_felhasznalo", "Szavazo", "szavazas");
        $lekerdezes = "INSERT INTO filmek VALUES (?, ?, ?, ?)";
        $ut = $adatb->prepare($lekerdezes);
        $ut->bind_param("issi", $this->filmazonosito, $this->filmcim, $this->leiras, $this->szavazatok);
        $eredmeny = $ut->execute();
        $adatb->close();
        return $eredmeny;
    }

    function filmFrissitese() {
        $adatb = new mysqli("localhost", "sz_felhasznalo", "Szavazo", "szavazas");
        $lekerdezes = "UPDATE filmek SET filcim = ?, leiras = ?, szavazatok = ? WHERE filmazonosito = $this->filmazonosito";
        $ut = $adatb->prepare($lekerdezes);
        $ut->bind_param("ssi", $this->filmcim, $this->leiras, $this->szavazatok);
        $eredmeny = $ut->execute();
        $adatb->close();
        return $eredmeny;
    }

    function filmEltavolitasa() {
        $adatb = new mysqli("localhost", "sz_felhasznalo", "Szavazo", "szavazas");
        $lekerdezes = "DELETE FROM filmek WHERE filmazonosito = $this->filmazonosito";
        $eredmeny = $adatb->query($lekerdezes);
        $adatb->close();
        return $eredmeny;
    }

    static function filmekLekerese() {
        $adatb = new mysqli("localhost", "sz_felhasznalo", "Szavazo", "szavazas");
        $lekerdezes = "SELECT * FROM filmek";
        $eredmeny = $adatb->query($lekerdezes);
        if (mysqli_num_rows($eredmeny) > 0) {
            $filmek = array();
            while($sor = $eredmeny->fetch_array(MYSQLI_ASSOC)) {
                $film = new Film($sor['filmazonosito'], $sor['filmcim'], $sor['leiras'], $sor['szavazatok']);
                array_push($filmek, $film);
            }
            $adatb->close();
            return $filmek; 
        } else {
            $adatb->close();
            return NULL;
        }
    }

    // static function filmekLekereseSzavazokSzerint($szavazoazonosito) {
    //     $adatb = new mysqli("localhost", "sz_felhasznalo", "Szavazo", "szavazas");
    //     $lekerdezes = "SELECT * FROM filmek WHERE "
    // }

    static function filmKeresese($filmazonosito) {
        $adatb = new mysqli("localhost", "sz_felhasznalo", "Szavazo", "szavazas");
        $lekerdezes = "SELECT * FROM filmek WHERE filmazonosito = $filmazonosito";
        $eredmeny = $adatb->query($lekerdezes);
        $sor = $eredmeny->fetch_array(MYSQLI_ASSOC);
        if ($sor) {
            $film = new Film($sor['filmazonosito'], $sor['filmcim'], $sor['leiras'], $sor['szavazatok']);
            $adatb->close();
            return $film;
        } else {
            $adatb->close();
            return NULL;
        }
    }
}