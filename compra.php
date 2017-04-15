<?php
$total=$_GET['total'];
$token=$_GET['token'];
$ticket="T001224";

// Usando Composer (o puedes incluir las dependencias manualmente)
require 'vendor/autoload.php';
// Configurar tu API Key y autenticación
$SECRET_KEY = "sk_test_0fYLnIInmqxWC7QT";
$culqi = new Culqi\Culqi(array('api_key' => $SECRET_KEY));
$charge = $culqi->Charges->create(
  array(
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
