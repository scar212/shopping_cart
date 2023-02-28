<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../view/assets/css/style.css" type="text/css">
    <title>Siroko</title>
</head>
<body>
    <span class="s-purchase-1">TU PEDIDO ESTA EN CAMINO</span>
    <div id="form_purchase">
        <table id="purchase">
                <tr>
                    <td>Cantidad</td>
                    <td>Nombre del Producto</td>
                    <td>Precio</td>
                </tr>
            <?php 
                while ($data = mysqli_fetch_array($result)){
                    $id_products = $data['id_products'];
                    $setence = "SELECT * FROM products WHERE id_products = $id_products";
                    $rel = mysqli_query($conn,$setence); 
                    $extracted = mysqli_fetch_array($rel);
                    $priceD = $data['cantd'] * $extracted['price'];
            ?>
                <tr>
                    <td><?php echo $data['cantd'];?></td>
                    <td><?php echo $extracted['name'];?></td>
                    <td>$ <?php echo $priceD;?></td>
                </tr>
            <?php
                }
            ?>
            <label>Gracias por preferirnos <?php echo $name;?></label>
            <form action="./getReady.php" method="POST">
                <button type="submit" name="ready" id="ready">¡Listo!</button>
            </form>
    </div>
</body>
</html>