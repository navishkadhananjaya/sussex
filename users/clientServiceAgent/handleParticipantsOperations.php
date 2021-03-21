<?php

require_once ("../../db.php");
require_once ("./include/component.php");

$con = Createdb();

// create button click
if(isset($_POST['create'])){
    createData();
}

if(isset($_POST['update'])){
    UpdateData();
}

if(isset($_POST['delete'])){
    deleteRecord();
}

if(isset($_POST['deleteall'])){
    deleteAll();

}

function createData(){
    $eventname = textboxValue("event_name");
    $eventcategory = textboxValue("event_category");
    $eventhostingdate = textboxValue("event_hosting_date");
    $eventenddate = textboxValue("event_end_date");
    $eventvenue = textboxValue("event_venue");
    $eventprice = textboxValue("event_price");
    $eventparticipants =textboxValue("event_participants");
    $eventdescription = textboxValue("event_description");

    if($eventprice){
        TextNode("error", "You are not allow to update event fee without the permission of finance manager, Leave it Empty !");
    }
    if($eventname && $eventcategory && $eventhostingdate && $eventenddate
    && $eventvenue && $eventdescription){

        $sql = "INSERT INTO event_details (Event_Name,Event_Catergory_ID,Event_Date,
                    Venue,Price,Event_End,Event_Desc,Participant_Number) 
                    VALUES ('$eventname','$eventcategory','$eventhostingdate',
                        '$eventvenue','','$eventenddate','$eventdescription','')";

        if(mysqli_query($GLOBALS['con'], $sql)){
            TextNode("success", "Record Successfully Inserted...!");
        }else{
            echo "Error";
        }

    }else{
            TextNode("error", "Provide Valid Details");
    }
}

function textboxValue($value){
    $textbox = mysqli_real_escape_string($GLOBALS['con'], trim($_POST[$value]));
    if(empty($textbox)){
        return false;
    }else{
        return $textbox;
    }
}


// messages
function TextNode($classname, $msg){
    $element = "<h6 class='$classname'>$msg</h6>";
    echo $element;
}


// get data from mysql database
function getData(){
    $sql = "SELECT * FROM event_details";

    $result = mysqli_query($GLOBALS['con'], $sql);
    if(mysqli_num_rows($result) > 0){
        return $result;
    }
}

// update dat
function UpdateData(){
	$eventid = textboxValue("event_id");
    $eventparticipants =textboxValue("event_participants");


    if($eventparticipants){
        $sql = "
                    UPDATE event_details SET Participant_Number='$eventparticipants'
                    WHERE Event_ID='$eventid';                    
        ";
        if(mysqli_query($GLOBALS['con'], $sql) or die(mysqli_error($GLOBALS['con']))){
            TextNode("success", "Data Successfully Updated");
        }else{
            TextNode("error", "Enable to Update Data");
        }

    }else{
        TextNode("error", "Select Data Using Edit Icon");
    }

}


function deleteRecord(){
    $eventid = (int)textboxValue("event_id");

    $sql = "DELETE FROM event_details WHERE Event_ID=$eventid";

    if(mysqli_query($GLOBALS['con'], $sql)){
        TextNode("success","Record Deleted Successfully...!");
    }else{
        TextNode("error","Enable to Delete Record...!");
    }

}


function deleteBtn(){
    $result = getData();
    $i = 0;
    if($result){
        while ($row = mysqli_fetch_assoc($result)){
            $i++;
            if($i > 3){
                buttonElement("btn-deleteall", "btn btn-danger" ,"<i class='fas fa-trash'></i> Delete All", "deleteall", "");
                return;
            }
        }
    }
}


function deleteAll(){
    $sql = "DROP TABLE books";

    if(mysqli_query($GLOBALS['con'], $sql)){
        TextNode("success","All Record deleted Successfully...!");
        Createdb();
    }else{
        TextNode("error","Something Went Wrong Record cannot deleted...!");
    }
}


function getCategory($cat_id){
    $sql = "SELECT * FROM event_categories WHERE cat_id='$cat_id'";
    $title ="";
    $result = mysqli_query($GLOBALS['con'], $sql);
    if($row = mysqli_fetch_assoc($result)){
        $title = $row['cat_title'];
    }
    return $title;
}

// set id to textbox
function setID(){
    $getid = getData();
    $id = 0;
    if($getid){
        while ($row = mysqli_fetch_assoc($getid)){
            $id = $row['Event_ID'];
        }
    }
    return ($id + 1);
}





