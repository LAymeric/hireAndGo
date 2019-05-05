
<?php

require_once __DIR__."./../functions.php";

    class USER{
        private $id;
        private $email;
        private $pwd;
        private $lastname;
        private $firstname;
        private $birthday;
        private $postal_code;
        private $city;
        private $country;
        private $address;
        private $phone;
        private $registration_date;
        private $picture;
        private $isPremium;
        private $registrations = "";
        private $type = "FRONT";

        public function __get($property) {
            if('lastname' === $property) {
                return $this->lastname;
            } else if('email' === $property) {
                return $this->email;
            } else if('pwd' === $property) {
                return $this->pwd;
            } else if('firstname' === $property) {
                return $this->firstname;
            } else if('birthday' === $property) {
                return $this->birthday;
            } else if('postal_code' === $property) {
                return $this->postal_code;
            } else if('city' === $property) {
                return $this->city;
            } else if('country' === $property) {
                return $this->country;
            } else if('address' === $property) {
                return $this->address;
            } else if('phone' === $property) {
                return $this->phone;
            } else if('registration_date' === $property) {
                return $this->registration_date;
            } else if('type' === $property) {
                return $this->type;
            } else if('id' === $property) {
                return $this->id;
            }  else if('registrations' === $property) {
                return $this->registrations;
            }  else if('picture' === $property) {
                return $this->picture;
            }  else if('isPremium' === $property) {
                return $this->isPremium;
            } else {
                   echo "ERROR ".$property;
                //throw new Exception('Propriété invalide !');
            }
        }

        public function __construct(){

                $ctp = func_num_args();
                $args = func_get_args();
                switch($ctp)
                {
                    case 1:
                        $this->fonction1($args[0]);
                        break;
                    case 11:
                        $this->fonction11($args[0],$args[1],$args[2],$args[3],$args[4],$args[5],$args[6],$args[7],$args[8],$args[9],$args[10]);
                        break;
                    default:
                        break;
                }
        }

        private function fonction11($e, $p,$n,$f,$b,$postal,$c,$country,$a,$phone,$registration_date){
            $this->email=$e;
            $this->pwd=$p;
            $this->lastname=$a;
            $this->firstname=$f;
            $this->birthday=$b;
            $this->postal_code=$postal;
            $this->city=$c;
            $this->country=$country;
            $this->address=$a;
            $this->phone=$phone;
            $this->registration_date = $registration_date;
            $this->registrations = "";
        }

        private function fonction1($id){
            $this->id=$id;
        }

        public function addUser($newEmail, $newPassword, $name,$firstname,$birthday,$postalCode,$city,$country,$address,$phone,$registration_date){
            $connection = connectDB();

            $insertUser = $connection->prepare("INSERT INTO user (email, password, lastname,firstname,birthdate,postal_code,city,country,address,phone,registration_date,type) VALUES(:email,:pwd,:name,:firstname,:birthday,:postalCode,:city,:country,:address,:phone,:registration_date,:type)");
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
                                     "registration_date"=>$registration_date,
                                     "type"=>$this->type
                                    ));

            header('Location: ../login.php');
        }

        public function selectUser($id){
            $connection = connectDB();
            if (!isConnected()) {
                header("Location: login.php");
            } else {
                $query = $connection->prepare(
                "SELECT id,email, lastname,firstname,birthdate,postal_code,city,country,address,phone,type, picture, is_premium
                FROM user
                WHERE id=" . $id
                );
            }

            $result = $query->execute();
            $row = $query->fetch(PDO::FETCH_BOTH);
            $this->email=$row['email'];
            $this->lastname=$row['lastname'];
            $this->firstname=$row['firstname'];
            $this->birthday=$row['birthdate'];
            $this->postal_code=$row['postal_code'];
            $this->city=$row['city'];
            $this->country=$row['country'];
            $this->address=$row['address'];
            $this->phone=$row['phone'];
            $this->type=$row['type'];
            $this->isPremium=$row['is_premium'];
            $this->id=$row['id'];
            $this->picture=$row['picture'];
        }

        public function fetchMySubscription(){
            $connection = connectDB();
            if (!isConnected()) {
                header("Location: login.php");
            } else {
                $query = $connection->prepare(
                "SELECT subscription.name, subscription.description, subscription.price, user.id as userId, subscription.id as subscriptionId
                FROM subscription, asso_subscription_user, user
                WHERE subscription.id=asso_subscription_user.id_subscription
                AND user.id=asso_subscription_user.id_user
                AND user.id=".$this->id
                );
            }

            $result = $query->execute();
            $mySubscriptions = [];
            while ($row = $query->fetch())
            {
                $mySubscriptions[]=$row;
            }

            $query->closeCursor();
            return $mySubscriptions;
        }
         public function cancelSubscription($subscriptionId){
            $connection = connectDB();
            $deleteSubscription = $connection->prepare("DELETE FROM asso_subscription_user
            WHERE id_subscription=".$subscriptionId." AND id_user=".$this->id );
            $deleteSubscription->execute();
         }
         public function addSubscription($subscriptionId){
            $connection = connectDB();
            $deleteSubscription = $connection->prepare("INSERT INTO asso_subscription_user (id_subscription, id_user) VALUES(".$subscriptionId.", ".$this->id.") ");
            $deleteSubscription->execute();
         }

        public function fetchOtherSubscriptions(){
            $connection = connectDB();
            if (!isConnected()) {
                header("Location: login.php");
            } else {
                $query = $connection->prepare(
                "SELECT subscription.name, subscription.description, subscription.price, subscription.id as subscriptionId
                FROM subscription");
            }

            $result = $query->execute();
            $availableSubscriptions = [];
            while ($row = $query->fetch())
            {
                $availableSubscriptions[]=$row;
            }

            $query->closeCursor();
            return $availableSubscriptions;
        }

        public function getReservations($id){
            $connection = connectDB();
            if (!isConnected()) {
                header("Location: login.php");
            } else {
                $query = $connection->prepare(
                "SELECT command.id, command.start_time, command.start, command.end, command.duration, command.distance, command.status
                FROM command
                WHERE command.id_user_front=" . $id
                );
            }

            $result = $query->execute();
            $this->registrations = [];
            while ($row = $query->fetch())
            {
            	$this->registrations[]=$row;
            }
            $query->closeCursor();
        }

        public function deleteUser($id){
            $connection = connectDB();

            $deleteUser = $connection->prepare("DELETE FROM user WHERE id = ".$id);
            $deleteUser->execute();
        }

        public function modifyRigths($id, $type){
            $connection = connectDB();

            $user = $connection->prepare("UPDATE user SET type = :type WHERE id=".$id);
            $user->execute(array(
                "type"=>$type
            ));
        }
       public function savePicture($image){
            $connection = connectDB();

            $user = $connection->prepare("UPDATE user SET picture = :picture WHERE id= :id");
            $user->execute(array(
                "picture"=>$image,
                "id"=>$this->id
            ));
        }
}
