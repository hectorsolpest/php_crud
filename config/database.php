<?php
//conection to database
$connection = new mysqli('localhost', 'root', '', 'php_crud', 3308);
if(!$connection)
{
    echo 'Database error: '. mysqli_connect_error();
}
else
{

}
