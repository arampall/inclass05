<?php
    require_once 'connection.php';
    $db = connect();
    //$postdata = file_get_contents("php://input");
    //$request = json_decode($postdata);
    $orderby = $_GET["orderby"];
    //var_dump($orderby);
    $inorder = $_GET["inorder"];
    $count = $_GET["pagestart"];
    //$orderby = "last_name";
    //$inorder = "DESC";
    //$count = 200;
    $sql = "SELECT * from user ORDER BY $orderby $inorder LIMIT 50 OFFSET $count";
    $result = $db->query($sql);
    $list = array();
    while ($row = $result->fetch((PDO::FETCH_ASSOC)))
    {
	$list[] = $row;
    }
    header('Content-type: application/json; charset=utf-8');
    echo json_encode($list, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
?>
