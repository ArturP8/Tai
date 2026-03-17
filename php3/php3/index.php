<?php
function wyswietl_powitanie() // deklaracja funkcji
{
   echo "Witam serdecznie!";  // ciało funkcji, czyli
   echo "Proszę się zarejestrować.";  // instrukcje do wykonania
}

wyswietl_powitanie();

function tresc_powitania() // deklaracja funkcji
{
   return "Witam wszystkich!";
}

$powitanie = tresc_powitania();
echo $powitanie;

function oblicz()
{
   $zm1 = 3;
   $zm1 += 5;
   $zm1++;
   return $zm1;
}

if (oblicz() > 5)
   echo "Funkcja zwraca wartość większą od 5";
else
   echo "Wartość zwracana przez funkcję jest mniejsza od 6";

//Funkcja przyjmująca wartość
function przywitaj($zmienna_z_imieniem)
{
   echo 'Witaj '.$zmienna_z_imieniem.'!';
}

$imie = "Marcin";

przywitaj($imie);


// Tablice
$tablica[0] = 1;    // przypisanie
$tablica[1] = 4;    // wartości
$tablica[2] = 1;    // kolejnym
$tablica[3] = 0;    // indeksom

for ($i = 0; $i < 4; $i++) // wyświetlenie każdego
   echo $tablica[$i];  // indeksu za pomocą

$pewna_zmienna = X; // gdzie X to dowolna wartość

$j = 0; // zmienna pomocnicza
$i = 0; // zmienna iteracyjna

while($i <= $pewna_zmienna) // warunek kontynuacji pętli
{
   if($i % 4 == 0) // jeśli podzielna przez 4
   {
      $tablica[$j] = $i;  // dodaj kolejny element do tablicy
      $j++; // zwiększ indeks o 1
   }
   $i++; // zwiększamy $i o 1, aż przekroczymy $pewna_zmienna
}

for ($i = 0; $i < $j; $i++) // wyświetlenie wszystkich
   echo $tablica[$i]."<br/>"; // elementów tablicy

// Wielowiniarowe

$tablica_ucznia[0] = "Janek";
$tablica_ucznia[1] = "Kowalski";
$tablica_ucznia[2] = "14-10-1995";

$tablica_klasy[0] = $tablica_ucznia;

$tablica_ucznia[0] = "Krzysiek";
$tablica_ucznia[1] = "Nowak";
$tablica_ucznia[2] = "24-12-1994";

$tablica_klasy[1] = $tablica_ucznia;

$tablica_ucznia[0] = "Ewa";
$tablica_ucznia[1] = "Kowalska";
$tablica_ucznia[2] = "17-03-1996";

$tablica_klasy[2] = $tablica_ucznia;

echo $tablica_klasy[1][0]; // powinno wyświetlić
                           // Krzysiek

//Tablice asocjacyjne
  $uczen['imie'] = "Janek";
  $uczen['nazwisko'] = "Kowalski"; 
  $uczen['dataUrodzenia'] = "14-10-1995";

      $classroom = array();
    $student['firstName'] = 'Janek';
    $student['lastName'] = 'Kowalski';
    $student['birthday'] = '15-08-2000';
    $classroom[] = $student;
    $student['firstName'] = 'Mirek';
    $student['lastName'] = 'Nowak';
    $student['birthday'] = '2-11-2001';
    $classroom[] = $student;
    $student['firstName'] = 'Marcin';
    $student['lastName'] = 'Wesel';
    $student['birthday'] = '19-05-1989';
    $classroom[] = $student;

// foreach
$numbers = array();
// wypełnij dane przy pomocy pętli for
for($i = 0; $i < 10; $i++)
{
    $numbers[] = $i;
}
// użycie pętli foreach na tablicy
foreach($numbers as $number)
{
    // w każdym kolejnym przebiegu następny element tablicy 
    // jest przechowywany w zmiennej $number
    echo $number;}
?>