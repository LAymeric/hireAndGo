<?php

    class USER{
        private $email;
        private $pwd;
        private $name;
        private $firstname;
        private $birthday;
        private $postalCode;
        private $city;
        private $country;
        private $address;
        private $phone;
        private $registration_date;

        public function __construct($e, $p,$n,$f,$b,$postal,$c,$country,$a,$phone,$registration_date){
            $this->email=$e;
            $this->pwd=$p;
            $this->name=$a;
            $this->firstname=$f;
            $this->birthday=$b;
            $this->postalCode=$postal;
            $this->city=$c;
            $this->country=$country;
            $this->address=$a;
            $this->phone=$phone;
            $this->registration_date = $registration_date;

        }


        public function addUser($newEmail, $newPassword, $name,$firstname,$birthday,$postalCode,$city,$country,$address,$phone,$registration_date){
            include_once "../functions.php";         
            $connection = connectDB();

            $insertUser = $connection->prepare("INSERT INTO member (email, pwd, name,firstname,birthday,postalCode,city,country,address,phone,registration_date) VALUES(:email,:pwd,:name,:firstname,:birthday,:postalCode,:city,:country,:address,:phone,:registration_date)");
            $insertUser ->execute(array
                                    ("email"=> $newEmail,
                                     "pwd"=>$newPassword,
                                     "name"=>$name,
                                     "firstname"=>$firstname,
                                     "birthday"=>$birthday,
                                     "postalCode"=>$postalCode,
                                     "city"=>$city,
                                     "country"=>$country,
                                     "address"=>$address,
                                     "phone"=>$phone,
                                     "registration_date"=>$registration_date
                                    ));

            header('Location: ../login.php');
        }
    }
