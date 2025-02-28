<?php
namespace Formacom\controllers;

use Formacom\Core\Controller;
use Formacom\Models\Customer;
use Formacom\Models\Product;
use Formacom\Models\Category;
use Formacom\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller {
    public function index(...$params) {
        // Cargar el modelo de pedidos con la relación customer
        $orders = Order::with('customer')->get();
        
        // Cargar la vista y pasarle los datos
        $this->view('home_order', $orders);
    }

    public function new() {
        // Cargar los modelos necesarios
        $customers = Customer::all();
        $products = Product::all();
        $categories = Category::all();

        // Cargar la vista y pasarle los datos
        $this->view('new_order', ['customers' => $customers, 'products' => $products, 'categories' => $categories]);
    }

    public function create(Request $request) {
        // Procesar los datos del formulario
        $data = json_decode($request->getContent(), true);
        $customer_id = $data['customer_id'];
        $discount = $data['discount'];
        $products = $data['products'];

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
        $order->load('products.category', 'products.provider');
        return response()->json(['message' => 'Order saved successfully', 'products' => $order->products]);
    }

    public function details($id){
        // Cargar el pedido
        $order = Order::with('customer', 'products')->find($id);

        // Cargar la vista y pasarle los datos
        $this->view('detail_order', ['order' => $order]);
    }
}
?>