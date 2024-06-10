<?php
//insert, update, delete
function execute($sql)
{
    require_once('connect.php');

    mysqli_query($conn, $sql);

    mysqli_close($conn);
}

//select
function executeResult($sql)
{
    require_once('connect.php');
    $resultset = mysqli_query($conn, $sql);
    $list = [];
    while ($row = mysqli_fetch_array($resultset, MYSQLI_ASSOC)) {
        $list[] = $row;
    }
    mysqli_close($conn);

    return $list;
}
