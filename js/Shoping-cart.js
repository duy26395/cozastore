$(document).ready(function() {
    "use strict";
    var totaloder, name, phone, email;

    /*==================================================================
            [ Show modal2 ]*/
    $(document).on('click', '.js-show-modal2', function(e) {

        if ($('.js-confitmpass').hasClass('d-none')) {
            $('.js-confitmpass').removeClass('d-none');
            $('.js-payment').addClass('d-none');
        }

        var idmember = $(this).attr('data-id');
        totaloder = $('#TotalOder').text();
        name = $(this).parent().find('input[name=Name]').val();
        phone = $(this).parent().find('input[name=Phone]').val()
        email = $(this).parent().find('input[name=email]').val()
        var provice = $(this).parent().find('select[name=provice]').val()
        var district = $(this).parent().find('select[name=district]').val()
        var ward = $(this).parent().find('select[name=ward]').val()
        var adressdt = $(this).parent().find('input[name=addressdetail]').val()
        var address = adressdt + '-' + ward + '-' + district + '-' + provice;
        var phonecode = '+84' + parseInt(phone);
        if (idmember === '' || idmember === null) {
            if (name === '' || name === null) {
                var error = $(this).parent().find('input[name=Name]').parent();
                error.addClass('bor18');
            }
            if (phone === '' || phone === null) {
                $(this).parent().find('input[name=Phone]').parent().addClass('bor18')
            }
            if (name === '' || name === null) {
                var error = $(this).parent().find('input[name=Name]').parent();
                error.addClass('bor18');
            }
            if (provice === '' || provice === null) {
                $(this).parent().find('select[name=provice]').parent().addClass('bor18')
            }
            if (district === '' || district === null) {
                $(this).parent().find('select[name=district]').parent().addClass('bor18')
            }
            if (ward === '' || ward === null) {
                $(this).parent().find('select[name=ward]').parent().addClass('bor18')
            }
            if (name === '' || phone === '' || provice === '' || district === '' || ward === '') {
                return;
            }
            $('.js-modal2').addClass('show-modal1');
            $('div[name=Namemodal2]').text(name);
            $('div[name=totalpayment]').text(new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(totaloder));
            // $('div[name=totalpayment]').text(totaloder);
            $('div[name=Phoneverifycode]').text(phone);

            sendOTP(phonecode);
            $.ajax({
                url: './Process/shoping-cart-index.php',
                type: 'POST',
                data: {
                    memberid: idmember,
                    total: totaloder,
                    name: name,
                    phone: phone,
                    email: email,
                    address: address,
                    method: "add-orderdetail"
                },
                dataType: 'json',
                cache: false,
                success: function(data) {
                    if (data.Isorders) {
                        $('div[name=idorder]').text(data.idorder);
                    } else {
                        Swal.fire({
                            title: 'ERROR!',
                            text: data.Mess,
                            icon: 'error',
                            showConfirmButton: false,
                            timer: 2500
                        })
                    }
                }
            })
        }
        if (parseInt(totaloder) <= 0) {
            Swal.fire({
                icon: 'error',
                title: "None value in cart",
                showConfirmButton: false,
                timer: 2500
            });
            return;
        }
        // $('.js-modal2').addClass('show-modal1');
    });
    $(document).on('click', '.js-hide-modal2', function(e) {
        $('.js-modal2').removeClass('show-modal1');
    });
    $(document).on('click', '.js-btn-payment', async function(e) {
        var payment = $('select[name=payment]').val();
        if (payment === '' || payment === null) {
            $('select[name=payment]').parent().addClass('bor18')
            return;
        }
        Swal.fire({
            title: 'Are you sure?',
            text: "Are you want order!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, do it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Order successfully!',
                    text: 'Your pls wait product confirm',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 3500
                })
            }
        })

    })
    $(document).on('change', '.js-sel-modal2', function(e) {
        var payment = $('select[name=payment]').val();
        switch (payment) {
            case "":
                $('.js-img-payment').addClass('d-none');
                $('.js-bank-payment').addClass('d-none');
                $('.js-payment-atm').addClass('d-none');
                $('.js-payment-vsmc').addClass('d-none');
                $('.js-confirm-order').addClass('d-none');
                break;
            case "cod":
                if ($('.js-confirm-order').hasClass('d-none')) {
                    $('.js-confirm-order').removeClass('d-none').fadeIn();

                    $('.js-img-payment').addClass('d-none');
                    $('.js-bank-payment').addClass('d-none');
                    $('.js-payment-atm').addClass('d-none');
                    $('.js-payment-vsmc').addClass('d-none');
                }
                break;
            case "zalo":
                if ($('.js-img-payment').hasClass('d-none')) {
                    $('.js-img-payment').removeClass('d-none').fadeIn();
                    $('.js-img-payment img').attr('src', 'images/ZaloPay_QRCode.jpg');
                    $('.js-bank-payment').addClass('d-none');
                    $('.js-payment-atm').addClass('d-none');
                    $('.js-payment-vsmc').addClass('d-none');
                } else {
                    $('.js-img-payment img').attr('src', 'images/ZaloPay_QRCode.jpg');
                }
                break;
            case "momo":
                if ($('.js-img-payment').hasClass('d-none')) {
                    $('.js-img-payment').removeClass('d-none').fadeIn();
                    $('.js-img-payment img').attr('src', 'images/MoMo_QRCode.png');

                    $('.js-bank-payment').addClass('d-none');
                    $('.js-payment-atm').addClass('d-none');
                    $('.js-payment-vsmc').addClass('d-none');
                } else {
                    $('.js-img-payment img').attr('src', 'images/MoMo_QRCode.png');
                }
                break;
            case "viettelpay":
                if ($('.js-img-payment').hasClass('d-none')) {
                    $('.js-img-payment').removeClass('d-none').fadeIn();
                    $('.js-img-payment img').attr('src', 'images/Viettelpay_QRCode.png')

                    $('.js-bank-payment').addClass('d-none');
                    $('.js-payment-atm').addClass('d-none');
                    $('.js-payment-vsmc').addClass('d-none');
                } else {
                    $('.js-img-payment img').attr('src', 'images/Viettelpay_QRCode.png')

                }
                break;
            case "atmonline":
                $('.js-confirm-order').addClass('d-none');
                if ($('.js-payment-atm').hasClass('d-none')) {
                    $('.js-payment-atm').removeClass('d-none').fadeIn();

                    $('.js-img-payment').addClass('d-none');
                    $('.js-payment-vsmc').addClass('d-none');
                    $('.js-bank-payment').addClass('d-none');
                }
                break;
            case "visamasterracd":
                if ($('.js-payment-vsmc').hasClass('d-none')) {
                    $('.js-payment-vsmc').removeClass('d-none').fadeIn();

                    $('.js-img-payment').addClass('d-none');
                    $('.js-payment-atm').addClass('d-none');
                    $('.js-bank-payment').addClass('d-none');
                }

                break;
            case "bank":
                if ($('.js-bank-payment').hasClass('d-none')) {
                    $('.js-bank-payment').removeClass('d-none').fadeIn();

                    $('.js-img-payment').addClass('d-none');
                    $('.js-payment-atm').addClass('d-none');
                    $('.js-payment-vsmc').addClass('d-none');
                }
                break;
        }
    });
    $(document).on('click', '.js-payment-onl', function(e) {
        var order_id = $('div[name=idorder]').text();
        var option_payment = $(this).attr('value');
        var bankcode = $("input[name='bankcode']:checked").val();
        if (bankcode == null || bankcode == '') {
            Swal.fire({
                icon: 'error',
                title: "Bank code value is not null",
                showConfirmButton: false,
                timer: 2000
            });
            return;
        }
        $.ajax({
            url: './Process/shoping-cart-index.php',
            type: 'POST',
            data: {
                totaloder,
                name,
                phone,
                email,
                order_id,
                option_payment,
                bankcode,
                method: "payment-onl"
            },
            dataType: 'json',
            cache: false,
            success: function(data) {
                if (data.isCheckout) {
                    var url = "https://checkout.nganluong.vn/version31/index/token_code/" + data.link_NL;
                    window.open(
                        url, "_blank");
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: data.Mess,
                        showConfirmButton: false,
                        timer: 2000
                    });
                }
            }
        })
    })

});