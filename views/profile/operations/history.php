<?php
$empty = true;
while ($row = $res->fetch_assoc()) {
    $empty = false;
    echo '<div class="p-1"><strong>(' . $row["current_date"] . ') </strong>';
    echo '<span>' . Translate::translateCost($row["name"]) . ': ' . number_format($row["sum"], 0, ",", ".") . " ". $ft . '</span>';
    if (strlen($row["comment"]) > 0) {
        echo '<span class="font-italic"> ' . $comment . ': ' . $row["comment"] . '. </span>';
    }
    echo '</div>';
}
if ($empty) {
    echo '<small class="font-italic">Nincsenek adatok rögzítve</small>';
}