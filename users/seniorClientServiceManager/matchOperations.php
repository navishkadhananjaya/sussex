<?php

require_once("../../db.php");
require_once("include/component.php");

$con = Createdb();

if (isset($_POST['btn-match'])) {
   saveMatches($clientId, $friends_id, $date, $status);
}

function matchFriendship($clientId)
{
    $sql = "SELECT  DISTINCT C.client_id AS Friend_ID,c.gender,CONCAT( C.first_name, ' ', c.last_name) AS Friends, CONCAT('Both interested in ',HO.hobby_name) AS 'Why Need to be Friend'
    FROM client_hobbies AS H
    JOIN client AS C ON C.client_id = H.client_id 
    JOIN (SELECT hobby_id FROM client_hobbies WHERE client_id = $clientId) AS H2
    JOIN hobbies AS HO ON HO.hobby_id = H.hobby_id
    WHERE H2.hobby_id = H.hobby_id AND c.client_id <> $clientId";
    $result = mysqli_query($GLOBALS['con'], $sql);
    return $result;
}

function getName($clientId)
{
    $sql = "SELECT CONCAT( first_name, ' ', last_name) AS ClientName FROM client WHERE client_id = $clientId";
    $result = mysqli_query($GLOBALS['con'], $sql);
    $name = '';
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $name = $row['ClientName'];
        }
    }
    return $name;
}

function saveMatches($clientId, $friends_id, $date, $status)
{
    $sql = "INSERT INTO friendship(client_id, friends_id, friendship_date, status)
             VALUES('$clientId','$friends_id','$date','$status')";
    
    if (mysqli_query($GLOBALS['con'], $sql)) {
        TextNode("success", "Friendship suggestion is now visible to CLient...!");
    } else {
        echo "Error";
    }
}

function getClientList()
{
    $sql = "SELECT * FROM client";
    $result = mysqli_query($GLOBALS['con'], $sql);
    return $result;
}
