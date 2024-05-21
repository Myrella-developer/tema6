<?php
    class Car{
        public function myValue() {
            return __CLASS__;
        }
    }

    $volvo = new Car();
    echo $volvo->myValue();
    echo "<br/>";
    echo "La classe Car fue creada en lo directorio: ".(__DIR__);

?>