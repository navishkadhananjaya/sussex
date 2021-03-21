<?php

require_once("./include/component.php");
require_once("handleParticipantsOperations.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Handle Participants</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../style/css/bootstrap.min.css" rel="stylesheet">
    <link href="../style/css/k.css" rel="stylesheet">
    <script src="../style/js/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

</head>

<body>

    <main>
        <?php include("./include/header.php"); ?>
        <div class="container-fluid main-container">
            <?php include("./include/side_bar.php"); ?>


            <div class="col-md-9 content" style="margin-left:10px">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#ac7fe1">
                        <h1>Events of Sussex </h1>
                    </div><br>
                    <div class="panel-body">
                        <div class="col-lg-3">
                            <div class="well">
                                <form action="" method="post" class="w-100">
                                    <div class="d-flex" align="center">
                                        

                                        <?php buttonElement("btn-update", "btn btn-light border", "<i class='fas fa-pen-alt'></i>", "update", "data-toggle='tooltip' data-placement='bottom' title='Update'"); ?>
                                        
                                    </div>
									<div class="py-2">

                                        <?php inputElement("<i class='fas fa-id-badge'></i>", "ID", "event_id", setID(), "text"); ?>
                                    </div>
									<div class="pt-2">
                                        <?php inputElement("<i class='fas fa-book'></i>", "Event Name", "event_name", "", "text"); ?>
                                    </div>
                                    <div class="pt-2">
                                        <?php inputElement("<i class='fa fa-users'></i>", "Number of Participants", "event_participants", "", "text"); ?>
                                    </div>
                                    <div></div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="well">

                                <!-- Bootstrap table  -->
                                <div align="center">
                                    <form action="" method="post" class="w-100">
                                        <div class="d-flex" align="center">
                                            <?php buttonElement("btn-read", "btn btn-primary", "<i class='fas fa-sync'></i>", "read", "data-toggle='tooltip' data-placement='bottom' title='Read'"); ?>
                                        </div>
                                    </form>
                                    <table class="table table-striped table-dark">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>ID</th>
                                                <th>Event Name</th>
                                                <th>Category</th>
                                                <th>Starts On</th>
                                                <th>Ends On</th>
                                                <th>Venue</th>
                                                <th>Fee</th>
                                                <th>Participant Number</th>
                                                <th>Edit</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbody">
                                            <?php


                                            if (isset($_POST['read'])) {
                                                $result = getData();

                                                if ($result) {

                                                    while ($row = mysqli_fetch_assoc($result)) { ?>

                                                        <tr>
                                                            <td data-id="<?php echo $row['Event_ID']; ?>"><?php echo $row['Event_ID']; ?></td>
                                                            <td data-id="<?php echo $row['Event_ID']; ?>"><?php echo $row['Event_Name']; ?></td>
                                                            <td data-id="<?php echo $row['Event_ID']; ?>"><?php echo getCategory($row['Event_Catergory_ID']); ?></td>
                                                            <td data-id="<?php echo $row['Event_ID']; ?>"><?php echo $row['Event_Date']; ?></td>
                                                            <td data-id="<?php echo $row['Event_ID']; ?>"><?php echo $row['Event_End']; ?></td>
                                                            <td data-id="<?php echo $row['Event_ID']; ?>"><?php echo $row['Venue']; ?></td>
                                                            <td data-id="<?php echo $row['Event_ID']; ?>"><?php echo $row['Price']; ?></td>
                                                            <td data-id="<?php echo $row['Event_ID']; ?>"><?php echo $row['Participant_Number']; ?></td>
                                                            
                                                            <td><i class="fas fa-edit btnedit" data-id="<?php echo $row['Event_ID']; ?>"></i></td>
                                                        </tr>

                                            <?php
                                                    }
                                                }
                                            }


                                            ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>





        </div>
        </div>
        <?php include("./include/js.php"); ?>
    </main>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="./edithandleParticipants.js"></script>
</body>

</html>