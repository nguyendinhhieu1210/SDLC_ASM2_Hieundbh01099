<?php
require_once('config.php');

/**insert, update, delete -> su dung function*/

function execute($sql){
    // create connection to database
    $conn = mysqli_connect(HOST,USERNAME , PASSWORD, DATABASE);

    // query

    // dong connection
    mysqli_query($conn, $sql);
    mysqli_close($conn);
}

function executeResult($sql){
    $conn = mysqli_connect(HOST,USERNAME , PASSWORD, DATABASE);

    // query

    // dong connection
    $resultset = mysqli_query($conn, $sql);
    $list =[];
    while($row = mysqli_fetch_array($resultset, 1)){
        $list[] = $row;
    }
    mysqli_close($conn);

    return $list;
}