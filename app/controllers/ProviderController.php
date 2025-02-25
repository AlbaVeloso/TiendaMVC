<?php
namespace Formacom\controllers;
use Formacom\Core\Controller;
use Formacom\Models\Customer;
use Formacom\Models\Provider;
use Formacom\Models\Address;
use Formacom\Models\Phone;

class ProviderController extends Controller{
    public function index(...$params){
    $provider = Provider::find(1);
    $provider->name="María de la o";
    $provider->save();
    $address=new Address();

}
}
?>