<div class="col-12 col-md-12 mt-2">
    <div class="card">
        <div class="card-header">
            Customer List
        </div>
        <div class="card-body">
            <div class="col-12">
                <a class="btn btn-success mb-2" href="./index.php?page=add">Thêm mới</a>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Order</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($customers as $key => $customer): ?>
                    <tr>
                        <td><?php echo ++$key ?></td>
                        <td><?php echo $customer->name ?></td>
                        <td><?php echo $customer->email ?></td>
                        <td><?php echo $customer->address ?></td>
                        <td><a href="./index.php?page=delete&id=<?php echo $customer->id; ?>"
                               class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                            <a href="./index.php?page=edit&id=<?php echo $customer->id; ?>"
                               class="btn btn-primary btn-sm">Update</a></td>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>