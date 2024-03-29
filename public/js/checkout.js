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
    $('.creditCardText').keypress(function (e) {
        if($(this).val().length == 19){
            e.preventDefault();
        }
    })
    $('.card-cvc').keypress(function (e) {
        if($(this).val().length == 4){
            e.preventDefault();
        }
    })
    $('.creditCardText').keyup(function() {
        var foo = $(this).val().split(" ").join(""); // remove hyphens
        if (foo.length > 0) {
            foo = foo.match(new RegExp('.{1,4}', 'g')).join(" ");
        }
        $(this).val(foo);
    });
    $('#card_date').keypress(function (e) {
        if($(this).val().length == 7){
            e.preventDefault();
        }
    })
    $('#card_date').keydown(function (e) {
        if (e.keyCode == 8) {
            if($(this).val().length == 5){
                let val = $(this).val().substring(0, 2);
                console.log(val);
                $(this).val(val);
            }
        }
    })
    $('#card_date').keyup(function () {
        var val = $(this).val();
        if(val.length == 2){
            if(val.includes('/')){
                if(val == ' /' || val == '/ '){
                    val = '';
                }
            }
            else{
                val = val + ' / ';
            }
        }
        else if(val.length == 1){
            if(val != 1 && val != 0 && !(val.includes('/'))){
                val = '0' + val + ' / ';
            }
            else if(val == ' ' || val == '/'){
                val = '';
            }
        }
        else if(val.length == 3){
            if(val == ' / '){
                val = '';
            }
        }
        $(this).val(val);
    })
    $('#checkout_btn').click(function (e) {
        e.preventDefault();
        if($('[name=btn]:checked').val() == 1){
            if($('[name=card_name]').val() == ""){
                $(document).find('input[name=card_name]').css('border-color', 'red');
                return;
            }
            $(document).find('input[name=card_name]').css('border-color', '#ccc');
            console.log($('[name=card_number]').val());
            if($('[name=creditCardText]').val() == "" || $('[name=creditCardText]').val().length < 19 || $('[name=creditCardText]').val().length > 19){
                $(document).find('input[name=creditCardText]').css('border-color', 'red');
                return;
            }
            $(document).find('input[name=creditCardText]').css('border-color', '#ccc');
            var cardText = $('[name=creditCardText]').val().replaceAll(' ', '');
            $('[name=card_number]').val(cardText);

            var card_date = $('input[name=card_date]').val();
            var dateArr = card_date.split(' / ');
            if(dateArr.length<2 || dateArr.length>2){
                $(document).find('input[name=card_date]').css('border-color', 'red');
                return;
            }
            else{
                if(dateArr[0] == "" || dateArr[0].length > 2){
                    $(document).find('input[name=card_date]').css('border-color', 'red');
                    return;
                }
                else if(dateArr[1] == "" || dateArr[1].length > 2){
                    $(document).find('input[name=card_date]').css('border-color', 'red');
                    return;
                }
                else{
                    $('[name=card_month]').val(dateArr[0]);
                    $('[name=card_year]').val(dateArr[1]);
                }
            }
            $(document).find('input[name=card_date]').css('border-color', '#ccc');

            // if($('[name=card_month]').val() == "" || $('[name=card_month]').val().length > 2){
            //     $(document).find('input[name=card_month]').css('border-color', 'red');
            //     return;
            // }
            // $(document).find('input[name=card_month]').css('border-color', '#ccc');
            // if($('[name=card_year]').val() == "" || $('[name=card_year]').val().length > 4){
            //     $(document).find('input[name=card_year]').css('border-color', 'red');
            //     return;
            // }
            // $(document).find('input[name=card_year]').css('border-color', '#ccc');

            if($('[name=card_cvc]').val() == "" || $('[name=card_cvc]').val().length > 4){
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
        console.log(response);
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

        } else {
            /* token contains id, last4, and card type */
            var token = response['id'];
            var brand = response['card']['brand'];
            console.log(brand);
            //$form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.append("<input type='hidden' name='card_brand' value='" +  + "'/>");
            $form.get(0).submit();
        }
    }
});
