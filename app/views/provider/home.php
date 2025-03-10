<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Provider</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container">
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <span class="navbar-text">
                    Providers List
                </span>
            </div>
        </nav>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Web</th>
                    <th scope="col">Operations</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $key => $provider) { ?>
                    <tr>
                        <th scope="row"><?= $provider->provider_id ?></th>
                        <td><?= $provider->name ?></td>
                        <td><?= $provider->web ?></td>
                        <td><i class="fa-solid fa-user-pen"></i>
                            <a href="<?php echo base_url(); ?>provider/delete/<?php echo $provider->provider_id; ?>"><i
                                    class="fa-solid fa-trash"></i></a>
                            <a href="<?= base_url() ?>provider/show/<?= $provider->provider_id ?>"><i
                                    class="fa-solid fa-eye"></i></a>
                        </td>
                    </tr>
                <?php } ?>


            </tbody>
        </table>
        <a href="<?= base_url() ?>admin/home_admin" class="btn btn-primary">Back to menu</a>
        <a href="<?= base_url() ?>provider/new" class="btn btn-primary">New provider</a>
    </div>
</body>

</html>