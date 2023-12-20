<?php
interface Go {
    function forward();
}
class Car implements Go 
{
    private $model, $color;

    public function __construct($model = '', $color = '')
    {
        if ($model)
            $this->model = $model;
        if ($color)
            $this->color = $color;
    }

    public function carInfo()
    {
        echo $this->model . "<br />";
        echo $this->color . "<br />";

        try {
            $a = 5;
            $b = 0;
            $result = $a / $b;
        }
        catch (DivisionByZeroError $e) {
            echo "Деление на ноль<br>";
        }
    }

    function getModel()
    {
        return $this->model;
    }

    public function getColor()
    {
        return $this->color;
    }

    function setModel($newModel)
    {
        $this->model = $newModel;
    }

    public function setColor($newColor)
    {
        $this->color = $newColor;
    }

    function __destruct()
    {
        print("Вызван деструктор<br />");
    }

    public function forward() {
        echo "Поехали<br>";
    }
}

class Rasing extends Car
{
    public function __construct($model = '', $color = '')
    {
        parent::__construct($model, $color);
    }

    public function carInfo()
    {
        echo "<b>" . parent::getModel() . "</b><br />";
        echo "<b>" . parent::getColor() . "</b><br />";
    }
}

$car = new Car("Rasing", "Green");

$car->carInfo();
$car->forward();
if($car instanceof Car) print('Объект класса Car</br>');
?>