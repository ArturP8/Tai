<?php
if (isset($_GET['dzien'], $_GET['miesiac'], $_GET['rok'])) {
    $data = [
        'dzien' => $_GET['dzien'],
        'miesiac' => $_GET['miesiac'],
        'rok' => $_GET['rok']
    ];

    function wypisz_dzien_tygodnia($data) {
        $dzienTygodnia = date("w", mktime(0,0,0,$data['miesiac'], $data['dzien'], $data['rok']));
        switch($dzienTygodnia) {
            case 0: echo "Niedziela"; break;
            case 1: echo "Poniedziałek"; break;
            case 2: echo "Wtorek"; break;
            case 3: echo "Środa"; break;
            case 4: echo "Czwartek"; break;
            case 5: echo "Piątek"; break;
            case 6: echo "Sobota"; break;
        }
    }

    function oblicz_dni($data) {
        $czas = (time() - mktime(0,0,0,$data['miesiac'], $data['dzien'],$data['rok'])) / 60 / 60 / 24;
        return floor($czas);
    }
    function sprawdz_pełnoletnosc($dzien, $miesiac, $rok) {
        $dzisiaj = new DateTime();
        $urodziny = new DateTime("$rok-$miesiac-$dzien");
        $wiek = $dzisiaj->diff($urodziny)->y;

        if ($wiek >= 18) {
            echo "Jesteś pełnoletni/a. Twój wiek: $wiek lat.";
        } else {
            echo "Nie jesteś pełnoletni/a. Twój wiek: $wiek lat.";
        }
    }

    wypisz_dzien_tygodnia($data);
    echo "<br>";
    echo "Minęło dni od urodzenia: " . oblicz_dni($data);
    echo "<br>";
    sprawdz_pełnoletnosc($data['dzien'], $data['miesiac'], $data['rok']);
}
?>