<div class="col-12 col-md-12 mt-2">
    <div class="card">
        <div class="card-header">
            Update Customer Information
        </div>
        <div class="card-body">
            <div class="col-12">
                <form method="post" action="./index.php?page=edit&id=<?php echo $customer->id ?>">
                    <input type="hidden" name="id" value="<?php echo $customer->id; ?>"/>
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" value="<?php echo $customer->name; ?>" name="name" class="form-control">
                        <?php if (isset($errors['name'])): ?>
                            <p class="text-danger"><?php echo $errors['name'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" value="<?php echo $customer->email; ?>" class="form-control" name="email">
                        <?php if (isset($errors['email'])): ?>
                            <p class="text-danger"><?php echo $errors['email'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <input type="text" value="<?php echo $customer->address; ?>" class="form-control" name="address">
                        <?php if (isset($errors['address'])): ?>
                            <p class="text-danger"><?php echo $errors['address'] ?></p>
                        <?php endif; ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                    <a type="button" href="index.php" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>