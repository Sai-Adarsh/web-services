<?php
   function transpose($str) {
      $array = explode('|', $str);
      $final_array = array();
      foreach($array as $val)
      {
         array_push($final_array, explode(',', $val));
      }

      $newFoo = [];
      foreach($final_array as $a => $k){
         foreach($k as $i => $j){
            $newFoo[$i][]= $j;
         }
      }
      $tmpArr = array();
      foreach ($newFoo as $sub) {
      $tmpArr[] = implode(',', $sub);
      }
      $result = implode('|', $tmpArr);
      return ($result);
   }
?>