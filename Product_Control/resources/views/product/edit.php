<div class="col-12 col-md-12 mt-2">
    <div class="card">
        <div class="card-header">
            Update Product Information
        </div>
        <div class="card-body">
            <div class="col-12">
                <form method="post" enctype="multipart/form-data" action="./index.php?page=edit&id=<?php echo $product->getId() ?>">
                    <input type="hidden" name="id" value="<?php echo $product->getId(); ?>"/>
                    <div class="mb-3">
                        <label class="form-label">Product Code</label>
                        <input type="text" value="<?php echo $product->getCode()?>" name="productCode" class="form-control">
                        <?php if (isset($errors['productCode'])): ?>
                            <p class="text-danger"><?php echo $errors['productCode'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Product Name</label>
                        <input type="text" value="<?php echo $product->getName()?>" class="form-control" name="productName">
                        <?php if (isset($errors['productName'])): ?>
                            <p class="text-danger"><?php echo $errors['productName'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Product Price</label>
                        <input type="number" step="0.01" value="<?php echo $product->getPrice()?>" class="form-control" name="productPrice">
                        <?php if (isset($errors['productPrice'])): ?>
                            <p class="text-danger"><?php echo $errors['productPrice'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Product Amount</label>
                        <input type="number" value="<?php echo $product->getAmount()?>" class="form-control" name="productAmount">
                        <?php if (isset($errors['productAmount'])): ?>
                            <p class="text-danger"><?php echo $errors['productAmount'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Product Description</label>
                        <input type="text" value="<?php echo $product->getDescription()?>" class="form-control" name="productDescription">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Product Image</label>
                        <input class="form-control" name='productImage' type="file" id="formFile">
                        <?php if (isset($errors['productImage'])): ?>
                            <p class="text-danger"><?php echo implode("",$errors['productImage']) ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Product Status</label>
                        <input type="text" value="<?php echo $product->getStatus()?>" class="form-control" name="productStatus">
                        <?php if (isset($errors['productStatus'])): ?>
                            <p class="text-danger"><?php echo $errors['productStatus'] ?></p>
                        <?php endif; ?>
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                    <a type="button" href="./index.php" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>