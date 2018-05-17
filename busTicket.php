<?php

class BusTicket {
   protected $connection;

    public function __construct() {
        $host_name = 'localhost';
        $user_name = 'root';
        $password = '';
        $db_name = 'db_bus_ticket';
        $this->connection = mysqli_connect($host_name, $user_name, $password, $db_name);

        if (!$this->connection) {
            die('Connection Fail' . mysqli_error($this->connection));
        }
    }
    
    public function book_ticket($data){
        $sql = "INSERT INTO  tbl_ticket (passenger_name, passenger_contact, date, time, seat_no) "
                . "VALUES('$data[passenger_name]', '$data[passenger_contact]', '$data[date]', '$data[time]', '$data[seat_no]')";

        if (mysqli_query($this->connection, $sql)) {
            $message = "You Booked ".$data['seat_no']." Succesfully";
            return $message;
        } else {
            die('Query problem' . mysqli_error($this->connection));
        }
    }
    
    public function view_booked_info() {
        $sql = "SELECT * FROM tbl_ticket ORDER BY date ASC ";

        if (mysqli_query($this->connection, $sql)) {
            $query_result = mysqli_query($this->connection, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->connection));
        }
    }
    
     public function select_info_by_id($id) {
        $sql = "SELECT * FROM tbl_ticket WHERE passenger_id = '$id'";

        if (mysqli_query($this->connection, $sql)) {
            $query_result = mysqli_query($this->connection, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->connection));
        }
    }
    
     public function delete_info($id) {
        $sql = "DELETE FROM tbl_ticket WHERE passenger_id = '$id'";

        if (mysqli_query($this->connection, $sql)) {
//            $message = 'Passenger Info deleted Successfully';
//            return $message;
        } else {
            die('Query problem' . mysqli_error($this->connection));
        }
    }
}
