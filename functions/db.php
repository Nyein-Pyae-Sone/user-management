<?php
$conn = new PDO("mysql:host=localhost;port=3307;dbname=usermanagement", 'root', '');
//to handle error
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function query($sql, $params = [])
{
    global $conn;
    $stmt = $conn->prepare($sql);
    return $stmt->execute($params);
}

function getAll($sql, $params = [])
{
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}
function getOne($sql, $params = [])
{
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetch(PDO::FETCH_OBJ);
}
function lastInsertId()
{
    global $conn;
    return $conn->lastInsertId();
}

