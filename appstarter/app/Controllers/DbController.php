<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DbController extends BaseController
{
    public function clear()
    {
        $db = db_connect();
        $query = '';
        $sqlScript = file( FCPATH.'../recursos/db.sql');
        foreach ($sqlScritpt as $line) {
            $startWith = substr(trim($line), 0,2);
            $endWith = substr(trim($line), -1 ,1);

            if (empty($line) || $starWith == '--' || $starWith == '/*'
                || $starWith == '//') {
                continue;
            }//end if lineas de comentarios

            $query = $query . $line;
            if ($endWith == ';') {
                if (!$db->query($query)){
                    echo '<div class="">Problem in executing the SQL query <b>' . $query. '</b></div>';
                }//end if error al ejecutar query
                $query= '';
            }//end if fin linea de query
        }//end foreach
        echo '<div class="">SQL basedb file imported successfully</div>';
    }
}
