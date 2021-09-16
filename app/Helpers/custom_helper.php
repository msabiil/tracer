<?php
function userLogin()
{
    $db  = \Config\Database::connect();
    return $db->table('alumni')->where('id_alumni', session('id_alumni'))->get()->getRow();
}
