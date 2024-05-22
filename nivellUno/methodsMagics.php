<?php

    class Notification {
        protected $read = false;
        public function checkAsRead(){
            $this ->read = true;
        }
        public function isRead() {
            return $this ->read == true;
        }
    }

    class Thread{
        protected  $id;
        protected $text;
        protected $notification;
       
        public function __construct($id, $text, Notification $notification)
        {
            $this-> id = $id;
            $this-> text = $text;
            $this-> notification = $notification;
        }

        public function __get($property){
            if(property_exists($this, $property)){
                return $this->$property;
            }
        }

        public function  __call($method, $parameters){
            if(method_exists($this->notification, $method)) {
                return call_user_func_array(array($this->notification, $method), $parameters);
            }
        }

        public function __toString(){
            return "Usuário de iD: ".$this->id." Mensage: ".$this->text;
        }
        public function __clone()
        {
            $this->notification = clone $this->notification;
        }
    }

    $menssage = new Thread(25, "Hola soy una mensage", new Notification);
    $menssage2= new Thread(12, "¡Buenos Tardes!", new Notification);
    echo $menssage;
    echo "<br/>";
    echo $menssage2;
    echo "<br/>";
    $menssage3 = clone $menssage;

    $menssage -> checkAsRead();
    $menssage2->checkAsRead();
    var_dump($menssage->isRead());
    echo"<br/>";
    var_dump($menssage2->isRead());
    echo"<br/>";
    var_dump($menssage3->isRead());
   
?>