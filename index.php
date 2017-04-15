<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Ejemplot</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script>
  function culqi() {
    if(Culqi.token) { // ¡Token creado exitosamente!
      total="<?php echo $_GET['total'] ?>";
      var token = Culqi.token.id;
      $.getJSON("compra.php",{total:total , token:token}, function (json){
        console.log('procesando');
        console.log(json);
        alert(json.charge_id);
        console.log('finalizado');

      });
    }else{ // ¡Hubo algún problema!
      // Mostramos JSON de objeto error en consola
      console.log('mensaje de prueba de error');
      console.log(Culqi.error);
    }
  };
  </script>
</head>

<body>
  <form method="post" action="https://api.culqi.com/v2/charges">
    <input type="button" value="Pagar" name="buyButton" id="buyButton" >
    <script src="https://checkout.culqi.com/v2"></script>
    <script>
    Culqi.publicKey = 'pk_test_c4pOf4OixsC3jltR';
    </script>
    <script>
    total="<?php echo $_GET['total'] ?>";
    Culqi.settings({
      title: 'Apapáchame',
      currency: 'PEN',
      description: 'www.detallesapapachame.com',
      amount: total
    });
    </script>
    <script>
    $('#buyButton').on('click', function(e) {
      // Abre el formulario con las opciones de Culqi.settings
      Culqi.open();
      e.preventDefault();
    });
    </script>

  </form>
</body>

</html>
