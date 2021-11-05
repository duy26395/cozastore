<?php
include '../ConfigConnect.php';
$pathimg = "images/";

if (isset($_POST['method'])) {
    $method = $_POST['method'];
    switch ($method) {
        case "add-item":
            $id = isset($_POST['id']) ? $_POST['id'] : "";
            $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : "";
            $productname = $_POST['name'] ? $_POST['name'] : "";
            $productprice = $_POST['price'] ? $_POST['price'] : "";
            $productsize = $_POST['size'] ? $_POST['size'] : "";
            $productcolor = $_POST['color'] ? $_POST['color'] : "";
            $productnote = $_POST['note'] ? $_POST['note'] : "";

            $img = $_POST['img'] ? $_POST['img'] : "";
            $cart = array();
            if (isset($_COOKIE['cart'])) {
                // array_push($cart, json_decode($_COOKIE['cart'], true));
                $cart = json_decode($_COOKIE['cart'], true);
            }
            array_push($cart, array(
                "productname" => $productname,
                "productid" => $id,
                "productprice" => $productprice,
                "productimg" => $img,
                "quantity" => $quantity,
                "size" => $productsize,
                "color" => $productcolor,
                "note" => $productnote,
            ));
            setcookie("cart", json_encode($cart), time() + (86400 * 30), "/"); // 86400 = 1 day
            break;
        case "get-cookie":
            $cart = array();
            if (isset($_COOKIE['cart'])) {
                $cart = json_decode($_COOKIE['cart'], true);
                foreach ($cart as $values) {
                    // echo $values['productname'];
                    ?>
<li class="header-cart-item flex-w flex-t m-b-12" data-id="<?php echo $values['productid']; ?>">
    <div class="header-cart-item-img">
        <img src="<?php echo $values['productimg']; ?>" alt="IMG">
    </div>
    <div class="header-cart-item-txt p-t-8">
        <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
            <?php echo $values['productname']; ?>
        </a>
        <span class="header-cart-item-number">
            <?php echo $values['quantity']; ?>
        </span>
        <span>
            x
        </span>
        <span class="header-cart-item-price">
            <?php echo $values['productprice']; ?>
        </span>
    </div>
</li>
<?php
    }
            } else {
                echo "None Value";
                break;
            }
            break;
    }
}