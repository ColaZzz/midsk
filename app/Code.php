<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    protected $table = 'Code';

    public function checkCode($code)
    {
        $count = $this->where('code',$code)->count();
        if($count >= 1){
            return true;
        }else{
            return false;
        }
    }
}
