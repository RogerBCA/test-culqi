<?php
$total=$_GET['total'];
$token=$_GET['token'];
$ticket="T001224";

// Usando Composer (o puedes incluir las dependencias manualmente)
require 'vendor/autoload.php';
// Configurar tu API Key y autenticación
$SECRET_KEY = "sk_test_hIiO9d8Gf7qKLxYX";
$culqi = new Culqi\Culqi(array('api_key' => $SECRET_KEY));

try {
  // Creando Cargo a una tarjeta
  $charge = $culqi->Charges->create(array(
          "amount" => $total,
          "capture" => true,
          "currency_code" => "PEN",
          "description" => "Venta de prueba",
          "email" => "test@culqi.com",
          "installments" => 0,
          "source_id" => $token
        )
  );
  // Respuesta
  echo json_encode($charge);
} catch (Exception $e) {
  echo json_encode($e->getMessage());
}
