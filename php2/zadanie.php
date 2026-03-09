<?php
//zadanie przykładowe
$ilosc = -1; // przypisujemy dowolną wartość zmiennej $ilosc

// zmienna $kontynuacja sprawdza, czy $ilosc jest zerem
$kontynuacja = ($ilosc == 0) ? 0 : 1;

// jeśli nie jest, możemy kontynuować
if($kontynuacja == 1)
{
    if($ilosc > 0) // wyświetlamy ciągi od 0 do 20
        while($ilosc > 0) // musimy wypisać $ilosc ciągów
        {
            for($i=0;$i<21;$i++) // 20 liczb za pomocą for
                echo $i;
            $ilosc--; // zmniejszamy, aż dojdzie do 0
            echo "<br/>"; // przejście do kolejnej linijki
        }
    else // $ilosc jest ujemna, wyswietlamy od 20 do 0
        while($ilosc < 0) // wypisujemy -$ilosc ciągów
        {
            for($i=20;$i>=0;$i--) // 20 liczb za pomocą for
                echo $i;
            $ilosc++; // zwiększamy, aż dojdzie do 0
            echo "<br/>"; // przejście do kolejnej linijki
        }               
}
else // jeśli kontynuacja wynosi 0
  echo "Brak ciągów liczb";

echo "<br>";
    
for ($i = 1; $i <= 10; $i++) {
    for ($j = 1; $j <= 10; $j++) {
        $wynik = $i * $j;
        echo $i . " x " . $j . " = " . $wynik . "<br>";
    }
    echo "<br>";
}


for ($i = 1; $i <= 10; $i++) {
    for ($j = 1; $j <= 10; $j++) {
        $wynik = $i * $j;
        if ($wynik % 2 == 0) {
            echo "<span style='color: blue;'>$wynik</span> ";
        } else {
            echo "<span style='color: green;'>$wynik</span> ";
        }
    }
    echo "<br>";
}
echo "<br>";

$potega = 4; // zmienna może mieć wartość 2, 3 lub 4

for ($i = 1; $i <= 10; $i++){
    switch ($potega) {
        case 2:
            $wynik = $i * $i;
            break;
        case 3:
            $wynik = $i * $i * $i;
            break;
        case 4:
            $wynik = $i * $i * $i * $i;
            break;
        default:
            echo "potęgi mogą być tylko 2, 3, 4";
            exit;
    }
    echo $i . "^" . $potega . " = " . $wynik . "<br>";
}
?>