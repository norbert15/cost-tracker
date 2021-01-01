<?php

class Translate
{

    //Hónap fordítása.
    public static function translateMonth($month)
    {
        $time = strtotime($month);
        $format = getdate(date('U', $time));

        switch ($format['mon']) {
            case 1:
                $format['mon'] = "Január";
                break;
            case 2:
                $format['mon'] = "Február";
                break;
            case 3:
                $format['mon'] = "Március";
                break;
            case 4:
                $format['mon'] = "Április";
                break;
            case 5:
                $format['mon'] = "Május";
                break;
            case 6:
                $format['mon'] = "Június";
                break;
            case 7:
                $format['mon'] = "Július";
                break;
            case 8:
                $format['mon'] = "Augusztus";
                break;
            case 9:
                $format['mon'] = "Szeptember";
                break;
            case 10:
                $format['mon'] = "Október";
                break;
            case 11:
                $format['mon'] = "November";
                break;
            case 12:
                $format['mon'] = "December";
                break;
        }

        return $format['year'] . ' ' . $format['mon'];
    }
}
