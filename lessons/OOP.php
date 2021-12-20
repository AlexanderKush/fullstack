<?php

class Car {

    protected $brand;
    protected $model;
    protected $year;
    protected $mileage;
    private $noAccess;

    public function __construct ($b, $m, $y, $mileage = 0) {
      $this->brand = $b;
      $this->model = $m;
      $this->year = $y;
      $this->mileage = $mileage;
      $this->noAccess = true;
    }

    public function drive () {
        echo "$this->brand $this->model ($this->year, $this->mileage) drivig<br>";
    }

    public function addMilage ($mileage) {
      $error = false;
      if ($mileage > 0) {
        $this->mileage += $mileage;
      } else {
        $error = true;
      }
      return [
        'error' => $error,
        'mileage' => $this->mileage
      ];
    }

    private function showNoAcces () {
      echo $this->noAccess;
    }

}

class ElectroCar extends Car {

  public $electroCar;

  public function __construct ($b, $m, $y, $mileage = 0) {
    $this->electroCar = true;
    parent:: __construct ($b, $m, $y, $mileage);
  }

  public function drive () {
    echo "Electrocar $this->brand $this->model ($this->year, $this->mileage) drivig<br>";
  }

  public function parentDrive() {
    parent:: drive();
  }

}

$audi = new Car('Audi', 'Q5', 2021);
$vesta = new Car('Lada', 'Vesta', 2020, 15000);

//echo $vesta->mileage;

$audi->drive();
$vesta->drive();

$currentAudiMileage = $audi->addMilage(2000);
echo $currentAudiMileage['mileage'] . '<br>';

$res = $vesta->addMilage(-10000);
if ($res['error']) {
  echo 'Не удалось увеличить пробег';
} else {
  echo "Пробег увеличен. Текущий пробег {$res['mileage']} <br>";
}

echo '<br>';

$res = $vesta->addMilage(1000);
if ($res['error']) {
  echo 'Не удалось увеличить пробег';
} else {
  echo "Пробег увеличен. Текущий пробег {$res['mileage']} <br>";
}

$audi->drive();
$vesta->drive();

$tesla = new ElectroCar('Tesla', 'Model S', 2021);
$tesla->drive();
$tesla->parentDrive();
// $tesla->showAccess();