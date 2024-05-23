<?php 
require('config.php');
class connect {
    protected $link;
    public function __construct()
    {
        $this->link = new mysqli(servername, username, password, database);
    }
}

?>