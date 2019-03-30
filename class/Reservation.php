<?php

    class Reservation{
        private $reservation_date;
        private $reservation_time;
        private $departure_address;
        private $departure_postal_code;
        private $departure_city;
        private $arrival_address;
        private $arrival_postal_code;
        private $arrival_city;

        public function __construct($reservation_date, $reservation_time, $departure_address, $departure_postal_code,
                                    $departure_city, $arrival_address, $arrival_postal_code, $arrival_city){
            $this->reservation_date=$reservation_date;
            $this->reservation_time=$reservation_time;
            $this->departure_address=$departure_address;
            $this->departure_postal_code=$departure_postal_code;
            $this->departure_city=$departure_city;
            $this->arrival_address=$arrival_address;
            $this->arrival_postal_code=$arrival_postal_code;
            $this->arrival_city=$arrival_city;
        }


        public function addReservation(){
            include_once "../functions.php";
            $connection = connectDB();  

            $insertReservation = $connection->prepare("INSERT INTO reservation (reservation_date, reservation_time, departure_address, departure_postal_code, departure_city, arrival_address, arrival_postal_code, arrival_city) 
                VALUES(:reservation_date,:reservation_time,:departure_address,:departure_postal_code,:departure_city,:arrival_address,:arrival_postal_code,:arrival_city)");
            $insertReservation->execute(array
                                    ("reservation_date"=> $this->reservation_date,
                                     "reservation_time"=>$this->reservation_time,
                                     "departure_address"=>$this->departure_address,
                                     "departure_postal_code"=>$this->departure_postal_code,
                                     "departure_city"=>$this->departure_city,
                                     "arrival_address"=>$this->arrival_address,
                                     "arrival_postal_code"=>$this->arrival_postal_code,
                                     "arrival_city"=>$this->arrival_city,
                                    ));
        }
    }
?>