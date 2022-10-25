<?php

function bubbleSort($array)
{
  for($i = 0; $i < count($array); $i++)
  {
     for($j = 0; $j < count($array) - 1; $j++)
     {
       if($array[$j] > $array[$j + 1])
       {
         $aux = $array[$j];
         $array[$j] = $array[$j + 1];
         $array[$j + 1] = $aux;
       }
     }
  }
  return $array;
}

$arr = array(4, 1, 8, 8, 99, 50, 4, 50, 2, 100);
var_dump(bubbleSort($arr));