<?php
    require_once ('../classes/Pdo_methods.php');

    $pdo = new Pdomethods();

    $sql = "SELECT * FROM names ORDER BY FNAME ASC";
    $results = mysql_query($sql);
    $x = array();
    if($res->num_rows>0)
    {
	    while($row = $res->fetch_assoc())
        {
            $x[] = $row;
        }

        echo json_encode($x);
    }
?>