<?php
class Department {
    public $id;
    public $name;
    public $andress;
    public $phone;
    public $email;

function __construct($id, $name){

    $this->id = $_id;
    $this->name = $_name;
    
}

function setContactasArray() {
    return [
        "indirizzo" => $this->address,
        "telefono" => $this->phone
    ]
}

}
