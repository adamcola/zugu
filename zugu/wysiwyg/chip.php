
<?php
    
       /*   include 'gladius/gladius.php';

            $G = new Gladius();

            // call the database selection method
            $G->SelectDB('myshop');

            // show the eventual error message
            echo $G->errstr; */

///selecting the database!!!



       /*     include 'gladius/gladius.php';

            $G = new Gladius();

            $G->SelectDB('myshop') or die($G->errstr);

            $rs = $G->Query('SHOW TABLES');

           
            print_r($rs->GetArray());   */
 
 // print the tables!!!
 
 /*  include 'gladius/gladius.php';

            $G = new Gladius();

            $G->SelectDB('myshop') or die($G->errstr);

            // write the SQL statement into a variable
            $sql = 'CREATE TABLE phonebook (
                        name                varchar (200),
                        surname           varchar (200),
                        phone               varchar(100)
                        )';

            $G->Query($sql);

           
            echo $G->errstr;  */
 // create the table!!!
 
 include './gladius/gladius.php';

            $G = new Gladius();

            $G->SelectDB('myshop') or die($G->errstr);

            // write the SQL statement into a variable
            $sql = "INSERT INTO phonebook
                        VALUES(
                        'Gabriele',
                        'D'' Annunzio',
                        '1000-0000'
                        )";

            $G->Query($sql);

            // show the result
            echo $G->errstr;
			//loading data into table!!!
			
/*      include 'gladius/gladius.php';

            $G = new Gladius();

            if (!$G->Query('CREATE DATABASE myshop'))
                        die($G->errstr);

            $rs = $G->Query('SHOW DATABASES');           

            // print the databases
            print_r($rs->GetArray());


  global $GLADIUS_DB_ROOT;
  $GLADIUS_DB_ROOT = '/home/usr/databases/';
  
  include 'gladius/gladius.php';
  
  $G = new Gladius();
  
  $G->SelectDB('database_name/') or die;
  
  $G->Query('CREATE TABLE hypsin ( base FLOAT, root FLOAT)');
*/

?>