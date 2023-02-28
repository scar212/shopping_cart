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
    <div id="header_products">
        <img src="../view/assets/images/img_siroko_gym.png" id="banner">
        <h1>SIROKO</h1>
        <label id="tittle">Completa tu compra.</label>
        <label id="name_user">Usuario:  <?php echo $name;?></label>
    </div>
    <div class="content-products">
        <div class="table_shop">
            <table id="purchase_details">
                <tr>
                    <td>Cantidad</td>
                    <td>Nombre del Producto</td>
                    <td>Precio</td>
                </tr>
                    <?php include_once '../controller/index.php'; 
                            while ($tableP = mysqli_fetch_array($resultP)){
                                $id_products = $tableP['id_products'];
                                $setence = "SELECT * FROM products WHERE id_products = $id_products";
                                $rel = mysqli_query($conn,$setence); 
                                $extracted = mysqli_fetch_array($rel);
                                $priceD = $tableP['cantd'] * $extracted['price'];
                    ?>  
                    <form action="./cart.php" method="POST">
                        <tr>
                            <td><input type="hidden" id="id_product" name="id_product" value="<?php echo $tableP['id_products']?>">
                                <select id="cant" name="cant">
                                    <option value= 0><?php echo $tableP['cantd']?></option>
                                    <option value= 1>1</option>
                                    <option value= 2>2</option>
                                    <option value= 3>3</option>
                                    <option value= 4>4</option>
                                    <option value= 5>5</option>
                                    <option value= 6>6</option>
                                    <option value= 7>7</option>
                                    <option value= 8>8</option>
                                    <option value= 9>9</option>
                                    <option value= 10>10</option>
                                </select>
                            </td>
                            <td><?php echo $extracted['name'];?></td>
                            <td><input type="hidden" value="<?php echo $extracted['price'];?>" id="pricePr">$<input type="text" value="<?php echo $priceD;?>" id="price" readonly></td>
                            <td><button type="submit" name="btn_delete_shop" id="btn_delete_shop" title="Eliminar registro del carrito">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                                </svg>
                            </button></td>
                            <td><button type="submit" name="btn_update_shop" id="btn_update_shop" title="Actualizar cantidad de producto">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>
                            </button></td>
                        </tr>
                    </form>
                        <?php
                            }
                        ?>
            </table>        
            <form action="./getConfirmation.php" method="POST">
                    <button type="submit" name="confirmation" id="btn_confirmation">Confirmar compra</button>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script language="javascript">
        $(document).ready(function(){
				$("#cant").change(function () {
					$('#price').val(parseInt($('#cant option:selected').val())*parseInt($('#pricePr').val()));
            });
        });
    </script>
</body>
</html>