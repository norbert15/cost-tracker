<?php
//Az összes havi költség elkérése
$sql = "SELECT CONCAT(DATE_FORMAT(date,'%Y'), ' ',
                    CASE WHEN DATE_FORMAT(date, '%M') = 'December' THEN 'December'
                    WHEN DATE_FORMAT(date, '%M') = 'November' THEN 'November'
                    WHEN DATE_FORMAT(date, '%M') = 'October' THEN 'Október'
                    WHEN DATE_FORMAT(date, '%M') = 'September' THEN 'Szeptember'
                    WHEN DATE_FORMAT(date, '%M') = 'August' THEN 'Augusztus'
                    WHEN DATE_FORMAT(date, '%M') = 'July' THEN 'Július'
                    WHEN DATE_FORMAT(date, '%M') = 'June' THEN 'Június'
                    WHEN DATE_FORMAT(date, '%M') = 'May' THEN 'Május'
                    WHEN DATE_FORMAT(date, '%M') = 'April' THEN 'Április'
                    WHEN DATE_FORMAT(date, '%M') = 'March' THEN 'Március'
                    WHEN DATE_FORMAT(date, '%M') = 'February' THEN 'Február'
                    WHEN DATE_FORMAT(date, '%M') = 'January' THEN 'Január'
                    END, ' ') 
                    AS dates, `transport` AS transport, `food` AS food, `shopping` AS shopping,`gift` AS gift, 
                    `health` AS health, `family` AS family,`sport` AS sport 
                    FROM `expenditures` WHERE `email` = '$_SESSION[email]' AND (transport > 0 OR food > 0 OR shopping > 0 OR gift > 0 OR
                    health > 0 OR family > 0 OR sport > 0) GROUP BY dates ORDER BY date DESC";

$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<tr><td>' . $row["dates"] . '</td>
                <td>' . number_format($row["transport"] < 0 ? 0 : $row["transport"], 0, ",", ".") . '</td>
                <td>' . number_format($row["food"] < 0 ? 0 : $row["food"], 0, ",", ".") . '</td>
                <td>' . number_format($row["shopping"] < 0 ? 0 : $row["shopping"], 0, ",", ".") . '</td>
                <td>' . number_format($row["gift"] < 0 ? 0 : $row["gift"], 0, ",", ".") . '</td>
                <td>' . number_format($row["health"] < 0 ? 0 : $row["health"], 0, ",", ".") . '</td>
                <td>' . number_format($row["family"] < 0 ? 0 : $row["family"], 0, ",", ".") . '</td>
                <td>' . number_format($row["sport"] < 0 ? 0 : $row["sport"], 0, ",", ".") . '</td></tr>';
    }
}
