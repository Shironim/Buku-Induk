<?php

 include "config_connect.php";
 
 function autoNumber1(){
  $query = 'SELECT MAX(RIGHT(kode, 4)) as max_id FROM nota ORDER BY idnota';
  $result = mysql_query($query);
  $data = mysql_fetch_array($result);
  $id_max = $data['max_id'];
  $sort_num = (int) substr($id_max, 1, 4);
  $sort_num++;
  $new_code = sprintf("%04s", $sort_num);
  return $new_code;
 }

?>