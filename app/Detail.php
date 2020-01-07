<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $table = 'Detail';
    
    public function isRepeat($poundlist)
    {
        $count = $this->where('poundlist',$poundlist)->count();
        if($count >= 1) return true;
        else return false;
    }

    public function getDetails($limit)
    {
        return $this->orderBy('id', 'desc')->limit($limit)->get();
    }
}
