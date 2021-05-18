<?php
	$total = 0;
	$SID = session_id();
	foreach($_SESSION['carrito'] as $indice => $dato){

		$total = $total+($dato['precio']);

	}
	//echo '<h3>'.$total.'</h3>';
	//$resultado = new Controller();
	//$resultado -> procesarPagoController($SID, $total);
?>
<div class="jumbotron text-center">
  <h1 class="display-4">!Paso final!</h1>
  <hr class="my-4">
  <img src="vistas/img/tarjetas/paypalhd.png" width="50">
  <p class="lead">Estás a punto de pagar con PayPal la cantidad de:
  	<h3>$<?php echo number_format($total, 2); ?></h3>
  </p>
  <p>Los productos serán enviados al domicilio de tu cuenta una vez que se procese el pago.</p>
  <div id="paypal-button-container"></div>

    <!-- Include the PayPal JavaScript SDK -->
    <script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD"></script>

    <script>
        // Render the PayPal button into #paypal-button-container
        paypal.Buttons({

            style: {
                color:  'blue',
                shape:  'pill',
                label:  'pay',
                height: 40
            }

        }).render('#paypal-button-container');
    </script>
  <p class="lead">
    <b>Para aclaraciones:</b> soporteosomontes@gmail.com
  </p>
</div>
<script>

    paypal.Button.render({

        env: 'sandbox', // sandbox | production

        style: {

            label: 'checkout',  // checkout | credit | pay | buynow | generic

            size:  'responsive', // small | medium | large | responsive

            shape: 'pill',   // pill | rect

            color: 'blue'   // gold | blue | silver | black

        },



        // PayPal Client IDs - replace with your own

        // Create a PayPal app: https://developer.paypal.com/developer/applications/create



        client: {

            sandbox:   'AZDxjDScFpQtjWTOUtWKbyN_bDt4OgqaF4eYXlewfBP4-8aqX3PiV8e1GWU6liB2CUXlkA59kJXE7M6R',

            production: 'insert production client id'

        },



        // Wait for the PayPal button to be clicked



        payment: function(data, actions) {

            return actions.payment.create({

                payment: {

                    transactions: [

                        {

                            amount: { total: '<?php echo $total;?>', currency: 'MXN' }, 

                            description:"Compra de productos a Develoteca:$0.01",

                            custom:"Codigo"

                        }

                    ]

                }

            });

        },



        // Wait for the payment to be authorized by the customer



        onAuthorize: function(data, actions) {

            return actions.payment.execute().then(function() {

                window.aler("Pyment complete");

                console.log(data);

                window.location="verificador.php?paymentToken="+data.paymentToken+"&paymentID="+data.paymentID;

            });

        }

    

    }, '#paypal-button-container');



</script>