<?php

namespace BrazilHoliday;

use DateTime;

class Holiday
{
    public $title;
    public $date;
    public $holiday;
    public $type;

    public function __construct($title = NULL, $date = NULL)
    {
        $this->title = $title;
        $this->date = $date;
    }

    public function load($year = 2000)
    {

        $holidays = json_decode(file_get_contents(dirname(__FILE__) . "/dates.json"), true);

        foreach ($holidays['fixed_holidays'] as $holiday) {
            $this->holiday[] = new Holiday($holiday['name'], DateTime::createFromFormat('d/m/Y', $holiday['date'] . '/' . $year));
        }

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
        $sexta_santa = clone $pascoa;
        $carnaval1  = clone $pascoa;
        $carnaval2  = clone $pascoa;
        $corpusChrist  = clone $pascoa;


        $sexta_santa->modify('-2 days');
        $carnaval1->modify('-48 days');
        $carnaval2->modify('-47 days');
        $corpusChrist->modify('+29 days');


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
