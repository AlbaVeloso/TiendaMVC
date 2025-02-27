<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your shop</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="my-4">¡Welcome!</h1>
        <div class="list-group">
            <a href="<?= base_url() ?>product" class="list-group-item list-group-item-action">Products</a>
            <a href="<?= base_url() ?>provider/home" class="list-group-item list-group-item-action">Providers</a>
            <a href="<?= base_url() ?>customer/home" class="list-group-item list-group-item-action">Customers</a>
            <a href="<?= base_url() ?>orders" class="list-group-item list-group-item-action">Orders</a>
            <a href="<?= base_url() ?>logout" class="list-group-item list-group-item-action list-group-item-danger">Logout</a>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>