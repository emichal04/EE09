<!DOCTYPE html>
<html lang="pl"> <!--Język strony:polski-->
<head>
    <meta charset="UTF-8"> <!-- Kodowanie znaków -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!--Kompatybilność z Edge oraz IE-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--Skalowanie strony-->
    <meta name="author" content="emichal04"> <!-- Autor strony -->
    <link rel="stylesheet" href="styl.css" type="text/css"> <!-- Podpięcie arkusza stylów CSS -->
    <title>Lista przyjaciół</title> <!-- Tytuł strony -->
</head>
<body>

    <header> <!-- Baner na górze strony -->
        <div class="baner"> 
            <h1>Portal Społecznościowy - moje konto</h1><!--Nagłówek H1-->
        </div>
    </header>

    <main> <!--Główna treść strony -->
        <div class="glowny"> <!--Główny pojemnik strony -->
            <section> <!-- Sekcja "Moje zainteresowania -->
                <header><h2>Moje zainteresowania</h2></header> <!--Nagłówek sekcji-->
                <ul> <!--Lista nienumerowana UL-->
                    <li>muzyka</li>
                    <li>film</li>
                    <li>komputery</li>
                </ul>
            </section>
            <section> <!-- Sekcja "Moi znajomi -->
                <header><h2>Moi znajomi</h2></header> <!--Nagłówek sekcji-->
                <?php
                    $polacz = mysqli_connect("localhost", "root", "", "dane"); /*Łączenie z bazą danych */
                    $sql = "SELECT zdjecie,imie,nazwisko,opis FROM osoby WHERE Hobby_id=1 OR Hobby_id=2 OR Hobby_id=6;";
                    /* Wykonanie kwerendy SQL wybierajacej z bazy danych zdjęcia, imię, nazwisko i opis danej osoby,
                    ale tylko jeśli spełnia ona warunek Hobby_id=1 lub =2 lub =6. */
                    $rezultat = mysqli_query($polacz, $sql); /*Zapisane wyniku kwerendy do zmiennej $rezultat*/
                      
                    while ($row=mysqli_fetch_row($rezultat)) { 
                        /*Wypisanie kolejnych pozycji w bazie danych, jedna po drugiej */
                        echo " 
                            <div class='flex'> <!--Pojemik flex pozwoli na ułożenie obok siebie zdjęcia oraz opisu-->
                                <div class='zdjecie'>
                                    <img src='$row[0]' alt='przyjaciel'>
                                    <!--Zdjęcie przyjmuje tutaj numer 0,patrz:zapytanie $sql-->
                                </div>
                                <div class='opis'>
                                    <h3>$row[1] $row[2]</h3>
                                    <!--Imię jest oznaczone jako 1, a nazwisko jako 2-->
                                    <p>Ostatni wpis: $row[3]</p>
                                    <!--Opis oznaczony jest jako 3-->
                                </div>
                            </div>
                            <div class='linia'>
                                <hr>
                                <!--Z jakiegoś powodu ktoś uznał za zasadne tworzenie osobnego DIV'a na jedną linię-->
                            </div>
                            ";
                      }
                    
                    mysqli_close($polacz); /*Zamknięcie połączenia */
                ?>
            </section>
        </div>
    </main> <!--Koniec głównej treści strony -->

    <footer> <!-- Stopka strony -->
        <div class="flex"> <!--Pojemnik flex -->
            <div class="stopka">Stronę wykonał:[PESEL]</div> <!--Tutaj powinien być PESEL-->
            <div class="stopka"><a href="mailto:ja@portal.pl">napisz do mnie</a></div>
        </div>
    </footer>
</body>
</html>
