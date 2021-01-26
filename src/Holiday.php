<?php

namespace BrazilHoliday;

use DateTime;

class Holiday
{
    public $title;
    public $date;
    public $holiday;

    public function __construct($title = NULL, $date = NULL)
    {
        $this->title = $title;
        $this->date = $date;
    }

    public function load($year = 2000)
    {
        $this->holiday = null;

        $this->holiday[] = new Holiday('Ano Novo', DateTime::createFromFormat('d/m/Y', '01/01/' . $year));
        $this->holiday[] = new Holiday('Tiradentes', DateTime::createFromFormat('d/m/Y', '21/04/' . $year));
        $this->holiday[] = new Holiday('Dia do trabalho', DateTime::createFromFormat('d/m/Y', '01/05/' . $year));
        $this->holiday[] = new Holiday('Independência do Brasil', DateTime::createFromFormat('d/m/Y', '07/09/' . $year));
        $this->holiday[] = new Holiday('Nossa Senhora Aparecida', DateTime::createFromFormat('d/m/Y', '12/10/' . $year));
        $this->holiday[] = new Holiday('Finados', DateTime::createFromFormat('d/m/Y', '02/11/' . $year));
        $this->holiday[] = new Holiday('Proclamação da República', DateTime::createFromFormat('d/m/Y', '15/11/' . $year));
        $this->holiday[] = new Holiday('Véspera de Natal', DateTime::createFromFormat('d/m/Y', '24/12/' . $year));
        $this->holiday[] = new Holiday('Natal', DateTime::createFromFormat('d/m/Y', '25/12/' . $year));
        $this->holiday[] = new Holiday('Véspera de Ano Novo', DateTime::createFromFormat('d/m/Y', '31/12/' . $year));
        // FERIADOS MÓVEIS
        $x = 0;
        $y = 0;

        $a = 0;
        $b = 0;
        $c = 0;
        $d = 0;
        $e = 0;

        $day = 0;
        $month = 0;

        if ($year >= 1900 & $year <= 2099) {
            $x = 24;
            $y = 5;
        } else if ($year >= 2100 & $year <= 2199) {
            $x = 24;
            $y = 6;
        } else if ($year >= 2200 & $year <= 2299) {
            $x = 25;
            $y = 7;
        } else {
            $x = 24;
            $y = 5;
        }

        $a = $year % 19;
        $b = $year % 4;
        $c = $year % 7;
        $d = (19 * $a + $x) % 30;
        $e = (2 * $b + 4 * $c + 6 * $d + $y) % 7;

        if (($d + $e) > 9) {
            $day = ($d + $e - 9);
            $month = 4;
        } else {
            $day = ($d + $e + 22);
            $month = 3;
        }

        $pascoa = DateTime::createFromFormat('j/n/Y', "$day/$month/$year");
        $sexta_santa = (clone $pascoa)->modify('-2 days');
        $carnaval1  = (clone $pascoa)->modify('-48 days');
        $carnaval2  = (clone $pascoa)->modify('-47 days');
        $corpusChrist  = (clone $pascoa)->modify('+29 days');

        $this->holiday[] = new Holiday('Páscoa', $pascoa);
        $this->holiday[] = new Holiday('Sexta-feira Santa', $sexta_santa);
        $this->holiday[] = new Holiday('Carnaval', $carnaval1);
        $this->holiday[] = new Holiday('Carnaval', $carnaval2);
        $this->holiday[] = new Holiday('Corpus Christ', $corpusChrist);
    }

    public function isHoliday(DateTime $date)
    {
        foreach ($this->holiday as $holiday) {
            if ($holiday->date == $date) {
                return true;
            }
        }
        return false;
    }

    public function todayHoliday()
    {
        $date = new DateTime("now");
        foreach ($this->holiday as $holiday) {
            if ($holiday->date == $date) {
                return true;
            }
        }
        return false;
    }
    
    public function tomorrowHoliday()
    {
        $date = new DateTime("tomorrow");
        foreach ($this->holiday as $holiday) {
            if ($holiday->date == $date) {
                return true;
            }
        }
        return false;
    }
    public function yesterdayHoliday()
    {
        $date = new DateTime("yesterday");
        foreach ($this->holiday as $holiday) {
            if ($holiday->date == $date) {
                return true;
            }
        }
        return false;
    }
}
