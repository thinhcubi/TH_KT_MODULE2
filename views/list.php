<div class="col-12 col-md-12 mt-2">
    <div class="card">
        <div style="text-align: center" class="card-header">
            Danh sách mặt hàng
        </div>
        <div class="card-body">
            <div class="col-12">
                <nav class="navbar navbar-light bg-light">
                    <div style="float: left" class="container-fluid">
                        <form class="d-flex" method="post" action="index.php?page=search">
                            <input class="form-control me-2"  name="search" placeholder="Search" aria-label="Search">
                            <a href="index.php?page=search"> <button class="btn btn-outline-success" type="submit" >Tìm kiếm</button></a>
                        </form>
                    </div>
                </nav>
                <div style="margin-left: 1100px"> <a class="btn btn-success mb-2" href="index.php?page=add">Thêm mặt hàng</a> </div>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên hàng</th>
                        <th>Loại hàng</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($products as $key    => $product): ?>
                    <tr>
                        <td><?php echo ++$key ?></td>
                        <td><?php echo $product->name ?></td>
                        <td><?php echo $product->species ?></td>
                        <td></div> <a href="index.php?page=edit&id=<?php echo $product->id ; ?>">Chỉnh sửa|</a>
            <a href="index.php?page=delete&id=<?php echo $product->id; ?>"
               onclick="return confirm('Are you sure?')">Xóa</a>

            </td>

            <?php endforeach; ?>
            </tbody>
            </table>
        </div>
    </div>
</div>

