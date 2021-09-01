<script type="application/javascript" src="https://www.paypal.com/sdk/js?client-id=AYqCJP7-fpd069teA-o2uTrYNxsShjv25eKP7A3gY4Urny7amU1kVdysNIly911TGO4ObtMZ7vSmVM9T"></script>

<script>
    paypal.Buttons().render('#paypal-button-container');
</script>

<script>
    paypal.Buttons({
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '{{ $post->price }}'
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                alert('Transaction completed by ' + details.payer.name.given_name);
            });
        }
    }).render('#paypal-button-container');
</script>