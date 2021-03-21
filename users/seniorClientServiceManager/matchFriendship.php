<?php

require_once("include/component.php");
require_once("matchOperations.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match Friendship</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../style/css/bootstrap.min.css" rel="stylesheet">
    <link href="../style/css/k.css" rel="stylesheet">
    <script src="../style/js/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

</head>

<body>
    <main>
        <?php include("include/header.php"); ?>
        <div class="container-fluid main-container">
            <?php include("include/side_bar.php"); ?>
            <div class="col-md-9 content" style="margin-left:10px">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#ac7fe1">
                        <h1>Match Friendship at Sussex </h1>
                    </div><br>
                    <div class="panel-body">
                        <div class="col-lg-6">
                            <div class="well">
                                <div>
                                    <form action="" method="post" class="w-100">
                                        <div class="d-flex" align="center">
                                            <?php buttonElement("btn-read", "btn btn-primary", "<i class='fas fa-sync'></i>", "read", "data-toggle='tooltip' data-placement='bottom' title='Read'"); ?>
                                        </div>
                                    </form>
                                    <table class="table table-striped table-dark">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>ID</th>
                                                <th>Gender</th>
                                                <th>Client's Name</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbody">
                                            <?php
                                            if (isset($_POST['read'])) {
                                                $result = getClientList();
                                                if ($result) {

                                                    while ($row = mysqli_fetch_assoc($result)) { ?>
                                                        <tr>
                                                            <td data-id="<?php echo $row['client_id']; ?>"><?php echo $row['client_id']; ?></td>
                                                            <td data-id="<?php echo $row['client_id']; ?>">
                                                                <?php $gender = $row['gender'];
                                                                if ($gender == 'F') {
                                                                ?><span><i class="fa fa-female fa-3x" style="color:#FF19B3" aria-hidden="true"></i></span><?php
                                                                                                                                                        } else {
                                                                                                                                                            ?><span><i class="fa fa-male fa-3x" style="color:#1966FF" aria-hidden="true"></i></span><?php
                                                                                                                                                                                                                                                } ?></td>
                                                            <td data-id="<?php echo $row['client_id']; ?>"><?php echo $row['first_name'] . '&nbsp' . $row['last_name']; ?></td>
                                                            <td>
                                                                <form action="" method="post" class="w-100">
                                                                    <input type="hidden" name="client_id" value="<?php echo $row['client_id']; ?>" />
                                                                    <?php buttonElement("btn-suggest", "btn btn-primary", "<i class='fa fa-users'></i> Suggest", "suggest", "data-toggle='tooltip' data-placement='bottom' title='Suggest As Friends'"); ?>
                                                                </form>
                                                        </tr>

                                            <?php
                                                    }
                                                }
                                            }


                                            ?>
                                        </tbody>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="well">
                                <div>
                                    <?php
                                    $name = " ";
                                    $client_id = " ";
                                    if (isset($_POST['client_id'])) {
                                        $name = getName($_POST['client_id']);
                                        $client_id = $_POST['client_id'];
                                    }
                                    ?>
                                    <h3 align="center">Possible Friendships with <?php echo $name ?></h3>

                                    <table class="table table-striped table-dark">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>ID</th>
                                                <th>Gender</th>
                                                <th>Friend</th>
                                                <th>Reason</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbody">
                                            <?php
                                            if (isset($_POST['suggest'])) {
                                                $result = matchFriendship($_POST['client_id']);
                                                if ($result) {

                                                    while ($row = mysqli_fetch_assoc($result)) { ?>
                                                        <tr>
                                                            <td data-id="<?php echo $row['Friend_ID']; ?>"><?php echo $row['Friend_ID']; ?></td>
                                                            <td data-id="<?php echo $row['Friend_ID']; ?>">
                                                                <?php $gender = $row['gender'];
                                                                if ($gender == 'F') {
                                                                ?><span><i class="fa fa-female fa-3x" style="color:#FF19B3" aria-hidden="true"></i></span><?php
                                                                                                                                                        } else {
                                                                                                                                                            ?><span><i class="fa fa-male fa-3x" style="color:#1966FF" aria-hidden="true"></i></span><?php
                                                                                                                                                                                                                                                } ?></td>
                                                            <td data-id="<?php echo $row['Friend_ID']; ?>"><?php echo $row['Friends']; ?></td>
                                                            <td data-id="<?php echo $row['Friend_ID']; ?>"><?php echo $row['Why Need to be Friend']; ?></td>
                                                            <td><?php buttonElement("btn-match", "btn btn-primary", "<i class='fa fa-heart'></i> Match", "match", "data-toggle='tooltip' data-placement='bottom' title='Match Friend'"); ?></td>
                                                        </tr>

                                            <?php
                                                    }
                                                }
                                            }
                                            ?>
                                        </tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include("include/js.php"); ?>
    </main>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="./displayFriendship.js"></script>
</body>

</html>