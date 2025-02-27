<?php
namespace Formacom\controllers;
use Formacom\Core\Controller;
use Formacom\Models\Address;
use Formacom\Models\Phone;
use Formacom\Models\Provider;

class ProviderController extends Controller
{
    public function index(...$params)
    {
        $providers = Provider::all();
        //$data = ['mensaje' => '¡Bienvenido a la página de inicio!'];
        $this->view('home', $providers);
    }

    public function show(...$params)
    {
        if (isset($params[0])) {
            $provider = Provider::find($params[0]);
            if ($provider) {
                $this->view('detail', $provider);
                exit();
            }

        }
        header("Location:" . base_url() . "provider");


    }
    public function new(...$params)
    {
        if (isset($_POST['name'])) {
            // Crear el cliente
            $provider = new Provider();
            $provider->name = $_POST['name'];
            $provider->web = $_POST['web'];
            $provider->save();
            if (isset($_POST['street'])) {
                // Crear la dirección
                $address = new Address();
                $address->street = $_POST['street'];
                $address->zip_code = $_POST['zip_code'];
                $address->city = $_POST['city'];
                $address->country = $_POST['country'];
                $provider->addresses()->save($address);
            }
            if (isset($_POST['phone'])) {
                // Crear la dirección
                $phone = new Phone();
                $phone->number = $_POST['phone'];
                
                $provider->phones()->save($phone);
            }
            // Redirigir al listado de clientes o cualquier otra página de éxito
            header("Location: " . base_url() . "provider");
        }
        $this->view("new");

    }
    public function delete($id)
    {
        $provider = Provider::find($id);

        if ($provider) {
    
            $provider->addresses()->delete();

            $provider->phones()->delete();

            $provider->delete();

            header("Location: " . base_url() . "provider");
            exit();
        } else {
            header("Location: " . base_url() . "provider");
            exit();
        }
    }
  


}

?>