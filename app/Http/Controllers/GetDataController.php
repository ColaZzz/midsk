<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Detail;
use App\Code;

class GetDataController extends Controller
{
    public function index(Request $request)
    {
        try {
            $data = $request->data;
            $code = $request->code;
            $arr = json_decode($data,true);
            $c = new Code;
            $is_chk = $c->checkCode($code);
            $i = $j = 0;
            if($is_chk){
                foreach($arr as $a){
                    $detail = new Detail;
                    if($detail->isRepeat($a['BFDJ_DJBH'])) {
                        $j+=1;
                        continue;
                    }
                    $detail->company = $a['BFDJ_DWMC'];
                    $detail->poundlist = $a['BFDJ_DJBH'];
                    $detail->outdate = $a['BFDJ_DJRQ'];
                    $detail->carnum = $a['BFDJ_CPH'];
                    $detail->product = $a['BFDJ_WLMC'];
                    $detail->package = $a['BFDJ_C5'];
                    $detail->weight = $a['JZ'];
                    $detail->save();
                    $i+=1;
                }
                return '成功写入'.$i.'条；已存在'.$j.'条；';
            }else{
                return '确认码错误';
            }
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function getTop(Request $request)
    {
        try {
            $detail = new Detail;
            $c = new Code;
            $code = $request->code;
            $limit = $request->limit;
            $is_chk = $c->checkCode($code);
            if($is_chk){
                $arr = $detail->getDetails($limit);
                return json_encode($arr);
            }else{
                return '确认码错误';
            }
        } catch (\Exception $e) {
            return $e;
        }
    }
}
