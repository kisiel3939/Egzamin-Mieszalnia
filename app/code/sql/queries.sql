SELECT COUNT(id) AS 'liczba klientów' FROM klienci

SELECT klienci.nazwisko,klienci.imie,zamowienia.id,zamowienia.kod_koloru,zamowienia.pojemnosc,zamowienia.data_odbioru FROM klienci INNER JOIN zamowienia ON klienci.id = zamowienia.id_klienta ORDER BY zamowienia.data_odbioru ASC

SELECT klienci.nazwisko,klienci.imie,zamowienia.id,zamowienia.kod_koloru,zamowienia.pojemnosc,zamowienia.data_odbioru FROM klienci INNER JOIN zamowienia ON klienci.id = zamowienia.id_klienta WHERE zamowienia.data_odbioru BETWEEN '2021-11-05' AND '2021-11-07'

SELECT imie,nazwisko FROM klienci WHERE plec = 'k'

