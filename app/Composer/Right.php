<?php
namespace App\Composer;

use App\Series;
use DB;

class Right{
    public function getList()
    {
        $cates = DB::table('series')
                        ->leftJoin('categorys', 'series.id', '=', 'categorys.series_id')
                        ->select('series.id as sid','series.name as sname','categorys.id','categorys.name')
                        ->get();

        $result = array();
        foreach ($cates as $data) {
            $id = $data->sid;
            if (isset($result[$id])) {
                $result[$id][] = $data;
            } else {
                $result[$id] = array($data);
            }
        }
        //debug($result);
        return $result;
    }
}