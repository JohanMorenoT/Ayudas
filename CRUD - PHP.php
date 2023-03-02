<?php

// Crear la conexión con la base de datos
$servername = "localhost";
$username = "tu_usuario";
$password = "tu_contraseña";
$dbname = "ejemplo";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar si la conexión es exitosa
if (!$conn) {
  die("Conexión fallida: " . mysqli_connect_error());
}

// Crear la tabla
$sql = "CREATE TABLE IF NOT EXISTS usuarios (
        ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        NOMBRE VARCHAR(30) NOT NULL,
        EDAD INT(3) NOT NULL
        )";

if (mysqli_query($conn, $sql)) {
  echo "Tabla creada exitosamente<br>";
} else {
  echo "Error al crear la tabla: " . mysqli_error($conn);
}

// Crear función para agregar un usuario
function agregar_usuario($nombre, $edad) {
  global $conn;
  $sql = "INSERT INTO usuarios (NOMBRE, EDAD) VALUES ('$nombre', '$edad')";
  if (mysqli_query($conn, $sql)) {
    echo "Usuario agregado exitosamente<br>";
  } else {
    echo "Error al agregar el usuario: " . mysqli_error($conn);
  }
}

// Crear función para obtener todos los usuarios
function obtener_usuarios() {
  global $conn;
  $sql = "SELECT * FROM usuarios";
  $result = mysqli_query($conn, $sql);
  $usuarios = array();
  while ($row = mysqli_fetch_assoc($result)) {
    $usuarios[] = $row;
  }
  return $usuarios;
}

// Crear función para actualizar un usuario por ID
function actualizar_usuario($id, $nombre, $edad) {
  global $conn;
  $sql = "UPDATE usuarios SET NOMBRE = '$nombre', EDAD = '$edad' WHERE ID = $id";
  if (mysqli_query($conn, $sql)) {
    echo "Usuario actualizado exitosamente<br>";
  } else {
    echo "Error al actualizar el usuario: " . mysqli_error($conn);
  }
}

// Crear función para eliminar un usuario por ID
function eliminar_usuario($id) {
  global $conn;
  $sql = "DELETE FROM usuarios WHERE ID = $id";
  if (mysqli_query($conn, $sql)) {
    echo "Usuario eliminado exitosamente<br>";
  } else {
    echo "Error al eliminar el usuario: " . mysqli_error($conn);
  }
}

// Ejemplo de uso
agregar_usuario('Juan', 25);
agregar_usuario('Ana', 32);

print_r(obtener_usuarios());

actualizar_usuario(1, 'Juan Pérez', 30);

print_r(obtener_usuarios());

eliminar_usuario(2);

print_r(obtener_usuarios());

// Cerrar la conexión con la base de datos
mysqli_close($conn);

?>
