<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <title>Siroko</title>
</head>
<body>
    <span id="income">SIROKO - TIENDA ONLINE</span>
    <div id="form_income">
        <form action="../controller/income.php" method="POST">
            <label>Usuario:</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="user">
            <br>
            <br>
            <label>Contraseña:</label>&nbsp<input type="password" name="password">
            <br>
            <br>
            <button type="submit" name="income">Ingresar</button>
        </form>
    </div>
</body>
</html>