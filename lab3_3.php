<?php
include ('connect.php');
if(isset($_POST["pr"]) && isset($_POST["date"])) {
    $pr = $_POST['pr'];
    $date = $_POST['date'];
    $sqlInfo = "SELECT DISTINCT w.description FROM 
        work as w INNER JOIN projects as p ON w.fid_projects = p.id_projects
        WHERE p.name = :pr AND w.date = :date";
        $stmt3 = $dbh->prepare($sqlInfo);
    $stmt3->execute(array(':pr' => $pr, ':date' => $date));
    $res3 = $stmt3->fetchAll();
    foreach($res3 as $row) {
        echo "Информация о выполненых задачах по проекту $pr на $date: $row[0]";
    }
}
?>
