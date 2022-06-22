<?php
class Department {
    public $id;
    public $name;
    public $andress;
    public $phone;
    public $email;
    public $website;
    public $head_of_department;

function __construct($id, $name){

    $this->id = $_id;
    $this->name = $_name;
    
}

public function setContactasArray($_address, $_phone, $_email, $_website) {
 $this->adress= $_address;
 $this->phone = $_phone;
 $this->email = $_email;
 $this->website = $_website;
}

public function printContactsAsArray() {
    return [
        "indirizzo" => $this->address,
        "telefono" => $this->phone,
        "email" => $this->email,
        "website" => $this->website
    ];
}

}
