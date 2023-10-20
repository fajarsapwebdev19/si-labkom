<?php
   if(isset($_GET['page']))
   {
       $page = $_GET['page'];
   }
   else{
       $page = 'home.php';
   }

   $ex = '.php';

   if(empty($_GET['page']))
   {
       include 'menu/home'.$ex;
   }

   switch($page)
   {
       case 'pgn_kom';
       include 'menu/pgn_kom'.$ex;
       break;

       case 'pgn_apl';
       include 'menu/pgn_apl'.$ex;
       break;

       case 'rwt_pgn';
       include 'menu/rwt_pgn'.$ex;
       break;

       case 'profile';
       include 'menu/profile'.$ex;
       break;

       case 'update_password';
       include 'menu/update_password'.$ex;
       break;
   }
?>