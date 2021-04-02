<?php
while ($row = $res->fetch_assoc()) {
    echo '<tr class="table-bordered" role="row"><td role="cell">' . Translate::translateMonth($row["dates"]) . '</td>
                <td role="cell">' . number_format($row["transport"], 0, ",", ".") . ' Ft.</td>
                <td role="cell">' . number_format($row["food"], 0, ",", ".") . ' Ft.</td>
                <td role="cell">' . number_format($row["shopping"], 0, ",", ".") . ' Ft.</td>
                <td role="cell">' . number_format($row["gift"], 0, ",", ".") . ' Ft.</td>
                <td role="cell">' . number_format($row["health"], 0, ",", ".") . ' Ft.</td>
                <td role="cell">' . number_format($row["family"], 0, ",", ".") . ' Ft.</td>
                <td role="cell">' . number_format($row["sport"], 0, ",", ".") . ' Ft.</td></tr>';
}
