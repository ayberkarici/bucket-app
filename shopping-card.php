


<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/custom.css">
    <title>Sepet</title>
</head>
<body >

<div id="deneme">
<?php include("lib/navbar.php") ?>

<!--------------------------Main Content----------------------------->
<div class="container">

    <br>
    <?php if($total_count > 0 ) { ?>
    <h2 class="text-center">Sepetinizde <strong style="color: #d9534f; class="color-danger"><?php echo $total_count ?></strong> adet ürün bulunmaktadır.</h2>
    <br>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col" class="text-center">Ürün Resmi</th>
                <th scope="col" class="text-center">Ürün Adı</th>
                <th scope="col" class="text-center">Fiyatı</th>
                <th scope="col" class="text-center">Adeti</th>
                <th scope="col" class="text-center">Toplam</th>
                <th scope="col" class="text-center">Sepetten Çıkar</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($shopping_products as $product): ?>

            <tr>
                <td class="text-center" width="120px">
                    <img src="assets/images/<?php echo $product->img_url ; ?>" width="50px" alt="<?php echo $product->product_name; ?>">
                </td>
                <td class="text-center"><?php echo $product->product_name; ?></td>
                <td class="text-center"><strog><?php echo $product->price; ?> TL</strong></td>
                <td class="text-center">
                    <div class="custom-li">
                        <a product-id="<?php echo $product->id ?>" class="btn btn-xs btn-success custom-btn btn-inc">+</a>
                    
                        <input type="text" class="item-count-input " value="<?php echo $product->count; ?> ">

                        <a product-id="<?php echo $product->id ?>" class="btn btn-xs btn-danger custom-btn btn-dec ">-</a>
                    </div>
                </td>
                <td class="text-center "><strog><?php echo $product->total_price; ?> TL</strong></td>
                <td class="text-center" width="200">
                    <button product-id="<?php echo $product->id; ?>" class="btn btn-danger removeFromCardBtn">Sepetten Çıkar <span style="font-size:21px;font-weight:bolder; position:relative;top:2px; ">×</span></button>
                </td>
            </tr>

        <?php endforeach; ?>
        </tbody>
        <tfoot>
            <th colspan="2" class="text-right">
                Toplam Ürün: <span style="color: #d9534f;"><?php echo $total_count; ?> adet</span>
            </th>
            <th colspan="4" class="text-right">
                Toplam Tutar: <span style="color: #d9534f;"><?php echo $total_price; ?> TL</span>
            </th>
        </tfoot>
    </table>
    <?php } else { ?>
        <h4 class=" alert alert-info">Sepetinizde ürün bulunmamaktadır. Eklemek için <a href="index.php">tıklayın</a>.</h4>
    <?php } ?>
</div>
</div>

<!--------------------------Main Content----------------------------->


    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="assets/js/jquery-min.js" ></script>
    <script src="assets/js/custom.js"></script>
</body>
</html>