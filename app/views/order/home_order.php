<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Customer Orders</h1>

        <a href="<?= base_url() ?>order/new" class="btn btn-primary">New Order</a>

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
                            <a href="<?= base_url() ?>order/details/<?= $order->order_id ?>"
                                class="btn btn-info btn-sm">Ver</a>
                            <a href="order_edit.php?id=<?= $order->order_id ?>" class="btn btn-warning btn-sm">Editar</a>
                            <form action="<?= base_url() ?>order/delete/<?= $order->order_id ?>" method="POST"
                                style="display:inline;">
                                <!-- Incluir el campo _method para usar DELETE (si tu framework no lo soporta por defecto) -->
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Seguro que deseas eliminar este pedido?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="<?= base_url() ?>admin/home_admin" class="btn btn-primary">Back to menu</a>
    </div>
</body>

</html>