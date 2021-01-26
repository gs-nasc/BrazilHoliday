<?php

require "../Holiday.php";

use BrazilHoliday\Holiday;

$holiday = new Holiday(); // INICIA A CLASSE

$holiday->load(2021); // CARREGA O ANO DOS FERIADOS

$isHoliday = $holiday->isHoliday(DateTime::createFromFormat('d/m/Y', '04/04/2021')); // VERIFICA SE O DATETIME 04/04/2021 (PÁSCOA) É FERIADO

echo $isHoliday ? "é feriado" : "não é feriado"; // MOSTRA SE É OU NÃO FERIADO COM O SHORTHAND IF