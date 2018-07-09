<?php
/**
 * Created by PhpStorm.
 * User: matthieu
 * Date: 09/07/2018
 * Time: 13:58
 */

session_start();
session_unset();
session_destroy();
session_write_close();
setcookie(session_name(),'',0,'/');