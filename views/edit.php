<div class="col-12 col-md-12 mt-2">
    <div class="card">
        <div class="card-header">
            Chỉnh sửa mặt hàng
        </div>
        <div class="card-body">
            <div class="col-12">
                <form method="post">
                    <?php foreach ($products as $item) : ?>
                        <div class="mb-3">
                            <label class="form-label">Tên hàng:</label>
                            <input type="text" value="<?php echo $item->name; ?>" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Loại hàng:</label>
                            <input type="text" value="<?php echo $item->species; ?>" class="form-control" name="species">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Giá:</label>
                            <input type="text" value="<?php echo $item->price; ?>" class="form-control" name="price">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Số lượng:</label>
                            <input type="text" value="<?php echo $item->quantity; ?>" class="form-control" name="quantity">
                        </div> <div class="mb-3">
                            <label class="form-label">Mô tả:</label>
                            <input type="text" value="<?php echo $item->description; ?>" class="form-control" name="description">
                        </div>
                    <?php endforeach; ?>
                    <button type="submit" class="btn btn-primary">Sửa mặt hàng</button>
                    <a type="button" href="index.php" class="btn btn-secondary">Quay lại</a>
                </form>
            </div>
        </div>
    </div>
</div>
