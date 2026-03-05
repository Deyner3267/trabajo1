<?php
include("conexion.php");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Inventario</title>
<link rel='stylesheet' href='style.css'>
</head>

<body>

<h1>Inventario</h1>

<h2>Buscar Producto</h2>

<form method="GET">
    <input type="number" name="buscar" placeholder="ID Producto">
    <button type="submit">Buscar</button>
</form>

<?php

if(isset($_GET['buscar'])){

    $buscar = $_GET['buscar'];

    $consulta = "SELECT * FROM inventario WHERE id_producto='$buscar'";
    $resultado = mysqli_query($conexion,$consulta);

    while($fila=mysqli_fetch_assoc($resultado)){
        echo "Producto: ".$fila['id_producto']." | Stock: ".$fila['stock']." | Fecha: ".$fila['fecha']."<br>";
    }

}

?>

<hr>

<h2>Agregar Producto</h2>

<form method="POST">
    <input type="number" name="id_producto" placeholder="ID Producto">
    <input type="number" name="stock" placeholder="Stock">
    <button type="submit" name="crear">Agregar</button>
</form>

<?php

if(isset($_POST['crear'])){

    $product_id = $_POST['id_producto'];
    $stock = $_POST['stock'];

    $consulta = "INSERT INTO inventario (id_producto, stock) VALUES ('$product_id','$stock')";

    mysqli_query($conexion,$consulta);

    echo "Producto agregado correctamente";
}

?>

<hr>

<h2>Actualizar Stock</h2>

<form method="POST">
    <input type="number" name="id_producto" placeholder="ID Producto">
    <input type="number" name="nuevo_stock" placeholder="Nuevo Stock">
    <button type="submit" name="actualizar">Actualizar</button>
</form>

<?php

if(isset($_POST['actualizar'])){

    $id = $_POST['id_producto'];
    $stock = $_POST['nuevo_stock'];

    $consulta = "UPDATE inventario SET stock='$stock' WHERE id_producto='$id'";

    mysqli_query($conexion,$consulta);

    echo "Stock actualizado correctamente";
}

?>

</body>
</html>