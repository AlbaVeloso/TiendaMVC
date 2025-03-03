<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Order Detail</h1>

        <?php if ($data["order"]): ?>
            <h2>Order ID: <?= $data["order"]->order_id ?></h2>
            <p><strong>Customer Name:</strong> <?= $data["order"]->customer->name ?></p>
            <p><strong>Discount:</strong> <?= number_format($data["order"]->discount, 2) ?> %</p>
            <p><strong>Order Date:</strong> <?= date('d-m-Y', strtotime($data["order"]->date)) ?></p>
            <p><strong>Created At:</strong> <?= date('d-m-Y H:i', strtotime($data["order"]->created_at)) ?></p>
            <p><strong>Updated At:</strong> <?= date('d-m-Y H:i', strtotime($data["order"]->updated_at)) ?></p>

            <h3>Products:</h3>
            <ul>
                <?php foreach ($data["order"]->products as $product): ?>
                    <li>
                        <?= $product->name ?> - <?= $product->pivot->quantity ?> x <?= number_format($product->pivot->price, 2) ?>
                    </li>
                <?php endforeach; ?>
            </ul>

            <a href="<?= base_url() ?>order" class="btn btn-primary">Back to Orders</a>
        <?php else: ?>
            <p>Order not found.</p>
        <?php endif; ?>
    </div>
</body>

</html>

