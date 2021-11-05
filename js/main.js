/*===================================================================
[ Update header cat ] */
function UpdateheaderCart() {
    $(document).ready(function() {
        var total = 0;
        var numItems = $('.header-cart-item').length;
        $('.js-show-cart').attr("data-notify", numItems);
        $('.header-cart-item-txt').each(function() {
            var itemnum = $(this).find('.header-cart-item-number').text();
            var itemprice = $(this).find('.header-cart-item-price').text();
            total = total + Number(itemnum) * Number(itemprice);
        })
        $('.header-cart-total').html("Total : " + total);
    })
}
/*==================================================================
[ Update header-cart-item ]*/
getdatacookie();

function getdatacookie() {
    $.ajax({
        url: './Process/shoping-cart-header.php',
        type: 'POST',
        data: {
            method: "get-cookie"
        },
        cache: false,
        success: function(data) {
            $(document).ready(function() {
                $('.header-cart-wrapitem').html(data);
                UpdateheaderCart();
            });
        }
    })
};
/*===================================================================
[ Show total cost ] */

function Subtotal() {
    var total = 0;
    $.each($('.table_row'), function(index, value) {
        var numpriceItems = $(value).find(".totalprice").text();
        var numqatyItems = $(value).find(".num-product").attr("value");
        var totalItems = Number(numpriceItems) * Number(numqatyItems)
        $(value).find(".totalcost").html(totalItems);
        total = total + Number(numpriceItems) * Number(numqatyItems)
    });
    $('#Subtotal').html(total)
    $('#TotalOder').html(total)
};
/*==================================================================
[ Show item product ]*/
var pageItems = 1;
ViewItemsproduct();

function ViewItemsproduct(key, key_category) {
    $.ajax({
        url: './Process/View-data.php',
        type: 'POST',
        data: {
            method: "get-itemproduct",
            pageItems: pageItems,
            keySearch: key,
            key_category
        },
        cache: false,
        success: function(data) {
            $('.isotope-grid').hide().html(data).fadeIn('slow');
        }
    })
}
/*==================================================================
[ Show img modal ]*/
$('.gallery-lb').each(function() { // the containers for all your galleries
    $(this).magnificPopup({
        delegate: 'a', // the selector for gallery item
        type: 'image',
        gallery: {
            enabled: true
        },
        mainClass: 'mfp-fade'
    });
});
/*==================================================================
[ Show img View Thumbnail Product ]*/
function ViewimgThumbnail() {
    $('.wrap-slick3-Modal').each(function() {
        $(this).find('.slick3').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            fade: true,
            infinite: true,
            autoplay: false,
            autoplaySpeed: 6000,

            arrows: true,
            appendArrows: $('.wrap-slick3-arrows'),
            prevArrow: '<button class="arrow-slick3 prev-slick3"><i class="fa fa-angle-left" aria-hidden="true"></i></button>',
            nextArrow: '<button class="arrow-slick3 next-slick3"><i class="fa fa-angle-right" aria-hidden="true"></i></button>',

            dots: true,
            appendDots: $('.wrap-slick3-dots'),
            dotsClass: 'slick3-dots',
            customPaging: function(slick, index) {
                var portrait = $(slick.$slides[index]).data('thumb');
                return '<img src=" ' + portrait + ' "/><div class="slick3-dot-overlay"></div>';
            },
        });
    });
}
/*==================================================================
[ Show img View Thumbnail Product DETAIL ]*/
function ViewimgThumbnailProductDetail() {
    $('.wrap-slick3-ProductDetail').each(function() {
        $(this).find('.slick3').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            fade: true,
            infinite: true,
            autoplay: false,
            autoplaySpeed: 6000,

            arrows: true,
            appendArrows: $('.wrap-slick3-arrows-ProductDetail'),
            prevArrow: '<button class="arrow-slick3 prev-slick3"><i class="fa fa-angle-left" aria-hidden="true"></i></button>',
            nextArrow: '<button class="arrow-slick3 next-slick3"><i class="fa fa-angle-right" aria-hidden="true"></i></button>',

            dots: true,
            appendDots: $('.wrap-slick3-dots-ProductDetail'),
            dotsClass: 'slick3-dots',
            customPaging: function(slick, index) {
                var portrait = $(slick.$slides[index]).data('thumb');
                return '<img src=" ' + portrait + ' "/><div class="slick3-dot-overlay"></div>';
            },
        });
    });
}
$(document).ready(function() {
    "use strict";

    /*[ Load page ]
    ===========================================================*/

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
        timeout: true,
        timeoutCountdown: 3000,
        onLoadEvent: true,
        browser: ['animation-duration', '-webkit-animation-duration'],
        overlay: false,
        overlayClass: 'animsition-overlay-slide',
        overlayParentElement: 'html',
        transition: function(url) { window.location.href = url; }
    });

    /*[ Back to top ]
    ===========================================================*/
    var windowH = $(window).height() / 2;

    $(window).on('scroll', function() {
        if ($(this).scrollTop() > windowH) {
            $("#myBtn").css('display', 'flex');
        } else {
            $("#myBtn").css('display', 'none');
        }
    });

    $('#myBtn').on("click", function() {
        $('html, body').animate({ scrollTop: 0 }, 600);
    });


    /*==================================================================
    [ Fixed Header ]*/
    var headerDesktop = $('.container-menu-desktop');
    var wrapMenu = $('.wrap-menu-desktop');

    if ($('.top-bar').length > 0) {
        var posWrapHeader = $('.top-bar').height();
    } else {
        var posWrapHeader = 0;
    }


    if ($(window).scrollTop() > posWrapHeader) {
        $(headerDesktop).addClass('fix-menu-desktop');
        $(wrapMenu).css('top', 0);
    } else {
        $(headerDesktop).removeClass('fix-menu-desktop');
        $(wrapMenu).css('top', posWrapHeader - $(this).scrollTop());
    }

    $(window).on('scroll', function() {
        if ($(this).scrollTop() > posWrapHeader) {
            $(headerDesktop).addClass('fix-menu-desktop');
            $(wrapMenu).css('top', 0);
        } else {
            $(headerDesktop).removeClass('fix-menu-desktop');
            $(wrapMenu).css('top', posWrapHeader - $(this).scrollTop());
        }
    });


    /*==================================================================
    [ Menu mobile ]*/
    $('.btn-show-menu-mobile').on('click', function() {
        $(this).toggleClass('is-active');
        $('.menu-mobile').slideToggle();
    });

    var arrowMainMenu = $('.arrow-main-menu-m');

    for (var i = 0; i < arrowMainMenu.length; i++) {
        $(arrowMainMenu[i]).on('click', function() {
            $(this).parent().find('.sub-menu-m').slideToggle();
            $(this).toggleClass('turn-arrow-main-menu-m');
        })
    }

    $(window).resize(function() {
        if ($(window).width() >= 992) {
            if ($('.menu-mobile').css('display') == 'block') {
                $('.menu-mobile').css('display', 'none');
                $('.btn-show-menu-mobile').toggleClass('is-active');
            }

            $('.sub-menu-m').each(function() {
                if ($(this).css('display') == 'block') {
                    $(this).css('display', 'none');
                    $(arrowMainMenu).removeClass('turn-arrow-main-menu-m');
                }
            });

        }
    });

    /*==================================================================
    [ Show item category ]*/
    $(window).on('load', function() {
        $.ajax({
            url: './Process/View-data.php',
            type: 'POST',
            data: {
                method: "get-category"
            },
            cache: false,
            success: function(data) {
                $('.filter-tope-group').hide().append(data).fadeIn('slow');
            }
        })
    });

    /*==================================================================
    [ Show / hide login user]
 

    /*==================================================================
    [ Show / hide modal search ]*/
    $('.js-show-modal-search').on('click', function() {
        $('.modal-search-header').addClass('show-modal-search');
        $(this).css('opacity', '0');
    });

    $('.js-hide-modal-search').on('click', function() {
        $('.modal-search-header').removeClass('show-modal-search');
        $('.js-show-modal-search').css('opacity', '1');
    });

    $('.container-search-header').on('click', function(e) {
        e.stopPropagation();
    });
    /*==================================================================
    [ Isotope new ]*/
    // filter items on button click
    // $filter.each(function() {
    $(document).on('click', '.filter-tope-group', function(e) {
        var catid = $('.how-active1').attr('data-id');
        var textSearch = $("input[name=search-product]").val();
        ViewItemsproduct(textSearch, catid);
    });

    $(document).on('click', '.filter-tope-group button', function(e) {
            var isotopeButton = $('.filter-tope-group button')
            for (var i = 0; i < isotopeButton.length; i++) {
                $(isotopeButton[i]).removeClass('how-active1');
            }
            $(this).addClass('how-active1');
            pageItems = 1;
        })
        // $(document).on('click', '.js-all-itemproduct', function(e) {
        //         var catid = $('.how-active1').attr('data-id');
        //         var textSearch = $("input[name=search-product]").val();

    //         ViewItemsproduct(textSearch, catid);

    //     })
    /*==================================================================
        [ Isotope old ]*/

    // // filter items on button click

    // $(document).on('click', '.filter-tope-group button', function(e) {
    //     var $topeContainer = $('.isotope-grid');
    //     var filterValue = $(this).attr('data-filter');
    //     $topeContainer.isotope({ filter: filterValue });
    // })
    // $(document).on('click', '.filter-tope-group button', function(e) {
    //     var isotopeButton = $('.filter-tope-group button');
    //     for (var i = 0; i < isotopeButton.length; i++) {
    //         $(isotopeButton[i]).removeClass('how-active1');
    //     }
    //     $(this).addClass('how-active1');
    // });
    /*==================================================================
    [ Filter / Search product ]*/
    $('.js-show-filter').on('click', function() {
        $(this).toggleClass('show-filter');
        $('.panel-filter').slideToggle(400);

        if ($('.js-show-search').hasClass('show-search')) {
            $('.js-show-search').removeClass('show-search');
            $('.panel-search').slideUp(400);
        }
    });

    $('.js-show-search').on('click', function() {

        $(this).toggleClass('show-search');
        $('.panel-search').slideToggle(400);

        if ($('.js-show-filter').hasClass('show-filter')) {
            $('.js-show-filter').removeClass('show-filter');
            $('.panel-filter').c
        }
    });

    /*==================================================================
    [ Cart ]*/
    $('.js-show-cart').on('click', function() {
        $('.js-panel-cart').addClass('show-header-cart');
    });

    $('.js-hide-cart').on('click', function() {
        $('.js-panel-cart').removeClass('show-header-cart');
    });

    /*==================================================================
    [ Cart ]*/
    $('.js-show-sidebar').on('click', function() {
        $('.js-sidebar').addClass('show-sidebar');
    });

    $('.js-hide-sidebar').on('click', function() {
        $('.js-sidebar').removeClass('show-sidebar');
    });

    /*==================================================================
    [ +/- num product ]*/
    var idtempcart;
    var Numtempcart;
    $(document).on('click', '.btn-num-product-down', function(e) {
        var numProduct = Number($(this).next().val());
        if (numProduct > 1) {
            $(this).next().val(numProduct - 1);
            Numtempcart = Number(numProduct - 1)
            $(this).closest('.table_row').find(".num-product").attr("value", Numtempcart);
            idtempcart = $(this).closest('.table_row').attr("data-id");
            editItems(idtempcart, Numtempcart);
        } else {
            Swal.fire({
                title: 'Number product is undefined',
                text: 'Error',
                icon: 'warning',
                showConfirmButton: false,
                timer: 2500
            })

        }
    });
    $(document).on('click', '.btn-num-product-up', function(e) {
        var numProduct = Number($(this).prev().val());
        $(this).prev().val(numProduct + 1);

        Numtempcart = Number(numProduct + 1);
        $(this).closest('.table_row').find(".num-product").attr("value", Numtempcart);
        idtempcart = $(this).closest('.table_row').attr("data-id");

        editItems(idtempcart, Numtempcart);
    });

    function editItems(id, num) {
        if (id != null) {
            $.ajax({
                url: './Process/shoping-cart-index.php',
                type: 'POST',
                data: {
                    method: "edit-itemcart",
                    id: id,
                    num: num
                },
                dataType: 'json',
                cache: false,
                success: function(data) {
                    if (data.isEditItems) {
                        getdatacookie();
                        Subtotal();
                    }
                }
            });
        }

    }
    /*==================================================================
    [ Rating ]*/
    $('.wrap-rating').each(function() {
        var item = $(this).find('.item-rating');
        var rated = -1;
        var input = $(this).find('input');
        $(input).val(0);

        $(item).on('mouseenter', function() {
            var index = item.index(this);
            var i = 0;
            for (i = 0; i <= index; i++) {
                $(item[i]).removeClass('zmdi-star-outline');
                $(item[i]).addClass('zmdi-star');
            }

            for (var j = i; j < item.length; j++) {
                $(item[j]).addClass('zmdi-star-outline');
                $(item[j]).removeClass('zmdi-star');
            }
        });

        $(item).on('click', function() {
            var index = item.index(this);
            rated = index;
            $(input).val(index + 1);
        });

        $(this).on('mouseleave', function() {
            var i = 0;
            for (i = 0; i <= rated; i++) {
                $(item[i]).removeClass('zmdi-star-outline');
                $(item[i]).addClass('zmdi-star');
            }
            for (var j = i; j < item.length; j++) {
                $(item[j]).addClass('zmdi-star-outline');
                $(item[j]).removeClass('zmdi-star');
            }
        });
    });

    /*==================================================================
    [ Show modal1 ]*/
    $(document).on('click', '.js-show-modal1', function(e) {
        // $('.js-show-modal1').each(function() {
        // $('.js-show-modal1').on('click', function() {
        //reset slcik
        $('.wrap-slick3-Modal').html('<div class="wrap-slick3-dots"></div><div class="wrap-slick3-arrows flex-sb-m flex-w"></div><div class="slick3 gallery-lb"></div>');

        var id = $(this).closest(".isotope-item").attr('data-id');
        var img = $(this).parent().find("img").attr('src');
        $('.js-modal1').addClass('show-modal1');
        $('.js-modal1').attr("data-id", id);
        $.ajax({
            url: './Process/show-modal1.php',
            type: 'POST',
            data: {
                iditem: id,
                method: "view-product-detail"
            },
            cache: false,
            dataType: 'json',
            success: function(data) {
                if (data.IsView) {
                    $.ajax({
                        url: './Process/show-modal1.php',
                        type: 'POST',
                        data: {
                            method: "view-thumbnail-product",
                            iditem: id
                        },
                        cache: false,
                        success: function(data) {
                            $('.gallery-lb').html(data);
                            ViewimgThumbnail();
                        }
                    });
                    $('.js-show-modal1').attr("data-thumb", img)
                    $('.Modal1-Productname').html(data.Productname);
                    $('.Modal1-Price').html(data.Price);
                    $('.Modal1-Description').html(data.Description);
                } else {
                    Swal.fire({
                        title: 'Error',
                        text: data.IsView,
                        icon: 'warning',
                        showConfirmButton: false,
                        timer: 2500
                    })
                }
            }
        })
    });
    // $(document).on('click', '.js-hide-modal1', function(e) {
    $('.js-hide-modal1').on('click', function() {
        $('.js-modal1').removeClass('show-modal1');
        $('.js-modal2').removeClass('show-modal1');
        $(this).closest('.js-modal1').find(
            'select[name=colorProduct]').val('').change();
        $(this).closest('.js-modal1').find(
            'select[name=sizeProduct]').val('').change();;
        $(this).closest('.js-modal1').find(
            'input[name=num-product]').val('1');

    });

    /*==================================================================
    [ Search Items Product ]*/

    $(document).keyup(function(e) {
        if ($("input[name=search-product]")) {
            // $('input[name=search-product]').keyup(function() {
            // init Isotope
            var catid = $('.how-active1').attr('data-id');
            var textSearch = $("input[name=search-product]").val();
            ViewItemsproduct(textSearch, catid);
            // var filterValue = $(this).attr('data-filter');
        }
    });

    $(document).keyup(function(e) {
        if ($("input[name=search]:focus") && (e.keyCode === 13)) {
            var textSearch = $("input[name=search]").val();
            if (textSearch == null) {
                $(location).attr('href', 'product.php');
            } else $(location).attr('href', 'product.php?search=' + textSearch);
        }
    });

    /*==================================================================
    [ Page Load More Items ]*/
    $(document).on('click', '.js-page-loadmore', function() {
        // $('.js-page-loadmore').on('click', function() {
        pageItems = pageItems + 1;
        var key_category = $('.how-active1').attr('data-id');
        var keySearch = $("input[name=search-product]").val();
        $.ajax({
            url: './Process/View-data.php',
            type: 'POST',
            data: {
                method: "get-itemproduct",
                pageItems: pageItems,
                keySearch,
                key_category
            },
            cache: false,
            success: function(data) {
                if (data) {
                    $('.isotope-grid').append(data);
                } else {
                    pageItems = pageItems - 1;
                }
            }
        })

    });
    /*==================================================================
    [ Product Detail Modal ]*/

    $('.js-addwish-b2').on('click', function(e) {
        e.preventDefault();
    });

    $('.js-addwish-b2').each(function() {
        var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
        $(this).on('click', function() {
            Swal.fire({
                title: nameProduct,
                text: "is added to wishlist !",
                icon: 'success',
                showConfirmButton: false,
                timer: 2000
            })

            $(this).addClass('js-addedwish-b2');
            $(this).off('click');
        });
    });

    $('.js-addwish-detail').each(function() {
        var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

        $(this).on('click', function() {
            Swal.fire({
                title: nameProduct,
                text: "is added to wishlist !",
                icon: 'success',
                showConfirmButton: false,
                timer: 3500
            })
            $(this).addClass('js-addedwish-detail');
            $(this).off('click');
        });
    });
    /*---------------------------------------------*/
    $('.js-addcart-detail').each(function() {
        $(this).on('click', function(e) {
            var nameProduct = $(this).parent().parent().parent().parent().find(
                    '.js-name-detail')
                .html();
            var idProduct = $(this).closest('.js-modal1').attr('data-id');
            var priceProduct = $(this).parent().parent().parent().parent().find(
                '.Modal1-Price').html();

            var sizeProduct = $(this).closest('.js-modal1').find(
                'select[name=sizeProduct]').val();
            var colorProduct = $(this).closest('.js-modal1').find(
                'select[name=colorProduct]').val();
            var noteitemProduct = $(this).closest('.js-modal1').find(
                'input[name=noteitem]').val();
            var numberProduct = $(this).closest('.js-modal1').find(
                'input[name=num-product]').val();
            var imgthumbnail = $('.js-show-modal1').attr("data-thumb")
            if (sizeProduct === '' || sizeProduct === null) {
                var error = $(this).closest('.js-modal1').find(
                    'select[name=sizeProduct]').parent();
                error.addClass('bor18');
            }
            if (colorProduct === '' || colorProduct === null) {
                $(this).closest('.js-modal1').find(
                    'select[name=colorProduct]').parent().addClass('bor18')
            }
            if (colorProduct === '' || sizeProduct === '') {
                return;
            }
            var setitiem = {
                id: idProduct,
                name: nameProduct,
                price: priceProduct,
                quantity: numberProduct,
                size: sizeProduct,
                color: colorProduct,
                note: noteitemProduct,
                img: imgthumbnail,
                method: "add-item"
            }
            $.ajax({
                url: './Process/shoping-cart-header.php',
                type: 'POST',
                data: setitiem,
                cache: false,
                success: function() {
                    getdatacookie();
                }
            })
            Swal.fire({
                title: nameProduct,
                text: "is added to cart !",
                icon: 'success',
                showConfirmButton: false,
                timer: 2000
            })
            $(this).closest('.js-modal1').find(
                'select[name=colorProduct]').val('').change();
            $(this).closest('.js-modal1').find(
                'select[name=sizeProduct]').val('').change();;
            $(this).closest('.js-modal1').find(
                'input[name=num-product]').val('1')
        });
    });

    $('select').on('change', function() {
        var rmoveclass = $(this).parent();
        if (rmoveclass.hasClass('bor18')) {
            rmoveclass.removeClass('bor18');
        }
    });
    $('input').on('change', function() {
        var rmoveclass = $(this).parent();
        if (rmoveclass.hasClass('bor18')) {
            rmoveclass.removeClass('bor18');
        }
    });
    /*==================================================================
    [ Product Detail page ]*/
})