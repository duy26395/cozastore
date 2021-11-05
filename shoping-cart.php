<?php
// Initialize the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Shoping Cart</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.png" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--===============================================================================================-->
    <script src="https://www.gstatic.com/firebasejs/7.20.0/firebase.js"></script>

</head>

<body class="animsition">

    <!-- Header -->
    <header class="header-v4">
        <!-- Header desktop -->
        <div class="container-menu-desktop">
            <!-- Topbar -->
            <div class="top-bar">
                <div class="content-topbar flex-sb-m h-full container">
                    <div class="left-top-bar">
                        Free shipping for standard order over $100
                    </div>

                    <div class="right-top-bar flex-w h-full">
                        <a href="#" class="flex-c-m trans-04 p-lr-25">
                            Help & FAQs
                        </a>

                        <a href="#" class="flex-c-m trans-04 p-lr-25">
                            My Account
                        </a>

                        <a href="#" class="flex-c-m trans-04 p-lr-25">
                            EN
                        </a>

                        <a href="#" class="flex-c-m trans-04 p-lr-25">
                            USD
                        </a>
                    </div>
                </div>
            </div>

            <div class="wrap-menu-desktop how-shadow1">
                <nav class="limiter-menu-desktop container">

                    <!-- Logo desktop -->
                    <a href="index.php" class="logo">
                        <img src="images/icons/logo-01.png" alt="IMG-LOGO">
                    </a>

                    <!-- Menu desktop -->
                    <div class="menu-desktop">
                        <ul class="main-menu">
                            <li>
                                <a href="index.php">Home</a>
                            </li>
                            <li>
                                <a href="product.php">Category</a>
                            </li>
                            <li>
                                <a href="about.html">About</a>
                            </li>

                            <li>
                                <a href="contact.php">Contact</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Icon header -->
                    <div class="wrap-icon-header flex-w flex-r-m">
                        <?php if (isset($_SESSION["loggedin"])) {?>
                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11">
                            <p class="block1-info stext-102 trans-04"><?php echo $_SESSION["fullname"]; ?></p>
                        </div>
                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11">
                            <a href="facebook-Login/logout.php"><i class="zmdi zmdi-sign-in"></i></a>
                        </div>
                        <?php
} else {?>
                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11">

                            <a href="login.php"><i class="zmdi zmdi-accounts"></i></a>
                        </div>

                        <?php
}?>
                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                            <i class="zmdi zmdi-search"></i>
                        </div>

                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart"
                            data-notify="2">
                            <i class="zmdi zmdi-shopping-cart"></i>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

        <!-- Header Mobile -->
        <div class="wrap-header-mobile">
            <!-- Logo moblie -->
            <div class="logo-mobile">
                <a href="index.php"><img src="images/icons/logo-01.png" alt="IMG-LOGO"></a>
            </div>

            <!-- Icon header -->
            <div class="wrap-icon-header flex-w flex-r-m m-r-15">
                <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
                    <i class="zmdi zmdi-search"></i>
                </div>

                <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart"
                    data-notify="2">
                    <i class="zmdi zmdi-shopping-cart"></i>
                </div>

                <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti"
                    data-notify="0">
                    <i class="zmdi zmdi-favorite-outline"></i>
                </a>
            </div>

            <!-- Button show menu -->
            <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </div>
        </div>


        <!-- Menu Mobile -->
        <div class="menu-mobile">
            <ul class="topbar-mobile">
                <li>
                    <div class="left-top-bar">
                        Free shipping for standard order over $100
                    </div>
                </li>

                <li>
                    <div class="right-top-bar flex-w h-full">
                        <a href="#" class="flex-c-m p-lr-10 trans-04">
                            Help & FAQs
                        </a>

                        <a href="#" class="flex-c-m p-lr-10 trans-04">
                            My Account
                        </a>

                        <a href="#" class="flex-c-m p-lr-10 trans-04">
                            EN
                        </a>

                        <a href="#" class="flex-c-m p-lr-10 trans-04">
                            USD
                        </a>
                    </div>
                </li>
            </ul>

            <ul class="main-menu-m">
                <li>
                    <a href="index.php">Home</a>
                    <ul class="sub-menu-m">
                        <li><a href="index.php">Homepage 1</a></li>
                        <li><a href="home-02.html">Homepage 2</a></li>
                        <li><a href="home-03.html">Homepage 3</a></li>
                    </ul>
                    <span class="arrow-main-menu-m">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </span>
                </li>

                <li>
                    <a href="product.html">Shop</a>
                </li>

                <li>
                    <a href="shoping-cart.php" class="label1 rs1" data-label1="hot">Features</a>
                </li>

                <li>
                    <a href="blog.html">Blog</a>
                </li>

                <li>
                    <a href="about.html">About</a>
                </li>

                <li>
                    <a href="contact.html">Contact</a>
                </li>
            </ul>
        </div>

        <!-- Modal Search -->
        <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
            <div class="container-search-header">
                <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                    <img src="images/icons/icon-close2.png" alt="CLOSE">
                </button>

                <form class="wrap-search-header flex-w p-l-15">
                    <button class="flex-c-m trans-04">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                    <input class="plh3" type="text" name="search" placeholder="Search...">
                </form>
            </div>
        </div>
    </header>

    <!-- Cart -->
    <div class="wrap-header-cart js-panel-cart">
        <div class="s-full js-hide-cart"></div>

        <div class="header-cart flex-col-l p-l-65 p-r-25">
            <div class="header-cart-title flex-w flex-sb-m p-b-8">
                <span class="mtext-103 cl2">
                    Your Cart
                </span>

                <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                    <i class="zmdi zmdi-close"></i>
                </div>
            </div>

            <div class="header-cart-content flex-w js-pscroll">
                <ul class="header-cart-wrapitem w-full">
                    <li class="header-cart-item flex-w flex-t m-b-12">
                        <div class="header-cart-item-img">
                            <img src="images/item-cart-01.jpg" alt="IMG">
                        </div>

                        <div class="header-cart-item-txt p-t-8">
                            <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                White Shirt Pleat
                            </a>

                            <span class="header-cart-item-info">
                                1 x $19.00
                            </span>
                        </div>
                    </li>

                    <li class="header-cart-item flex-w flex-t m-b-12">
                        <div class="header-cart-item-img">
                            <img src="images/item-cart-02.jpg" alt="IMG">
                        </div>

                        <div class="header-cart-item-txt p-t-8">
                            <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                Converse All Star
                            </a>

                            <span class="header-cart-item-info">
                                1 x $39.00
                            </span>
                        </div>
                    </li>

                    <li class="header-cart-item flex-w flex-t m-b-12">
                        <div class="header-cart-item-img">
                            <img src="images/item-cart-03.jpg" alt="IMG">
                        </div>

                        <div class="header-cart-item-txt p-t-8">
                            <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                Nixon Porter Leather
                            </a>

                            <span class="header-cart-item-info">
                                1 x $17.00
                            </span>
                        </div>
                    </li>
                </ul>

                <div class="w-full">
                    <div class="header-cart-total w-full p-tb-40">
                        Total: $75.00
                    </div>

                    <div class="header-cart-buttons flex-w w-full">
                        <a href="shoping-cart.php"
                            class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                            View Cart
                        </a>

                        <a href="shoping-cart.php"
                            class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                            Check Out
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- breadcrumb -->
    <div class="container">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
                Home
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
                Shoping Cart
            </span>
        </div>
    </div>


    <!-- Shoping Cart -->
    <form class="bg0 p-t-50 p-b-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                    <div class="m-l-25 m-r--38 m-lr-0-xl">
                        <div class="wrap-table-shopping-cart">
                            <table class="table-shopping-cart">
                                <tr class="table_head">
                                    <th class="column-1">Product</th>
                                    <th class="column-2"></th>
                                    <th class="column-3">Price</th>
                                    <th class="column-4">Quantity</th>
                                    <th class="column-5">Total</th>
                                </tr>
                            </table>
                        </div>

                        <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                            <div class="flex-w flex-m m-r-20 m-tb-5">
                                <input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text"
                                    name="coupon" placeholder="Coupon Code">

                                <div
                                    class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
                                    Apply coupon
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                    <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                        <h4 class="mtext-109 cl2 p-b-30">
                            Cart Totals
                        </h4>

                        <div class="flex-w flex-t bor12 p-b-13">
                            <div class="size-208">
                                <span class="stext-110 cl2">
                                    Subtotal:
                                </span>
                            </div>

                            <div class="size-209">
                                <span class="mtext-110 cl2" id="Subtotal">
                                    $79.65
                                </span>
                            </div>
                        </div>

                        <div class="flex-w flex-t bor12 p-t-15 p-b-30"
                            data-id="<?=isset($_SESSION["loggedin"]) ? $_SESSION["id"] :""; ?>">
                            <div class="p-t-5 w-full">
                                <span class="stext-115 cl8">
                                    Calculate Shipping
                                </span>
                                <div class="bor8 bg0 m-b-12 m-t-9">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="Name"
                                        placeholder="Name">
                                </div>
                                <div class="bor8 bg0 m-b-12">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="Phone"
                                        placeholder="Phone">
                                </div>
                                <div class="bor8 bg0 m-b-12">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="email"
                                        placeholder="Email">
                                </div>
                                <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9" style="display:none">
                                    <select class="js-select2" name="time">
                                        <option>Select a adress...</option>
                                        <option>USA</option>
                                        <option>UK</option>
                                        <option>VN</option>
                                        <option>JAPAN</option>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                                <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
                                    <select class="js-select2" name="provice">
                                        <option value="">Select a provice...</option>
                                        <option value="HA NOI">HA NOI</option>
                                        <option value="HUE">HUE</option>
                                        <option value="DA NANG">DA NANG</option>
                                        <option value="HO CHI MINH">HO CHI MINH</option>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                                <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
                                    <select class="js-select2" name="district">
                                        <option value="">Select a district...</option>
                                        <option value="HA NOI">HA NOI</option>
                                        <option value="HUE">HUE</option>
                                        <option value="DA NANG">DA NANG</option>
                                        <option value="HO CHI MINH">HO CHI MINH</option>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                                <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
                                    <select class="js-select2" name="ward">
                                        <option value="">Select a ward...</option>
                                        <option value="HA NOI">HA NOI</option>
                                        <option value="HUE">HUE</option>
                                        <option value="DA NANG">DA NANG</option>
                                        <option value="HO CHI MINH">HO CHI MINH</option>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                                <div class="bor8 bg0 m-b-12">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="addressdetail"
                                        placeholder="Adress detail">
                                </div>
                            </div>
                        </div>

                        <div class="flex-w flex-t p-t-27 p-b-33">
                            <div class="size-208">
                                <span class="mtext-101 cl2">
                                    Total:
                                </span>
                            </div>

                            <div class="size-209 p-t-1">
                                <span class="mtext-110 cl2" id="TotalOder">
                                    $79.65
                                </span>
                            </div>
                        </div>

                        <span data-id="<?=isset($_SESSION["loggedin"]) ? $_SESSION["id"] :""; ?>"
                            class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer js-show-modal2">
                            Proceed to Checkout
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </form>


    <!-- Moda2 -->
    <div class="wrap-modal1 js-modal2 p-t-60 p-b-20">
        <div class="overlay-modal1 js-hide-modal2"></div>

        <div class="container">
            <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
                <button class="how-pos3 hov3 trans-04 js-hide-modal1">
                    <img src="images/icons/icon-close.png" alt="CLOSE">
                </button>
                <div>
                    <div class="row p-b-10">
                        <div class="container mt-5 js-confitmpass d-none" style="max-width: 550px">
                            <div class="p-t-5 w-full flex-c-m">
                                <span class="mtext-103 ltext-102 cl2 p-b-30">
                                    Authenticate Phone Number
                                </span>
                            </div>
                            <div class="d-flex p-b-10 flex-c-m m-b-18">
                                <div class="mtext-103 flex-l-m size-203 flex-c-m respon6">
                                    Name
                                </div>
                                <div name="Namemodal2" class="mtext-103 respon6-next flex-w flex-l-m w-full">
                                    Nguyen Van weqw hoang Anh
                                </div>
                            </div>
                            <div class="d-flex p-b-10 flex-c-m m-b-18">
                                <div class="mtext-103 flex-l-m size-203 flex-c-m respon6">
                                    Phone
                                </div>
                                <div name="Phoneverifycode" class="mtext-103 respon6-next flex-w flex-l-m w-full">
                                    0932472834
                                </div>
                            </div>
                            <div class="w-full flex-c-m m-b-18" id="recaptcha-container"></div>

                            <div class="p-b-30">
                                <h3 class="mtext-103 cl2">Verification code</h3>
                                <div class="bor8 bg0 m-b-12 m-t-9 m-b-30">
                                    <input class="stext-115 cl5 plh3 size-115 p-lr-15" type="text" name="verifycode"
                                        placeholder="Code">
                                </div>
                                <div class="flex-w flex-c-m p-b-10">
                                    <div class="size-204 flex-w flex-m respon6-next w-full flex-c-m ">
                                        <button
                                            class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-btn-verifycode">
                                            CONFIRM
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container js-payment d-none">
                            <div class="p-l-25 p-r-30 p-lr-0-lg w-full d-flex justify-content-between p-b-30">
                                <div class="container col-md-5 col-lg-5">
                                    <div class="w-full flex-c-m">
                                        <span class="mtext-103 ltext-102 cl2 p-b-30">
                                            Method payment
                                        </span>
                                    </div>
                                    <div class="d-flex p-b-10 flex-c-m m-b-18">
                                        <div class="mtext-103 flex-l-m size-203 flex-c-m respon6">
                                            Name
                                        </div>
                                        <div name="Nameverifycode"
                                            class="mtext-103 respon6-next flex-w flex-l-m w-full">
                                            Nguyen Van weqw hoang Anh
                                        </div>
                                    </div>
                                    <div class="d-flex p-b-10 flex-c-m m-b-18">
                                        <div class="mtext-103 flex-l-m size-203 flex-c-m respon6">
                                            IDOrder
                                        </div>
                                        <div name="idorder" class="mtext-103 respon6-next flex-w flex-l-m w-full">
                                            0932472834
                                        </div>
                                    </div>
                                    <div class="d-flex p-b-10 flex-c-m m-b-18">
                                        <div class="mtext-103 flex-l-m size-203 flex-c-m respon6">
                                            Total
                                        </div>
                                        <div name="totalpayment" class="mtext-103 respon6-next flex-w flex-l-m w-full">
                                            122472834
                                        </div>
                                    </div>
                                    <div class="p-b-30">
                                        <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9 m-b-22">
                                            <select class="js-select2 js-sel-modal2" name="payment">
                                                <option value="">Method payment</option>
                                                <option value="cod">COD</option>
                                                <option value="zalo">Zalo Pay</option>
                                                <option value="momo">MOMO</option>
                                                <option value="viettelpay">Viettel Pay</option>
                                                <option value="atmonline">ATM Banking Online</option>
                                                <option value="visamasterracd">Visa or MasterCard</option>
                                                <option value="bank">Bank</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container col-md-6 col-lg-7 js-img-payment d-none">
                                    <div class="flex-c-m js-img-payment">
                                        <img src="" alt="" class="size-202">
                                    </div>
                                    <div class="flex-c-m">
                                        <label class="stext-117" for="">Open the app and scan the code</label>
                                    </div>
                                </div>
                                <div class="container col-md-6 col-lg-7 js-bank-payment d-none">
                                    <div class="w-full flex-c-m">
                                        <span class="mtext-103 ltext-102 cl2 p-b-30">
                                            Vietcombank
                                        </span>
                                    </div>
                                    <div class="d-flex p-b-10 flex-c-m m-b-18">
                                        <div class="stext-103 flex-l-m size-203 flex-c-m respon6">
                                            Name
                                        </div>
                                        <div class="mtext-103 respon6-next flex-w flex-l-m w-full">
                                            Duy dep trai
                                        </div>
                                    </div>
                                    <div class="d-flex p-b-10 flex-c-m m-b-18">
                                        <div class="stext-103 flex-l-m size-203 flex-c-m respon6">
                                            Account number
                                        </div>
                                        <div class="mtext-103 respon6-next flex-w flex-l-m w-full">
                                            28739472937492
                                        </div>
                                    </div>
                                    <div class="d-flex p-b-10 flex-c-m m-b-18">
                                        <img src="images/account-bank-vcb.jpg" alt="" class="size-202">
                                    </div>
                                </div>
                                <div class="container col-md-6 col-lg-7 js-payment-atm d-none">
                                    <div class="boxContent p-b-18">
                                        <p><i>
                                                <span
                                                    style="color:#ff5a00;font-weight:bold;text-decoration:underline;">Lưu
                                                    ý</span>: Bạn cần đăng ký Internet-Banking hoặc dịch vụ thanh toán
                                                trực tuyến tại ngân hàng trước khi thực hiện.</i></p>

                                        <ul class="cardList clearfix">
                                            <li class="bank-online-methods ">
                                                <label for="vcb_ck_on">
                                                    <i class="BIDV"
                                                        title="Ngân hàng TMCP Đầu tư &amp; Phát triển Việt Nam"></i>
                                                    <input type="radio" value="BIDV" name="bankcode"
                                                        class="w-full flex-c-m">

                                                </label>
                                            </li>
                                            <li class="bank-online-methods ">
                                                <label for="vcb_ck_on">
                                                    <i class="VCB" title="Ngân hàng TMCP Ngoại Thương Việt Nam"></i>
                                                    <input type="radio" value="VCB" name="bankcode"
                                                        class="w-full flex-c-m">

                                                </label>
                                            </li>

                                            <li class="bank-online-methods ">
                                                <label for="vnbc_ck_on">
                                                    <i class="DAB" title="Ngân hàng Đông Á"></i>
                                                    <input type="radio" value="DAB" name="bankcode"
                                                        class="w-full flex-c-m">

                                                </label>
                                            </li>

                                            <li class="bank-online-methods ">
                                                <label for="tcb_ck_on">
                                                    <i class="TCB" title="Ngân hàng Kỹ Thương"></i>
                                                    <input type="radio" value="TCB" name="bankcode"
                                                        class="w-full flex-c-m">

                                                </label>
                                            </li>

                                            <li class="bank-online-methods ">
                                                <label for="sml_atm_mb_ck_on">
                                                    <i class="MB" title="Ngân hàng Quân Đội"></i>
                                                    <input type="radio" value="MB" name="bankcode"
                                                        class="w-full flex-c-m">

                                                </label>
                                            </li>

                                            <li class="bank-online-methods ">
                                                <label for="sml_atm_vib_ck_on">
                                                    <i class="VIB" title="Ngân hàng Quốc tế"></i>
                                                    <input type="radio" value="VIB" name="bankcode"
                                                        class="w-full flex-c-m">

                                                </label>
                                            </li>

                                            <li class="bank-online-methods ">
                                                <label for="sml_atm_vtb_ck_on">
                                                    <i class="ICB" title="Ngân hàng Công Thương Việt Nam"></i>
                                                    <input type="radio" value="ICB" name="bankcode"
                                                        class="w-full flex-c-m">

                                                </label>
                                            </li>

                                            <li class="bank-online-methods ">
                                                <label for="sml_atm_exb_ck_on">
                                                    <i class="EXB" title="Ngân hàng Xuất Nhập Khẩu"></i>
                                                    <input type="radio" value="EXB" name="bankcode"
                                                        class="w-full flex-c-m">

                                                </label>
                                            </li>

                                            <li class="bank-online-methods ">
                                                <label for="sml_atm_acb_ck_on">
                                                    <i class="ACB" title="Ngân hàng Á Châu"></i>
                                                    <input type="radio" value="ACB" name="bankcode"
                                                        class="w-full flex-c-m">

                                                </label>
                                            </li>

                                            <li class="bank-online-methods ">
                                                <label for="sml_atm_hdb_ck_on">
                                                    <i class="HDB" title="Ngân hàng Phát triển Nhà TPHCM"></i>
                                                    <input type="radio" value="HDB" name="bankcode"
                                                        class="w-full flex-c-m">

                                                </label>
                                            </li>

                                            <li class="bank-online-methods ">
                                                <label for="sml_atm_msb_ck_on">
                                                    <i class="MSB" title="Ngân hàng Hàng Hải"></i>
                                                    <input type="radio" value="MSB" name="bankcode"
                                                        class="w-full flex-c-m">

                                                </label>
                                            </li>

                                            <li class="bank-online-methods ">
                                                <label for="sml_atm_nvb_ck_on">
                                                    <i class="NVB" title="Ngân hàng Nam Việt"></i>
                                                    <input type="radio" value="NVB" name="bankcode"
                                                        class="w-full flex-c-m">

                                                </label>
                                            </li>

                                            <li class="bank-online-methods ">
                                                <label for="sml_atm_vab_ck_on">
                                                    <i class="VAB" title="Ngân hàng Việt Á"></i>
                                                    <input type="radio" value="VAB" name="bankcode"
                                                        class="w-full flex-c-m">

                                                </label>
                                            </li>

                                            <li class="bank-online-methods ">
                                                <label for="sml_atm_vpb_ck_on">
                                                    <i class="VPB" title="Ngân Hàng Việt Nam Thịnh Vượng"></i>
                                                    <input type="radio" value="VPB" name="bankcode"
                                                        class="w-full flex-c-m">

                                                </label>
                                            </li>

                                            <li class="bank-online-methods ">
                                                <label for="sml_atm_scb_ck_on">
                                                    <i class="SCB" title="Ngân hàng Sài Gòn Thương tín"></i>
                                                    <input type="radio" value="SCB" name="bankcode"
                                                        class="w-full flex-c-m">

                                                </label>
                                            </li>
                                            <li class="bank-online-methods ">
                                                <label for="bnt_atm_pgb_ck_on">
                                                    <i class="PGB" title="Ngân hàng Xăng dầu Petrolimex"></i>
                                                    <input type="radio" value="PGB" name="bankcode"
                                                        class="w-full flex-c-m">

                                                </label>
                                            </li>

                                            <li class="bank-online-methods ">
                                                <label for="bnt_atm_gpb_ck_on">
                                                    <i class="GPB" title="Ngân hàng TMCP Dầu khí Toàn Cầu"></i>
                                                    <input type="radio" value="GPB" name="bankcode"
                                                        class="w-full flex-c-m">

                                                </label>
                                            </li>

                                            <li class="bank-online-methods ">
                                                <label for="bnt_atm_agb_ck_on">
                                                    <i class="AGB"
                                                        title="Ngân hàng Nông nghiệp &amp; Phát triển nông thôn"></i>
                                                    <input type="radio" value="AGB" name="bankcode"
                                                        class="w-full flex-c-m">

                                                </label>
                                            </li>

                                            <li class="bank-online-methods ">
                                                <label for="bnt_atm_sgb_ck_on">
                                                    <i class="SGB" title="Ngân hàng Sài Gòn Công Thương"></i>
                                                    <input type="radio" value="SGB" name="bankcode"
                                                        class="w-full flex-c-m">

                                                </label>
                                            </li>
                                            <li class="bank-online-methods ">
                                                <label for="sml_atm_bab_ck_on">
                                                    <i class="BAB" title="Ngân hàng Bắc Á"></i>
                                                    <input type="radio" value="BAB" name="bankcode"
                                                        class="w-full flex-c-m">

                                                </label>
                                            </li>
                                            <li class="bank-online-methods ">
                                                <label for="sml_atm_bab_ck_on">
                                                    <i class="TPB" title="Tền phong bank"></i>
                                                    <input type="radio" value="TPB" name="bankcode"
                                                        class="w-full flex-c-m">

                                                </label>
                                            </li>
                                            <li class="bank-online-methods ">
                                                <label for="sml_atm_bab_ck_on">
                                                    <i class="NAB" title="Ngân hàng Nam Á"></i>
                                                    <input type="radio" value="NAB" name="bankcode"
                                                        class="w-full flex-c-m">

                                                </label>
                                            </li>
                                            <li class="bank-online-methods ">
                                                <label for="sml_atm_bab_ck_on">
                                                    <i class="SHB" title="Ngân hàng TMCP Sài Gòn - Hà Nội (SHB)"></i>
                                                    <input type="radio" value="SHB" name="bankcode"
                                                        class="w-full flex-c-m">

                                                </label>
                                            </li>
                                            <li class="bank-online-methods ">
                                                <label for="sml_atm_bab_ck_on">
                                                    <i class="OJB" title="Ngân hàng TMCP Đại Dương (OceanBank)"></i>
                                                    <input type="radio" value="OJB" name="bankcode"
                                                        class="w-full flex-c-m">
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="w-full flex-c-m">
                                        <span
                                            class="p-d-5 flex-c-m stext-107 cl5 bg2 bor14 hov-btn1 p-lr-15 trans-04 js-payment-onl" value="ATM_ONLINE">
                                            Payment
                                        </span>
                                    </div>
                                </div>
                                <div class="container col-md-6 col-lg-7 js-payment-vsmc d-none">
                                    <div class="boxContent p-b-30">
                                        <p><span style="color:#ff5a00;font-weight:bold;text-decoration:underline;">Lưu
                                                ý</span>: Visa hoặc MasterCard.</p>
                                        <ul class="cardList clearfix">
                                            <li class="bank-online-methods">
                                                <label for="vcb_ck_on">
                                                    Visa:
                                                    <input type="radio" value="VISA" name="bankcode"
                                                        class="w-full flex-c-m">
                                                </label>
                                            </li>
                                            <li class="bank-online-methods ">
                                                <label for="vnbc_ck_on">
                                                    Master:<input type="radio" value="MASTER" name="bankcode"
                                                        class="w-full flex-c-m">
                                                </label>
                                            </li>
                                        </ul>
                                        <div class="w-full flex-c-m">
                                            <span
                                                class="p-d-5 flex-c-m stext-107 cl5 bg2 bor14 hov-btn1 p-lr-15 trans-04 js-payment-onl" value="VISA">
                                                Payment
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-w flex-c-m p-b-10 js-confirm-order d-none">
                                <div class="size-204 flex-w flex-m respon6-next w-full flex-c-m ">
                                    <button
                                        class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-btn-payment">
                                        CONFIRM
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg3 p-t-75 p-b-32">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-3 p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        Categories
                    </h4>

                    <ul>
                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                Women
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                Men
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                Shoes
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                Watches
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-sm-6 col-lg-3 p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        Help
                    </h4>

                    <ul>
                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                Track Order
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                Returns
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                Shipping
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                FAQs
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-sm-6 col-lg-3 p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        GET IN TOUCH
                    </h4>

                    <p class="stext-107 cl7 size-201">
                        Any questions? Let us know mail duy.kidd@gmail.com
                    </p>
                    <div class="p-t-27">
                        <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                            <i class="fa fa-facebook"></i>
                        </a>

                        <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                            <i class="fa fa-instagram"></i>
                        </a>

                        <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                            <i class="fa fa-pinterest-p"></i>
                        </a>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3 p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        Newsletter
                    </h4>

                    <form>
                        <div class="wrap-input1 w-full p-b-4">
                            <input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email"
                                placeholder="email@example.com">
                            <div class="focus-input1 trans-04"></div>
                        </div>

                        <div class="p-t-18">
                            <button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                                Subscribe
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="p-t-40">
                <div class="flex-c-m flex-w p-b-18">
                    <a href="#" class="m-all-1">
                        <img src="images/icons/icon-pay-01.png" alt="ICON-PAY">
                    </a>

                    <a href="#" class="m-all-1">
                        <img src="images/icons/icon-pay-02.png" alt="ICON-PAY">
                    </a>

                    <a href="#" class="m-all-1">
                        <img src="images/icons/icon-pay-03.png" alt="ICON-PAY">
                    </a>

                    <a href="#" class="m-all-1">
                        <img src="images/icons/icon-pay-04.png" alt="ICON-PAY">
                    </a>

                    <a href="#" class="m-all-1">
                        <img src="images/icons/icon-pay-05.png" alt="ICON-PAY">
                    </a>
                </div>

                <p class="stext-107 cl6 txt-center">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;
                    <script>
                    document.write(new Date().getFullYear());
                    </script> All rights reserved | Made with Colorlib by ThemeWagon <i class="fa fa-heart-o"
                        aria-hidden="true"></i> Remake by Duy_Dev
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>
    </footer>

    <!-- Back to top -->
    <div class="btn-back-to-top" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <i class="zmdi zmdi-chevron-up"></i>
        </span>
    </div>

    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <script>
    $(".js-select2").each(function() {
        $(this).select2({
            minimumResultsForSearch: 20,
            dropdownParent: $(this).next('.dropDownSelect2')
        });
    })
    </script>
    <!--===============================================================================================-->
    <script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script>
    $('.js-pscroll').each(function() {
        $(this).css('position', 'relative');
        $(this).css('overflow', 'hidden');
        var ps = new PerfectScrollbar(this, {
            wheelSpeed: 1,
            scrollingThreshold: 1000,
            wheelPropagation: false,
        });

        $(window).on('resize', function() {
            ps.update();
        })
    });
    </script>
    <!--===============================================================================================-->
    <script src="bootstrap-sweetalert/dist/sweetalert.js"></script>
    <link rel="stylesheet" href="bootstrap-sweetalert/dist/sweetalert.css">

    <!--===============================================================================================-->
    <script src="js/main.js"></script>
    <!------------------------------------------------------->
    <script>
    $.ajax({
        url: './Process/shoping-cart-index.php',
        type: 'POST',
        data: {
            method: "get-itemcart"
        },
        cache: false,
        success: function(data) {
            $('.table-shopping-cart').append(data);
            Subtotal();

        }
    })
    /* ------------------------------------------------------------ */
    $(document).on('click', '.how-itemcart1', function(e) {
        var iddel = $(this).closest('.table_row').attr('data-id')
        var nameproduct = "Delete for item " + $(this).closest('.table_row').find(".column-2").text();
        swal({
                title: "Are you sure?",
                text: nameproduct,
                type: "warning",
                confirmButtonClass: "btn-danger",
                showCancelButton: true,
                closeOnConfirm: false,
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: './Process/shoping-cart-index.php',
                        type: 'POST',
                        data: {
                            method: "del-itemcart",
                            id: iddel
                        },
                        dataType: 'json',
                        cache: false,
                        success: function(data) {
                            if (data.isDelitem) {
                                $('.table-shopping-cart').find("tr[data-id='" + iddel + "']")
                                    .remove();
                                getdatacookie();
                                Subtotal();
                            }
                        }
                    });
                    swal("Deleted!", "Item has been deleted.", "success");
                }
            });
    });
    </script>
    <!--===============================================================================================-->
    <script>
    var coderesult
    var firebaseConfig = {
        apiKey: "AIzaSyBDh7MD479edliYib7YndCIoBq2fGn_KBs",
        authDomain: "loginlaravel-f3aea.firebaseapp.com",
        databaseURL: "https://loginlaravel-f3aea-default-rtdb.firebaseio.com",
        projectId: "loginlaravel-f3aea",
        storageBucket: "loginlaravel-f3aea.appspot.com",
        messagingSenderId: "409892183205",
        appId: "1:409892183205:web:de25c53ec181d53646c14c",
        measurementId: "G-1E9EEFECF4"
    };
    firebase.initializeApp(firebaseConfig);
    </script>
    <script type="text/javascript">
    window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container', {
        'size': 'normal',
        'callback': function(response) {
            // reCAPTCHA solved, allow signInWithPhoneNumber.
            // ...

        },
        'expired-callback': function() {
            // Response expired. Ask user to solve reCAPTCHA again.
            // ...
        }
    });

    var cverify = window.recaptchaVerifier;


    function sendOTP(number) {
        firebase.auth().signInWithPhoneNumber(number, cverify).then(function(response) {
            window.confirmationResult = response;
            coderesult = response;
            Swal.fire({
                title: 'Successfully!',
                text: 'Pls check messenger your phone !!',
                icon: 'success',
                showConfirmButton: false,
                timer: 2500
            })
        }).catch(function(error) {
            Swal.fire({
                title: 'ERROR!',
                text: error.message,
                icon: 'error',
                showConfirmButton: false,
                timer: 3500
            })
        });
    }
    $(document).on('click', '.js-btn-verifycode', function(e) {
        var code = $('input[name=verifycode]').val();
        coderesult.confirm(code).then(function(result) {
            Swal.fire({
                title: 'Successfully!',
                text: 'Phone number is confirm !!',
                icon: 'success',
                showConfirmButton: false,
                timer: 3500
            })
            $(".js-confitmpass").addClass("d-none");
            if ($('.js-payment').hasClass('d-none')) {
                $('.js-payment').removeClass('d-none');
                $(".js-confitmpass").addClass("d-none");
            }

        }).catch(function(error) {
            Swal.fire({
                title: 'ERROR!',
                text: error.message,
                icon: 'error',
                showConfirmButton: false,
                timer: 3500
            })
        });
    })
    </script>
    <!--===============================================================================================-->

    <script src="js/Shoping-cart.js"></script>
</body>

</html>