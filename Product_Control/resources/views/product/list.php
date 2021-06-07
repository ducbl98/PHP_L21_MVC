<div class="col-12 col-md-12 mt-2">
    <div class="card">
        <div class="card-header">
            Product List
        </div>
        <div class="card-body">
            <div class="col-12">
                <a class="btn btn-success mb-2" href="./index.php?page=add">Add Product</a>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Order</th>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Amount</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?php echo $product->getId() ?></td>
                        <td><?php echo $product->getCode() ?></td>
                        <td><?php echo $product->getName() ?></td>
                        <td><?php echo $product->getPrice() ?></td>
                        <td><?php echo $product->getAmount() ?></td>
                        <td><?php echo $product->getDescription() ?></td>
                        <td style="width: 200px ; height: 100px " ><img style="height: 100%; width: 100%; object-fit: contain;" src='apps/uploads/<?php echo $product->getImage()?>' alt='Error Image'></td>
                        <td><?php echo $product->getStatus() ?></td>
                        <td><a href="./index.php?page=delete&id=<?php echo $product->getId(); ?>"
                               class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                            <a href="./index.php?page=edit&id=<?php echo $product->getId(); ?>"
                               class="btn btn-primary btn-sm">Update</a>
                        </td>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>