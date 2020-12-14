<?php
//Az adott hónap költségeinek elkérése,
//Költségek kiszűrése, ha az adott hónap valamelyik napjában nem volt költség felvéve
$date_history = "SELECT `date`, `transport`, `food`, `shopping`, `gift`, `health`, `family`, `sport` 
                        FROM `expenditures` WHERE `email` = '$email' AND date LIKE '%$change_date%' 
                        AND (`transport` > 0 OR `food` > 0 OR `shopping` > 0 OR `gift` > 0 OR `health` > 0 OR `family` > 0 
                        OR `sport` > 0) ORDER BY date DESC";
$result_history = mysqli_query($conn, $date_history);

//A költségek feltüntese az elözményekben.
//Adott hónap napjai megjelenítése
if ($result_history->num_rows > 0) {
    while ($row = $result_history->fetch_assoc()) {
        echo '<div class="p-1"><strong>(' . $row["date"] . ') </strong>';
        if ($row["transport"] != 0) {
            echo '<span> Utazás: ' . number_format($row["transport"], 0, ",", ".") . ' Ft. </span>';
        }
        if ($row["food"] != 0) {
            echo '<span> Élelmiszer: ' . number_format($row["food"], 0, ",", ".") . ' Ft. </span>';
        }
        if ($row["shopping"] != 0) {
            echo '<span> Vásárlás: ' . number_format($row["shopping"], 0, ",", ".") . ' Ft. </span>';
        }
        if ($row["gift"] != 0) {
            echo '<span> Ajándék: ' . number_format($row["gift"], 0, ",", ".") . ' Ft. </span>';
        }
        if ($row["health"] != 0) {
            echo '<span> Egészségügy: ' . number_format($row["health"], 0, ",", ".") . ' Ft. </span>';
        }
        if ($row["family"] != 0) {
            echo '<span> Családi: ' . number_format($row["family"], 0, ",", ".") . ' Ft. </span>';
        }
        if ($row["sport"] != 0) {
            echo '<span> Szabadidő: ' . number_format($row["sport"], 0, ",", ".") . ' Ft. </span>';
        }
        echo '</div>';
    }
} else {
    echo '<small class="font-italic">Nincsenek adatok rögzítve</small>';
}
