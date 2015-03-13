<?php 

/*------------------------------------------

Author : Ranjit Mishra
Date :21st April 2013

Purpose : This funtion receives a string and
sanitizes input for the purpose of entering them
into the database.

------------------------------------------*/

    function sanitizeInput($InputString)
    {
        return mysql_real_escape_string($InputString);
    }

?>
