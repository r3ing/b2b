<table class="table table-bordered table-hover" id="sample_1">
    <thead>
    <tr class="info">
        <!--<th>Id</th>-->
        <th>T&iacute;tulo</th>
        <th>Descripci&oacute;n</th>
        <th>Vigencia Incio</th>
        <th>Vigencia Fin</th>
        <th class="notReport">Docs</th>
        <th class="notReport">&nbsp;</th>
        <th class="notReport">&nbsp;</th>
    </tr>
    </thead>
    <?php
    include('../../MASTER/config/conect.php');
    $sql = "SELECT t1.*, (SELECT (CASE WHEN d.doc1 IS NULL THEN 0 ELSE 1 END)+(CASE WHEN d.doc2 IS NULL THEN 0 ELSE 1 END)
                                      FROM docs d WHERE t1.identifier = d.identifier) AS count_docs
                        FROM pizarra t1
                        LEFT JOIN docs t2
                        ON t1.identifier = t2.identifier
                        WHERE t1.disabled = 0
                        GROUP BY t1.id
                        ORDER BY t1.vigencia_fin ASC";

    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $result = $link->prepare($sql);
    $result->execute();
    //echo $sql;
    while ($row = $result->fetch()) {
        echo "<tr class='odd gradeX'>";
        //echo "<td>" . $row[0] . "</td>";
        echo "<td>" . $row[1] . "</td>
                                      <td>" . $row[2] . "</td>
                                      <td>" . date('d-m-Y', strtotime(utf8_encode($row[3]))) . "</td>
                                      <td>" . date('d-m-Y', strtotime(utf8_encode($row[4]))) . "</td>
                                      <td>";
        $i = 0;
        while($i < $row[10]){
            echo "<i class='fa fa-file-text-o' style='color:#0066FF;'></i> &nbsp;&nbsp;";
            $i++;
        }
        echo "</td>";
        echo "<td align ='center'>
							            <a href='#' class='link' onclick=\"showForms('VIEW/EDIT.php', 2 ," . $row[0] . ")\">
								            <i class='fa fa-pencil' style='color:#0066FF;'></i>
							            </a>
						              </td>";
        echo "<td align ='center'>
							            <a href='#' class='link' onclick=\"deletePizarra(" . $row[0] . ")\">
								            <i class='fa fa-times' style='color:#FF0000;'></i>
							            </a>
						              </td>";
        echo "</tr>";
    }
    ?>
    </tbody>
</table>