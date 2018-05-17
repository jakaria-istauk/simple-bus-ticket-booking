<?php
$message = '';
require_once './busTicket.php';
$busTicket = new BusTicket();
if (isset($_POST['book'])) {
    $message = $busTicket->book_ticket($_POST);
}
$bookedSeat = $busTicket->view_booked_info();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>On Line Bus Ticket</title>
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
            <h2 class="text-success text-center"><?php echo $message; ?></h2>
            <div class="row">
                <div class="col-sm-offset-1 col-sm-6">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="name">Passenger Name:</label>
                            <input type="text" name="passenger_name" class="form-control" id="name" placeholder="Passenger Name" onkeyup="latterCheck(this)" required>
                        </div>
                        <div class="form-group">
                            <label for="Contact">Passenger Contact:</label>
                            <input type="text" name="passenger_contact" class="form-control" id="Contact" placeholder="Passenger Contact" onkeyup="numberCheck(this)" required>
                        </div>
                        <div class="form-group">
                            <label for="Contact">Journey Date:</label>
                            <input type="date" name="date" class="form-control" id="Contact" required>
                        </div> 
                        <div class="form-group">
                            <label for="time">Select Your Time:</label>
                            <select class="form-control" name="time" id="time" required>
                                <option><--Select Bus Time--></option>
                                <option value="07.30 AM">07.30 AM</option>
                                <option value="08.30 AM">08.30 AM</option>
                                <option value="09.30 AM">09.30 AM</option>
                            </select>
                        </div>
                        <div class="col-sm-6 col-sm-offset-3">
                            <h4 class="text-center">Select Your Seat</h4>
                            <label class="radio-inline">
                                <input type="radio" name="seat_no" value="A1">A1
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="seat_no" value="A2">A2
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="seat_no" value="A3">A3
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="seat_no" value="A4">A4
                            </label>
                            <br>
                            <label class="radio-inline">
                                <input type="radio" name="seat_no" value="B1">B1
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="seat_no" value="B2">B2
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="seat_no" value="B3">B3
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="seat_no" value="B4">B4
                            </label>
                            <br>
                            <label class="radio-inline">
                                <input type="radio" name="seat_no" value="C1">C1
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="seat_no" value="C2">C2
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="seat_no" value="C3">C3
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="seat_no" value="C4">C4
                            </label>
                        </div>
                        <button type="submit" name="book" class="btn btn-default btn-primary btn-lg">Book Now</button>
                    </form>
                </div>
                <div class="col-sm-4 col-sm-offset-1">
                    <table class="table text-center">
                        <h1>Booked Seat List<br><small>Thease Seat is not available</small></h1>

                        <ul class="list-group">
                            <?php while ($view = mysqli_fetch_assoc($bookedSeat)) {
                                ?>
                                <li class="list-group-item"><button class="btn btn-info"><?php echo $view['seat_no']; ?></button> at <span><?php echo $view['time'] . ", " . $view['date']; ?></span> </li>

                            <?php } ?>
                        </ul> 
                    </table>
                </div>
            </div>
        </div>

        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
