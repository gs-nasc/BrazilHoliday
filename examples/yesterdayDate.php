<?php

require "../Holiday.php";

use BrazilHoliday\Holiday;

$holiday = new Holiday(); // INICIA A CLASSE

$holiday->load(2021); // CARREGA O ANO DOS FERIADOS

$isHoliday = $holiday->yesterdayHoliday(); // VERIFICA SE ONTEM FOI FERIADO

echo $isHoliday ? "é feriado" : "não é feriado"; // MOSTRA SE É OU NÃO FERIADO COM O SHORTHAND IF