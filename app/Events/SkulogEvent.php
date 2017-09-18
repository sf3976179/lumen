<?php

namespace App\Events;

use App\Models\Item;

class SkulogEvent extends Event
{

    protected $type;        //操作类型

    protected $skunewlog;   //旧数据

    protected $skuoldlog;      //新数据

    protected $table;      //事件类型

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($type,$skunewlog,$skuoldlog,$table)
    {
        $this -> tyep = $type;
        $this -> skuoldlog = $skuoldlog;
        $this -> skunewlog = $skunewlog;
        $this -> table = $table;

    }

    public function getType(){

        return $this -> tyep;
    }

    public function getSkuoldlog(){

        return $this -> skuoldlog;
    }

    public function getSkunewlog(){

        return $this -> skunewlog;
    }

    public function getTable(){

        return $this -> table;
    }
}
