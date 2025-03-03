<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Order</title>
    <!-- Agregar el enlace a Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">
        <h2 class="mb-4">New Order</h2>
        <form id="form">
            <div id="order_products">
                <div class="row product">
                    <div class="mb-3">
                        <label for="customer" class="form-label">Customer</label>
                        <select id="customer_id" name="customer_id" class="form-select" required>
                            <option selected disabled>Choose...</option>
                            <?php foreach ($data['customers'] as $customer): ?>
                                <option value="<?= $customer['customer_id'] ?>"><?= $customer['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="discount" class="form-label">Discount %</label>
                        <input type="number" class="form-control" id="discount" name="discount"
                            placeholder="Enter discount" required>
                    </div>
                    <div class="mb-3">
                        <label for="products" class="form-label">Products</label>
                        <div id="products">
                            <div class="product mb-3" data-index="0">
                                <div class="row">
                                    <div class="col-md-6">
                                        <select name="products[0][product_id]" class="form-select" required>
                                            <option selected disabled>Choose product...</option>
                                            <?php foreach ($data['products'] as $product): ?>
                                                <option value="<?= $product['product_id'] ?>"><?= $product['name'] ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" name="products[0][quantity]" class="form-control"
                                            placeholder="Quantity" required>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" name="products[0][price]" class="form-control"
                                            placeholder="Price" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" id="add-product-button" class="btn btn-secondary">Add Product</button>
                    </div>
                </div>
            </div>



            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Save Order</button>
            </div>
        </form>
    </div>

    <!-- Agregar el script de Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="<?= base_url() ?>assets/js/order.js"></script>
</body>

</html>