<?php

if(!function_exists('helperTest')){
    function helperTest(){
        return 'działam';
    }
}
if(!function_exists('filterParametersCollection')){
    function filterParametersCollection($property, $class){
        if($property == null){
            $temp = [];
            foreach($class::select('id')->get()->toarray() as $table){
                array_push($temp, $table['id']);
            }
            $property=$temp;
        }
        else{
            $property = explode(',', $property);
        }
        return $property;
    }
}
?>