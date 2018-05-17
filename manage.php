<?php 
$message = '';
require_once './busTicket.php';
$busTicket = new BusTicket();
if (isset($_POST['book'])) {
    $message = $busTicket->book_ticket($_POST);
}
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $message = $busTicket->delete_info($id);
}
$query_result = $busTicket->view_booked_info();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>On Line Ticket</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.css" type="text/css" rel="stylesheet">
        <link href="css/font-awesome.min.css" type="text/css" rel="stylesheet">
        <link href="css/log_style.css" type="text/css" rel="stylesheet">
        <script type='text/javascript'>
            function latterCheck(input) {
                var regrex = /[^a-z ]/gi;
                input.value = input.value.replace(regrex, "");
            }
            function numberCheck(input) {
                var regrex = /[^0-9]/gi;
                input.value = input.value.replace(regrex, "");
            }
        </script>
    </head>
    <body>
        <div class="container-fluid text-center">
            <div class="well">
                <h1>Online Bus Ticket</h1>
                <small><a class="btn btn-default" href="index.php">Home</a> | <a class="btn btn-default" href="manage.php">Manage</a></small>
            </div>

        </div>
        <div class="container">
            <h2 class="text-success text-center"><?php echo $message;     ?></h2>
            <div class="row">
                <div class="col-sm-12">
                    <div class="well">
                        <table class="table table-bordered table-hover">
                            <tr>
                                <th class="column1">S/n</th>
                                    <th class="column1">Passenger</th>
                                    <th class="column">Contact</th>
                                    <th class="column">Travel Date</th>
                                    <th class="column">Travel Time</th>
                                    <th class="column">Seat Number</th>
                                    <th class="column">Action</th>
                            </tr>
                            <?php $sl = 1;
                                while ($view = mysqli_fetch_assoc($query_result)) {
                                ?>
                                <tr>
                                    <td class="column"><?php echo $sl++; ?></td>
                                        <td class="column"><?php echo $view['passenger_name']; ?></td>
                                        <td class="column"><?php echo $view['passenger_contact']; ?></td>
                                        <td class="column"><?php echo $view['date']; ?></td>
                                        <td class="column"><?php echo $view['time']; ?></td>
                                        <td class="column"><?php echo $view['seat_no']; ?></td>
                                    <td>
                                        <a href="?delete=<?php echo $view['passenger_id']; ?>" class="btn btn-danger" title="Delete" onclick="return checkDelete();">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
