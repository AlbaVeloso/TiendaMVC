<?php
namespace Formacom\controllers;
use Formacom\Core\Controller;
use Formacom\Models\Customer;
use Formacom\Models\Address;
use Formacom\Models\Phone;

class CustomerController extends Controller
{
    public function index(...$params)
    {
        $customers = Customer::all();
        //$data = ['mensaje' => '¡Bienvenido a la página de inicio!'];
        $this->view('home', $customers);
    }

    public function show(...$params)
    {
        if (isset($params[0])) {
            $customer = Customer::find($params[0]);
            if ($customer) {
                $this->view('detail', $customer);
                exit();
            }

        }
        header("Location:" . base_url() . "customer");


    }
    public function new(...$params)
    {
        if (isset($_POST['name'])) {
            // Crear el cliente
            $customer = new Customer();
            $customer->name = $_POST['name'];
            $customer->save();
            if (isset($_POST['street'])) {
                // Crear la dirección
                $address = new Address();
                $address->street = $_POST['street'];
                $address->zip_code = $_POST['zip_code'];
                $address->city = $_POST['city'];
                $address->country = $_POST['country'];
                $customer->addresses()->save($address);
            }
            if (isset($_POST['phone'])) {
                // Crear la dirección
                $phone = new Phone();
                $phone->number = $_POST['phone'];
                
                $customer->phones()->save($phone);
            }
            // Redirigir al listado de clientes o cualquier otra página de éxito
            header("Location: " . base_url() . "customer");
        }
        $this->view("new");

    }
    public function delete($id)
    {
        $customer = Customer::find($id);

        if ($customer) {
    
            $customer->addresses()->delete();

            $customer->phones()->delete();

            $customer->delete();

            header("Location: " . base_url() . "customer");
            exit();
        } else {
            header("Location: " . base_url() . "customer");
            exit();
        }
    }
  


}

?>