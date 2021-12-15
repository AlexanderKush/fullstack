<?php

class Car {

    protected $brand;
    protected $model;
    protected $year;

    public function __construct ($b, $m, $y) {
      $this->brand = $b;
      $this->model = $m;
      $this->year = $y;  
    }

    public function drive () {
        echo "$this->brand $this->model ($this->year) drivig<br>";
    }

}

$audi = new Car('Audi', 'Q5', 2021);
$vesta = new Car('Lada', 'Vesta', 2020);

// echo $vesta->year;

$audi->drive();
$vesta->drive();