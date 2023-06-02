<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>Proyecto WEB</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  <link rel='stylesheet' type='text/css' media='screen' href='./styles/indexStyle.css'>

  <script language="javascript" src="js/jquery-3.1.1.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
  <link rel='stylesheet' href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />


  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <script src='main.js'></script>
</head>

<body>

  <?php
  include "menu.php";
  ?>

  <?php
  


  ?>

  <div class="container">

    

    <form action="https://app.99inbound.com/e/123" method="POST" target="_blank">
      <h3 style="text-align: center;">Contact Us</h3>

      <div class="form-group">
        <div class="input-group">

        </div>
      </div>



      <div class="form-group">
        <textarea class="form-control" id="message" rows="5" placeholder="Enter message" required></textarea>
      </div>

      <button type="submit" class="btn btn-primary float-right">
        <i class="fa fa-paper-plane"></i>
        Send
      </button>
    </form>
  </div>

  <script>
    // mostrar la notificación después de enviar el formulario
    <?php if ($_GET['enviado'] == 'true') { ?>
      swal("Session Iniciada", "¡Bienvenido de vuelta!", "success");
    <?php } ?>
  </script>

</body>

</html>