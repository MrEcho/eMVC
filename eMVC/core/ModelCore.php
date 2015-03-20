<?php

namespace eMVC\core;


class ModelCore {


    public function __get($key)
    {
        return ControllerCore::get_instance()->$key;
    }

}