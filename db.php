<?php
session_start();

$conn = mysqli_connect(
  '31.170.161.22',
  'u101685278_tcargocomex',
  'Pachiman9102$',
  'u101685278_tcargocomex'
);

if (!$conn) {
  echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
  echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
  echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
  exit;
}
?>
