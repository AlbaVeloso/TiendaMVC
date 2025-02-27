<?php
namespace Formacom\controllers;
use Formacom\Core\Controller;
use Formacom\Models\Customer;
use Formacom\Models\Address;

class AdminController extends Controller{
    public function index(...$params){
        $this->view('home_admin');
    }
   
}
?>