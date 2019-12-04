@extends('layout')

@section('content')

<div class="breadcumb-area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
        <div class="bradcumbContent">
            <h2>Premium</h2>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### About Us Area Start ##### -->
    <section class="about-us-area mt-50 section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center mx-auto wow fadeInUp" data-wow-delay="100ms">
                        <span></span>
                        <h3>Beneficios de nuestro plan premium</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                    <p>Cras vitae turpis lacinia, lacinia lacus non, fermentum nisi. Donec et sollicitudin est, in euismod. Morbi vel arcu gravida, iaculis lacus vel, posuere ipsum. Sed faucibus mauris vitae urna consectetur, sit amet maximus nisl sagittis. Ut in iaculis enim, et pulvinar mauris. Etiam tristique magna eget velit consectetur, a tincidunt velit dictum. Cras vulputate metus id felis ornare hendrerit. Maecenas sodales suscipit ipsum.</p>
                </div>
                <div class="col-12 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                    <p>Vitae turpis lacinia, lacinia lacus non, fermentum nisi. Donec et sollicitudin est, in euismod. Morbi vel arcu gravida, iaculis lacus vel, posuere ipsum. Sed faucibus mauris vitae urna consectetur, sit amet maximus nisl sagittis. Ut in iaculis enim, et pulvinar mauris. Etiam tristique magna eget velit consectetur, a tincidunt velit dictum. Cras vulputate metus id felis ornare hendrerit. Maecenas sodales suscipit ipsum.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### About Us Area End ##### -->

	<section class="about-us-area mt-20 section-padding-20">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center mx-auto wow fadeInUp" data-wow-delay="300ms">
                        <span></span>
                        <h3>Costo</h3>
                    </div>
                        <div class="row">
		                <div class="col-12 text-center wow fadeInUp" data-wow-delay="100ms">
		                    <h5>Podras contratar el plan premium de Aldea por $99.00 mxn por semestre</h5>
		                </div>
		            </div>
                </div>
            </div>
        </div>
    </section>

   <script src="https://www.paypalobjects.com/api/checkout.js"></script>
        <script>
            var total ="99";

            paypal.Button.render({
                env: 'sandbox', // sandbox | production

                // PayPal Client IDs - replace with your own
                // Create a PayPal app: https://developer.paypal.com/developer/applications/create
                client: {
                    sandbox:    'Ac3ohxQVVQOPHr4262bqY39pmW-K9Ny2BFd6NS7oZR3s7UREfEciVjNDYra2v1XWZAemqfYdOio96bJd',
                    production: ''
                },


                // Show the buyer a 'Pay Now' button in the checkout flow
                commit: true,

                // payment() is called when the button is clicked
                payment: function(data, actions) {

                    // Make a call to the REST api to create the payment
                    return actions.payment.create({
                        payment: {
                            transactions: [
                                {
                                    amount: { total: total.toFixed(2), currency: 'MXN' }//"'"+total.toFixed(2)+"'"
                                }
                            ]
                        }
                    });
                },

                // onAuthorize() is called when the buyer approves the payment
                onAuthorize: function(data, actions) {

                    // Make a call to the REST api to execute the payment
                    return actions.payment.execute().then(function() {
                        window.location = '{{ route('premium', [$user->id]) }}';
                    });
                }
            }, '#paypal-button');
        </script>



    <!-- ##### About Us Area Start ##### -->
    <section class="about-us-area mt-20 section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center mx-auto wow fadeInUp" data-wow-delay="200ms">
                        <span></span>
                        <h3>Contrata</h3>
                    </div>
                </div>
            </div>
            <div class="classy-nav-container">
            	<!-- ##### Tarjeta ##### -->
                <div class="conatiner">
			        <h5>Metodo de pago</h5>
			    </div>
			    <div class="payment">
			        <form>
			            <div class="form-group">
			                <label for="owner">Nombre del titular</label>
			                <input type="text" class="form-control" id="owner">
			            </div>
			            <div class="form-group" id="card-number-field">
			                <label for="cardNumber">Numero de tarjeta</label>
			                <input type="text" class="form-control" id="cardNumber">
			            </div>
			            <div class="form-group CVV">
			                <label for="cvv">CVV</label>
			                <input type="text" class="form-control" id="cvv">
			            </div>
			            <div class="form-group" id="expiration-date">
			                <label>Fecha de expiración</label>
			                <select>
			                    <option value="01">Enero</option>
			                    <option value="02">Febrero </option>
			                    <option value="03">Marzo</option>
			                    <option value="04">Abril</option>
			                    <option value="05">Mao</option>
			                    <option value="06">Junio</option>
			                    <option value="07">Julio</option>
			                    <option value="08">Augostp</option>
			                    <option value="09">Septiembre</option>
			                    <option value="10">Octubre</option>
			                    <option value="11">Noviembre</option>
			                    <option value="12">Diciembre</option>
			                </select>
			                <select>
			                    <option value="19"> 2019</option>
			                    <option value="20"> 2020</option>
			                    <option value="21"> 2021</option>
			                    <option value="22"> 2022</option>
			                    <option value="23"> 2023</option>
			                    <option value="24"> 2024</option>
			                </select>
			            </div>
			            <div class="form-group" id="credit_cards">
			                <img src="img/proyect/visa.png" id="visa" width="100" height="100">
			                <img src="img/proyect/mastercard.png" id="mastercard" width="100" height="100">
			                <img src="img/proyect/amex.jpg" id="amex" width="100" height="100">
			            </div>
			            <div class="form-group" id="pay-now">
			                <button type="submit" class="btn btn-default" id="confirm-purchase">Enviar</button>
			            </div>
			        </form>
			    </div>
                <!-- ##### tarjeta ##### -->
            </div>
        </div>
    </section>
    
@stop
