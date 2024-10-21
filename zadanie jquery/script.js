$(document).ready(function() {
    //  Zmiana tekstu nagłówka
    $('h1').text('Zadanie z jQuery');

    //  Stylizacja paragrafów
    $('p').addClass('highlight');

    //  Zmiana tła strony na losowy kolor
    $('#colorBtn').click(function() {
        const randomColor = '#' + Math.floor(Math.random()*16777215).toString(16);
        $('body').css('background-color', randomColor);
    });

    //  Pokaż/Ukryj obrazek
    $(toggleImageBtn).click(function() {
        $(image).toggle(); 
    });
     //  Podmiana obrazka
     $('#image').attr('src', 'zdj.jpeg'); 

    //  Zwijanie i rozwijanie tekstu
    $('#slideTextBtn').click(function() {
        $('#textSection').slideToggle(); 
    });

    //  Dodawanie nowych paragrafów
    $('#addParaBtn').click(function() {
        $('#content').append('<p class="highlight">Nowy paragraf</p>');
    });

    //  Usuwanie paragrafów
    $('#removeParaBtn').click(function() {
        $('#content p:last').remove();
    });

    //  Wyświetlanie daty i godziny
    $('#showDateBtn').click(function() {
        const now = new Date();
        const formattedDate = now.toLocaleString('pl-PL'); 
        $('#date').text('Aktualna data i godzina: ' + formattedDate);
    });
});
