<?php

class CI_Object{
    
    public function __get($key){
        return get_instance()->$key;
    }


}