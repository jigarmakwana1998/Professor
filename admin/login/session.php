<?php
session_start();
function checkuser()
{
    if (empty($_SESSION["user_name"])) {
        return false;
    } else {
        return true;
    }
}
