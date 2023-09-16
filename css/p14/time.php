<?php
      date_default_timezone_set("Asia/Beirut");
      $tell = date('A');
      $hour = date('H');
      $minute = date('i');

      $arr = [];

      $arr['tell'] = $tell;
      $arr['hour'] = $hour;
      $arr['minute'] = $minute;

      echo json_encode($arr);
?>