<?php
    function lowerDiagonal($str) {
        $array = explode('|', $str);
        $final_array = array();
        foreach($array as $val)
        {
            array_push($final_array, explode(',', $val));
        }


        $i; $j;
        $row = count($final_array);
        $col = count($final_array[0]);
        $newArr = array();
        for ($i = 0; $i < $row; $i++) 
        { 
            $temp_array = array();
            for ($j = 0; $j < $col; $j++) 
            { 
                if ($i < $j) 
                { 
                    array_push($temp_array, 0);
                } 
                else{
                    array_push($temp_array, $final_array[$i][$j]);
                }
            } 
            array_push($newArr, $temp_array);
        } 


        $tmpArr = array();
        foreach ($newArr as $sub) {
            $tmpArr[] = implode(',', $sub);
        }
        $result = implode('|', $tmpArr);
        return ($result);
    }
?>