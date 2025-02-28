<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/js/order.js" defer></script>
    <title>Products</title>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-light bg-light">
            <span class="navbar-brand mb-0 h1">Order Detail</span>
        </nav>
        <form id="form">
            <div class="form-row">
                <div class="form-group col-12">
                    <input type="hidden" name="order_id" id="order_id" value="<?= $data['order']->order_id ?>">
                    <label for="name">Product</label>
                    <select name="product" id="product">
                        <option selected>Choose...</option>
                        <?php foreach ($data['products'] as $product): ?>
                            <option value="<?= $product['product_id'] ?>"><?= $product['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-12">
                    <label for="street">Cantidad</label>
                    <input type="number"class="form-control" id="description" placeholder="Description" required>
                </div>
            </div>


            <button type="submit" class="btn col-12 btn-primary">Save Product</button>
        </form>
        <hr>
        <a href="<?= base_url() ?>admin/home_admin" class="btn btn-primary">Back to menu</a>
        <hr>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Category</th>
                    <th scope="col">Provider</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Price</th>
                    <th scope="col">Operations</th>
                </tr>

            </thead>
            <tbody id="products">

            </tbody>
        </table>




    </div>

</body>

</html>