<?php
    class User{
        public function data() {
            var_dump(__CLASS__);
        }
    }

    (new User) ->data();
?>