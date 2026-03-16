<?php

$zip = new ZipArchive();

$nazwaZip = "obrazy.zip";

if ($zip->open($nazwaZip, ZipArchive::CREATE) === TRUE) {

    foreach ($_FILES['obrazy']['tmp_name'] as $klucz => $sciezka_tmp) {

        $nazwa_oryginalna = $_FILES['obrazy']['name'][$klucz];

        $rozszerzenie = strtolower(pathinfo($nazwa_oryginalna, PATHINFO_EXTENSION));

        if ($rozszerzenie == "jpg" || $rozszerzenie == "png") {

            $zip->addFile($sciezka_tmp, $nazwa_oryginalna);
        }
    }

    $zip->close();

    echo "Archiwum ZIP zostało utworzone.";
} else {
    echo "Nie można utworzyć archiwum ZIP.";
}

?>