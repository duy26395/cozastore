/*global $, document, window, setTimeout, navigator, console, location*/
$(document).ready(function() {

    'use strict';

    var usernameError = true,
        emailError = true,
        passwordError = true,
        passConfirm = true;

    //login submit
    $("#btnlogin").on("click", function(e) {
            var email = $('#loginemail').val()
            var pass = $('#loginPassword').val()
                //check value
            if (email.length > 0 && pass.length > 0) {
                $.ajax({
                    url: './Process/Login.php',
                    type: 'POST',
                    data: {
                        user: email,
                        pass: pass,
                        method: "login"
                    },
                    dataType: 'json',
                    cache: false,
                    success: function(data) {
                        if (data.Islogin) {
                            location.href = "index.php"
                        } else {
                            $(".alert").text(data.Mess)
                            $('.alert').removeClass('d-none').addClass('show');
                            setTimeout(function() { $('.alert').addClass('d-none').removeClass('show'); }, 3050);
                        }
                    }
                })
                $(".alert").text("");

            }
        })
        // Detect browser for css purpose
    if (navigator.userAgent.toLowerCase().indexOf('firefox') > -1) {
        $('.form form label').addClass('fontSwitch');
    }

    // Label effect
    $('input').focus(function() {

        $(this).siblings('label').addClass('active');
    });

    // Form validation
    $('input').blur(function() {

        // User Name
        if ($(this).hasClass('name')) {
            if ($(this).val().length === 0) {
                $(this).siblings('span.error').text('Please type your full name').fadeIn().parent('.form-group').addClass('hasError');
                usernameError = true;
            } else if ($(this).val().length > 1 && $(this).val().length <= 6) {
                $(this).siblings('span.error').text('Please type at least 6 characters').fadeIn().parent('.form-group').addClass('hasError');
                usernameError = true;
            } else {
                $(this).siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
                usernameError = false;
            }
        }
        // Email
        if ($(this).hasClass('email')) {
            if ($(this).val().length == '') {
                $(this).siblings('span.error').text('Please type your email address').fadeIn().parent('.form-group').addClass('hasError');
                emailError = true;
            } else {
                $(this).siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
                emailError = false;
            }
        }

        // PassWord
        if ($(this).hasClass('pass')) {
            if ($(this).val().length < 8) {
                $(this).siblings('span.error').text('Please type at least 8 charcters').fadeIn().parent('.form-group').addClass('hasError');
                passwordError = true;
            } else {
                $(this).siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
                passwordError = false;
            }
        }

        // PassWord confirmation
        if ($('.pass').val() !== $('.passConfirm').val()) {
            $('.passConfirm').siblings('.error').text('Passwords don\'t match').fadeIn().parent('.form-group').addClass('hasError');
            passConfirm = false;
        } else {
            $('.passConfirm').siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
            passConfirm = false;
        }
        // label effect
        if ($(this).val().length > 0) {
            $(this).siblings('label').addClass('active');
        } else {
            $(this).siblings('label').removeClass('active');
        }

    });


    // form switch
    $('a.switch').click(function(e) {
        $(this).toggleClass('active');
        e.preventDefault();

        if ($('a.switch').hasClass('active')) {
            $(this).parents('.form-peice').addClass('switched').siblings('.form-peice').removeClass('switched');
        } else {
            $(this).parents('.form-peice').removeClass('switched').siblings('.form-peice').addClass('switched');
        }
    });


    // Form submit
    $('form.signup-form').submit(function(event) {
        event.preventDefault();

        if (usernameError == true || emailError == true || passwordError == true || passConfirm == true) {
            $('.name, .email, .pass, .passConfirm').blur();
        } else {
            // Regisster
            var username = $('input[name=username]').val()
            var emailAdress = $('input[name=emailAdress]').val()
            var phone = $('input[name=phone]').val()
            var password = $('input[name=password]').val()
            $.ajax({
                url: './Process/Login.php',
                type: 'POST',
                data: {
                    username: username,
                    emailAdress: emailAdress,
                    phone: phone,
                    password: password,
                    method: "register"
                },
                dataType: 'json',
                cache: false,
                success: function(data) {
                    if (data.Isregister) {
                        $('.signup').addClass('switched');
                        // setTimeout(function() { $('.signup, .login').hide(); }, 700);
                        setTimeout(function() { $('.brand').addClass('active'); }, 300);
                        setTimeout(function() { $('.heading').addClass('active'); }, 600);
                        setTimeout(function() { $('.success-msg p').addClass('active'); }, 900);
                        setTimeout(function() { $('.success-msg a').addClass('active'); }, 1050);
                        // setTimeout(function() { $('.form').hide(); }, 700);
                        setTimeout(function() { $('.login').removeClass('switched'); }, 1350);
                    } else {
                        // alert(data.Mess);
                        $(".alert").text(data.Mess)
                        $('.alert').removeClass('d-none').addClass('show');
                        setTimeout(function() { $('.alert').addClass('d-none').removeClass('show'); }, 3050);
                    }
                }
            })
            $(".alert").text('');
        }
    });
    /*===========================================================
        [ Forget password ]*/
    $('.fg').on('click', function() {
        Swal.fire({
            title: 'Input your email',
            input: 'text',
            inputPlaceholder: "example@email.com",
            inputAttributes: {
                autocapitalize: 'off'
            },
            showCancelButton: true,
            confirmButtonText: 'OK',
            showLoaderOnConfirm: true,
            preConfirm: (inputValue) => {
                if (inputValue == "" || inputValue == null) {
                    Swal.showValidationMessage(`Request failed`);
                } else {
                    return ($.ajax({
                            url: './Process/Login.php',
                            type: 'POST',
                            data: {
                                email: inputValue,
                                method: "mail-forget"
                            },
                            dataType: 'json',
                            cache: false,
                            success: function(data) {
                                return data
                            }
                        })).then(response => {
                            return response
                        })
                        .catch(error => {
                            Swal.showValidationMessage(
                                `Request failed: ${error}`
                            )
                        })
                }
            },
            allowOutsideClick: () => {
                swal.fire({
                    html: '<h5>Loading...</h5>',
                    showConfirmButton: false,
                    onRender: function() {
                        // there will only ever be one sweet alert open.
                        $('.swal2-content').prepend(sweet_loader);
                    }
                });
            }
        }).then((result) => {
            if (result.value.IssendMail) {
                Swal.fire({
                    icon: 'success',
                    title: 'Pls check your email',
                    showConfirmButton: false,
                    timer: 2500
                })
            } else {
                Swal.fire({
                    icon: 'error',
                    title: result.value.Mess,
                    showConfirmButton: false,
                    timer: 2500
                });
            }
        });
    })


    /*===========================================================
    [ Social Network Login ]*/
    $('.icoFacebook').on('click', function() {

    })
    $('.icoTwitter').on('click', function() {

    })
    $('.icoGoogle').on('click', function() {

    })

    // Reload page
    $('a.profile').on('click', function() {
        location.reload(true);
    });

    $(".animsition").animsition({
        inClass: 'fade-in',
        outClass: 'fade-out',
        inDuration: 1500,
        outDuration: 800,
        linkElement: '.animsition-link',
        loading: true,
        loadingParentElement: 'html',
        loadingClass: 'animsition-loading-1',
        loadingInner: '<div class="loader05"></div>',
        timeout: false,
        timeoutCountdown: 5000,
        onLoadEvent: true,
        browser: ['animation-duration', '-webkit-animation-duration'],
        overlay: false,
        overlayClass: 'animsition-overlay-slide',
        overlayParentElement: 'html',
        transition: function(url) { window.location.href = url; }
    });

});