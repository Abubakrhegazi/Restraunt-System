<?php
require_once(__DIR__ . "/Model.php");
abstract class User extends Model
{
    protected $name;
    protected $email;
    protected $password;
    protected $user_id;
    protected $restaurant_id;
    protected $branch_id;
    protected $phone_number;
    protected $profile_picture;
    protected $hourly_rate = null;

    public function __construct(
        $user_id=null,
        $name="",
        $email="",
        $password="",
        $restaurant_id=null,
        $branch_id=null,
        $phone_number=null,
        $profile_picture=null
    ) {
        if($user_id){
            $this->readUser($user_id);
          }else{
            $this->name = $name;
            $this->email = $email;
            $this->password = $password;
            $this->user_id = $user_id;
            $this->restaurant_id = $restaurant_id;
            $this->branch_id = $branch_id;
            $this->phone_number = $phone_number;
            $this->profile_picture = $profile_picture;
          }
    }

    function readUser($id)
    {
        $sql = "SELECT * FROM user where ID=" . $id;
        $db = $this->connect();
        $result = $db->query($sql);

        if ($result) {

            $row = $db->fetchRow();
            $_SESSION["name"] = $row["name"];

            $this->name = $row["name"];
            $this->email = $row["email"];
            $this->password = $row["password"];
            $this->user_id = $row["user_id"];
            $this->restaurant_id = $row["resturant_id"];
            $this->branch_id = $row["branch_id"];
            $this->phone_number = $row["phone_Number"];
            $this->profile_picture = $row["profile_picture"];
            $this->hourly_rate = $this->hourly_rate ?? $row["hourly_rate"];
        } else {
            echo "user doesn't exist";
        }
    }

    function editUser($name, $password, $phone_number, $profile_picture, $hourly_rate, $type_id)
    {
        $name = $name ?: $this->name;
        $password = $password ?: $this->password;
        $phone_number = $phone_number ?: $this->phone_number;
        $profile_picture = $profile_picture ?: $this->profile_picture;
        $hourly_rate = $hourly_rate ?: $this->hourly_rate;
        $type_id = $type_id ?: $this->getRole();

        $db = $this->connect();

        $sql = "UPDATE user SET name = '$name', password = '$password',
                phone_number = '$phone_number', profile_picture = '$profile_picture', 
                hourly_rate = $hourly_rate, type_id = $type_id WHERE ID = $this->user_id";

        if ($db->query($sql) === true) {
            echo "updated successfully.";
            $this->readUser($this->user_id);
        } else {
            echo "ERROR: Could not able to execute $sql. " . $this->conn->error;
        }
    }

    function deleteUser()
    {
        $sql = "delete from user where id=$this->user_id";

        $db = $this->connect();


        if ($db->query($sql) === true) {
            echo "deleted successfully.";
        } else {
            echo "ERROR: Could not able to execute $sql. " . $this->conn->error;
        }
    }

    abstract public function getRole(): int;
}

class Owner extends User
{
    public function getRole(): int
    {
        return 1;
    }
}

class Manager extends User
{
    public function setHourlyRate($rate)
    {
        $this->hourly_rate = $rate;
    }

    public function getHourlyRate()
    {
        return $this->hourly_rate;
    }

    public function getRole(): int
    {
        return 2;
    }
}


class Cashier extends User
{
    public function setHourlyRate($rate)
    {
        $this->hourly_rate = $rate;
    }

    public function getHourlyRate()
    {
        return $this->hourly_rate;
    }

    public function getRole(): int
    {
        return 3;
    }
}

class Other extends User
{
    public function setHourlyRate($rate)
    {
        $this->hourly_rate = $rate;
    }

    public function getHourlyRate()
    {
        return $this->hourly_rate;
    }

    public function getRole(): int
    {
        return 4;
    }
}

class userFactory
{
    public static function create(
        $type,
        $name,
        $email,
        $password,
        $user_id,
        $restaurant_id,
        $branch_id,
        $phone_number,
        $profile_picture
    ) {
        switch ($type) {
            case 1:
                return new Owner($user_id, $name, $email, $password, $restaurant_id, $branch_id, $phone_number, $profile_picture);
            case 2:
                return new Manager($user_id, $name, $email, $password, $restaurant_id, $branch_id, $phone_number, $profile_picture);
            case 3:
                return new Cashier($user_id, $name, $email, $password, $restaurant_id, $branch_id, $phone_number, $profile_picture);
            case 4:
                return new Other($user_id, $name, $email, $password, $restaurant_id, $branch_id, $phone_number, $profile_picture);
            default:
                throw new Exception("Invalid user type: $type. Valid types are 1 (Owner), 2 (Manager), 3 (Cashier), 4 (Other).");
        }
    }
}
