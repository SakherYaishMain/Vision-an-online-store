// Set your publishable key: remember to change this to your live publishable key in production
// See your keys here: https://dashboard.stripe.com/account/apikeys
var stripe = Stripe('pk_test_NVBGVygaZmPHs9lxA3TsStc800pHCW5kX0');
var elements = stripe.elements();

// Set up Stripe.js and Elements to use in checkout form
var style = {
  base: {
    color: "#32325d",
    fontSize: '20px',
    padding: '50px,60px',
  }
};

var card = elements.create("card", { style: style });
card.mount("#card-element");

var form = document.getElementById('payment-form');
var button = document.getElementById('card-button');
var clientSecret = button.dataset.secret;

form.addEventListener('submit', function(ev) {
  ev.preventDefault();
  var cardName = document.getElementById('name').value;
  stripe.confirmCardPayment(clientSecret, {
    payment_method: {
      card: card,
      billing_details: {
        name: cardName
      }
    }
  }).then(function(result) {
    if (result.error) {
      // Show error to your customer (e.g., insufficient funds)
      console.log(result.error.message);
    } else {
      // The payment has been processed!
      if (result.paymentIntent.status === 'succeeded') {
        window.location.replace("index.php");
        // Show a success message to your customer
        // There's a risk of the customer closing the window before callback
        // execution. Set up a webhook or plugin to listen for the
        // payment_intent.succeeded event that handles any business critical
        // post-payment actions.

      }
    }
  });
});

card.on('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});
