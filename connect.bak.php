<?php
   $serverName = "10.10.2.31";
   $connectionInfo = array( "Database"=>"OM-PS-TEST", "UID"=>"innovation", "PWD"=>"Inno12345","MultipleActiveResultSets"=>true);
   $con = sqlsrv_connect( $serverName, $connectionInfo);

   if( $con === false ) {
      die( print_r( sqlsrv_errors(), true));
      }else{
         
      }
   date_default_timezone_set('Asia/Bangkok');


  //$con = mssql_connect("192.168.2.170","sa","Lks78917936ks") or die("Error Connect to Database");
  //$con = mssql_connect("BHS_PC","sa","Lks78917936ks") or die("Error Connect to Database");
  //=$objDB = mssql_select_db("CimSystemDB");
      

  
?>