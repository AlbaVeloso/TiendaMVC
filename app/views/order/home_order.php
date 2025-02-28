<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Customer Orders</h1>
        
        <a href="<?=base_url()?>order/new" class="btn btn-primary">New Order</a>
        
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col">Customer</th>
                    <th scope="col">Date</th>
                    <th scope="col">Discount</th>
                    <th scope="col">Creation date</th>
                    <th scope="col">Update date</th>
                    <th scope="col">Operations</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $order): ?>
                    <tr>
                        <td><?= $order->order_id ?></td>
                        <td><?= $order->customer->name ?></td>
                        <td><?= date('d-m-Y', strtotime($order->date)) ?></td>
                        <td><?= number_format($order->discount, 2) ?> %</td>
                        <td><?= date('d-m-Y H:i', strtotime($order->created_at)) ?></td>
                        <td><?= date('d-m-Y H:i', strtotime($order->updated_at)) ?></td>
                        <td>
                            <a href="order_details.php?id=<?= $order->order_id ?>" class="btn btn-info btn-sm">Ver</a>
                            <a href="order_edit.php?id=<?= $order->order_id ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="order_delete.php?id=<?= $order->order_id ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este pedido?')">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="<?= base_url() ?>admin/home_admin" class="btn btn-primary">Back to menu</a>
    </div>
</body>

</html>
