<?php
abstract class User {
    protected $name;
    protected $email;
    protected $password;
    protected $user_id;
    protected $restaurant_id;
    protected $branch_id;
    protected $phone_number;
    protected $profile_picture;
    protected $hourly_rate = null;
    protected $type_id;

    public function __construct($name, $email, $password, $user_id, $restaurant_id) {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->user_id = $user_id;
        $this->restaurant_id = $restaurant_id;
    }

    public function setType($type_id) {
        $this->type_id = $type_id;
    }

    abstract public function getRole(): string;
}

class Owner extends User {
    public function __construct($name, $email, $password, $user_id, $restaurant_id) {
        parent::__construct($name, $email, $password, $user_id, $restaurant_id);
        $this->type_id = 1;
    }

    public function getRole(): string {
        return $this->type_id;
    }
}

class Manager extends User {
    public function __construct($name, $email, $password, $user_id, $restaurant_id, $hourly_rate) {
        parent::__construct($name, $email, $password, $user_id, $restaurant_id);
        $this->type_id = 2;
        $this->hourly_rate = $hourly_rate;
    }

    public function getRole(): string {
        return $this->type_id;
    }
}


class Cashier extends User {
    public function __construct($name, $email, $password, $user_id, $restaurant_id, $hourly_rate) {
        parent::__construct($name, $email, $password, $user_id, $restaurant_id);
        $this->type_id = 3;
        $this->hourly_rate = $hourly_rate;
    }

    public function getRole(): string {
        return $this->type_id;
    }
}

class Other extends User {
    public function __construct($name, $email, $password, $user_id, $restaurant_id, $hourly_rate) {
        parent::__construct($name, $email, $password, $user_id, $restaurant_id);
        $this->type_id = 4;
        $this->hourly_rate = $hourly_rate;
    }

    public function getRole(): string {
        return $this->type_id;
    }
}

