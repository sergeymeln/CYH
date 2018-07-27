<?php


namespace CYH\Marketing\Helpers;


class WPDBDataTransformer
{
    public function transformCitiesData($fromDb)
    {
        $prepared = new \stdClass();
        if(count($fromDb)>0) {
            foreach($fromDb as $item) {
                foreach ($item as $prop=> $value) {
                    if($prop == 'content') {
                        $prepared->bullets[] = $value;
                    } else {
                        $prepared->$prop = $value;
                    }
                }
            }
        }

        return $prepared;
    }
}