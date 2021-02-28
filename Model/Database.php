<?php 

class Database
{
   //Database Connection
   public function connection()
   {
       try
       {
           $bdd = new PDO('mysql:host=localhost;dbname=ecommerce;charset=utf8', 'root', '');
           $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       }
       catch(Exception $e)
       {
           die('Erreur : '.$e->getMessage());
       }
       return $bdd;
   }
}