<div class="col-12 col-md-12 mt-2">
    <div class="card">
        <div style="text-align: center; color: black" class="card-header">
            Kết quả tìm kiếm mặt hàng
        </div>
        <div class="card-body">
            <div class="col-12">
                <nav class="navbar navbar-light bg-light">
                    <div class="container-fluid">
                        <form class="d-flex" method="post" action="">
                            <input class="form-control me-2" name="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                </nav>
                <a class="btn btn-success mb-2" href="./index.php?page=add">Thêm mặt hàng</a>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên</th>
                        <th>Loại hàng</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($products as $key    => $product): ?>
                    <tr>
                        <td><?php echo ++$key ?></td>
                        <td><?php echo $product->name ?></td>
                        <td><?php echo $product->species ?></td>
                        <td><a href="./index.php?page=delete&id=<?php echo $product->id; ?>"
                               class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                            <a href="./index.php?page=edit&id=<?php echo $product->id ; ?>"
                               class="btn btn-danger btn-sm" >Edit</a>
                        </td>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

