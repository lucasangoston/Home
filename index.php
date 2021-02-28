<?php
require('Model/Database.php');

session_start();

if(!empty($_GET['page']) and is_file('Controller/'.$_GET['page'].'.php'))
{
    require('Controller/'.$_GET['page'].'.php');
}
else
{
    require('Controller/index.php');
}