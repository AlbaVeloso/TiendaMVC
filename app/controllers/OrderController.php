<?php
namespace Formacom\controllers;

use Formacom\Core\Controller;
use Formacom\Models\Customer;
use Formacom\Models\Product;
use Formacom\Models\Category;
use Formacom\Models\Order;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    public function index(...$params)
    {
        // Cargar el modelo de pedidos con la relación customer
        $orders = Order::with('customer')->get();

        // Cargar la vista y pasarle los datos
        $this->view('home_order', $orders);
    }

    public function new()
    {
        // Cargar los modelos necesarios
        $customers = Customer::all();
        $products = Product::all();
        $categories = Category::all();

        // Cargar la vista y pasarle los datos
        $this->view('new_order', ['customers' => $customers, 'products' => $products, 'categories' => $categories]);
    }

    public function create()
    {
        // Procesar los datos del formulario
        $customer_id = $_POST['customer_id'];
        $discount = $_POST['discount'];
        $products = $_POST['products'];

        // Crear una nueva orden
        $order = new Order();
        $order->customer_id = $customer_id;
        $order->discount = $discount;
        $order->save();

        // Asociar productos a la orden
        foreach ($products as $product) {
            $order->products()->attach($product['product_id'], [
                'quantity' => $product['quantity'],
                'price' => $product['price']
            ]);
        }

        // Devolver la respuesta con los productos de la orden
        echo json_encode(['message' => 'Order saved successfully', 'products' => $order->products]);

    }

    public function details($id)
    {
        // Cargar el pedido con sus productos y el cliente
        $order = Order::with('customer', 'products')->find($id);

        // Verificar si se encontró la orden
        if (!$order) {
            return Response::json(['message' => 'Order not found'], 404);
        }

        // Cargar la vista y pasarle los datos de la orden
        $this->view('detail_order', ['order' => $order]);
    }
    public function delete($id)
    {
        // Eliminar primero los productos asociados a la orden
        $order = Order::find($id);

        if (!$order) {
            return Response::json(['message' => 'Order not found'], 404);
        }

        // Eliminar los productos asociados (o hacer un detach si usas relaciones en Eloquent)
        $order->products()->detach();  // Si estás usando Eloquent, puedes hacer esto

        // Ahora puedes eliminar la orden
        $order->delete();
        header('Location: ' . base_url() . 'order');
       
    }






}

?>