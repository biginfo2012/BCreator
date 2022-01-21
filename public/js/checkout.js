// var stripe = Stripe('pk_test_51HFJXiILJ2E8ZE9hbdNMh95ZY3vVsZov6QKFzdelVzN7v4sy2wzqexvXAA5d18EEVcD5liESAC91bkK0LGIzGpGy00ZhKNEm2o');
// var elements = stripe.elements();
// var style = {
//     base: {
//         iconColor: '#000000',
//         color: '#090101',
//         lineHeight: '38px',
//         fontWeight: 300,
//         fontFamily: 'Helvetica Neue',
//         fontSize: '16px',
//
//         '::placeholder': {
//             color: '#8d9195',
//         },
//     },
// };
// var card = elements.create('card', {style: style});
// card.mount('#card-element');
//
// function setOutcome(result) {
//     var errorElement = document.querySelector('.error');
//     errorElement.classList.remove('visible');
//
//     if (result.error) {
//         errorElement.textContent = result.error.message;
//         errorElement.classList.add('visible');
//     }
// }
//
// card.on('change', function(event) {
//     setOutcome(event);
// });
//
// var form = document.getElementById('checkout_form');
// form.addEventListener('submit', function(event) {
//     event.preventDefault();
//
//     stripe.createToken(card).then(function(result) {
//         if (result.error) {
//             // Inform the customer that there was an error.
//             var errorElement = document.getElementById('card-errors');
//             errorElement.textContent = result.error.message;
//         } else {
//             // Send the token to your server.
//             stripeTokenHandler(result.token);
//         }
//     });
// });

// $(document).ready(function () {
//     $('#checkout_btn').click(function (e) {
//         e.preventDefault();
//         if($('[name=pay_setting]:checked').val() == 1){
//             if($('[name=card_name]').val() == ""){
//                 $(document).find('input[name=card_name]').css('border-color', 'red');
//                 return;
//             }
//             $(document).find('input[name=card_name]').css('border-color', '#ccc');
//             if($('[name=card_number]').val() == ""){
//                 $(document).find('input[name=card_number]').css('border-color', 'red');
//                 return;
//             }
//             $(document).find('input[name=card_number]').css('border-color', '#ccc');
//             if($('[name=card_date]').val() == ""){
//                 $(document).find('input[name=card_date]').css('border-color', 'red');
//                 return;
//             }
//             $(document).find('input[name=card_date]').css('border-color', '#ccc');
//             if($('[name=card_cvc]').val() == ""){
//                 $(document).find('input[name=card_cvc]').css('border-color', 'red');
//                 return;
//             }
//             $(document).find('input[name=card_cvc]').css('border-color', '#ccc');
//             $( "#checkout_form" ).submit();
//         }
//         else{
//             $( "#checkout_form" ).submit();
//         }
//
//     })
//
// })
//
// function stripeTokenHandler(token) {
//     // Insert the token ID into the form so it gets submitted to the server
//     var form = document.getElementById('checkout_form');
//     var hiddenInput = document.createElement('input');
//     hiddenInput.setAttribute('type', 'hidden');
//     hiddenInput.setAttribute('name', 'stripeToken');
//     hiddenInput.setAttribute('value', token.id);
//     form.appendChild(hiddenInput);
//
//     // Submit the form
//     form.submit();
// }

$(document).ready(function() {
    var $form = $("#checkout_form");
    $('#checkout_btn').click(function (e) {
        console.log($('[name=pay_setting]:checked').val())
        e.preventDefault();
        if($('[name=pay_setting]:checked').val() == 1){
            if($('[name=card_name]').val() == ""){
                $(document).find('input[name=card_name]').css('border-color', 'red');
                return;
            }
            $(document).find('input[name=card_name]').css('border-color', '#ccc');
            if($('[name=card_number]').val() == "" || $('[name=card_number]').val().length < 16 || $('[name=card_number]').val().length > 20){
                $(document).find('input[name=card_number]').css('border-color', 'red');
                return;
            }
            $(document).find('input[name=card_number]').css('border-color', '#ccc');
            if($('[name=card_month]').val() == "" || $('[name=card_month]').val().length > 2){
                $(document).find('input[name=card_month]').css('border-color', 'red');
                return;
            }
            $(document).find('input[name=card_year]').css('border-color', '#ccc');
            if($('[name=card_year]').val() == "" || $('[name=card_year]').val().length > 4){
                $(document).find('input[name=card_year]').css('border-color', 'red');
                return;
            }
            $(document).find('input[name=card_year]').css('border-color', '#ccc');
            if($('[name=card_cvc]').val() == ""){
                $(document).find('input[name=card_cvc]').css('border-color', 'red');
                return;
            }
            $(document).find('input[name=card_cvc]').css('border-color', '#ccc');
            if (!$form.data('cc-on-file')) {
                e.preventDefault();
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));

                Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-month').val(),
                    exp_year: $('.card-year').val()
                }, stripeResponseHandler);
            }
        }
        else{
            $( "#checkout_form" ).submit();
        }

    });
    function stripeResponseHandler(status, response) {
        if (response.error) {
            if(response.error.code == 'invalid_number'){
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text('カード関連情報を数字形式で入力してください。');
            }
            if(response.error.code == 'incorrect_number'){
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text('カード番号が正しくありません。');
            }
            if(response.error.code == 'invalid_expiry_year'){
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text('カードの有効期限(年)は無効です。');
            }
            if(response.error.code == "invalid_expiry_month"){
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text('カードの有効期限(月)は無効です。');
            }
            if(response.error.code == "invalid_cvc"){
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text('セキュリティコードが無効です。');
            }
            console.log(response)

        } else {
            /* token contains id, last4, and card type */
            var token = response['id'];
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
});
