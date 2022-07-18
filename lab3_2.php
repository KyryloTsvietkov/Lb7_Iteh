<?php
header('Content-Type: text/xml; charset=UTF-8');
header("Cache-Control: no-cache, must-revalidate");
include('connect.php');
if(isset($_GET["project"])){
    $project = $_GET["project"];
    $sqlAllTime = "SELECT CONVERT(SUM(TIMEDIFF(w.time_end, w.time_start)), TIME) as Time 
    FROM work as w INNER JOIN projects as p ON w.fid_projects = p.id_projects WHERE p.name = :project";
    $stmt2 = $dbh->prepare($sqlAllTime);
    $stmt2->execute(array(':project' => $project));
    $res2 = $stmt2->fetchAll(PDO::FETCH_NUM);
    echo '<?xml version="1.0" encoding="utf-8" ?>';
    echo "<root>";
    foreach($res2 as $row)
    {
        $time = $row[0];
        print "<row><Project>$project</Project><Time>$time</Time></row>";
    };
    echo "</root>";
};
?>
