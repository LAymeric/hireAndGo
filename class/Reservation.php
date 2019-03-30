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

        public function __construct($d, $t, $da,$dp,$dc,$aa,$ap,$ac){
            $this->reservation_date=$d;
            $this->reservation_time=$t;
            $this->departure_address=$da;
            $this->departure_postal_code=$dp;
            $this->departure_city=$dc;
            $this->arrival_address=$aa;
            $this->arrival_postal_code=$ap;
            $this->arrival_city=$ac;
        }


        public function addReservation($reservation_date, $reservation_time, $departure_address, $departure_postal_code,$departure_city,$arrival_address,$arrival_postal_code,$arrival_city){      
            include_once "../functions.php";
            $connection = connectDB();  

            $insertReservation = $connection->prepare("INSERT INTO reservation (reservation_date, reservation_time, departure_address, departure_postal_code, departure_city, arrival_address, arrival_postal_code, arrival_city) 
                VALUES(:reservation_date,:reservation_time,:departure_address,:departure_postal_code,:departure_city,:arrival_address,:arrival_postal_code,:arrival_city)");
            $insertReservation->execute(array
                                    ("reservation_date"=> $reservation_date,
                                     "reservation_time"=>$reservation_time,
                                     "departure_address"=>$departure_address,
                                     "departure_postal_code"=>$departure_postal_code,
                                     "departure_city"=>$departure_city,
                                     "arrival_address"=>$arrival_address,
                                     "arrival_postal_code"=>$arrival_postal_code,
                                     "arrival_city"=>$arrival_city
                                    ));
        }
    }
?>