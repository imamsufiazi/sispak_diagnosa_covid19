<?php

class Auth_model extends CI_model
{
    function account()
    {
        //simulasi pengambilan data dari tabel pada db
        return array(
            "admin" => "admin",
        );
    }
}
