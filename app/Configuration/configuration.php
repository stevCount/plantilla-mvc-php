<?php /* copyright© Jhon S. Vique */
    define('RUTA_URL', 'http://'.$_SERVER['HTTP_HOST'].'/php-mvc/');
    define('RUTA_APP', dirname(dirname(__FILE__)));
    define('NAME', 'php mvc');

    /*Nombre del servidor*/
    define('HOST','localhost');
    /*Nombre de la base de datos*/
    define('DBNAME','php-mvc');
    /*Nombre del usuario*/
    define('USER','root');
    /*Contraseña del usuario*/
    define('PASSWORD','');


    /*Motor Base de datos*/
    define('DRIVEBDMYSQL','mysql');
    define('DRIVEBDPOSTGRESQL','pgsql');
?>