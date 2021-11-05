<?php
include '../ConfigConnect.php';
$pathimg = "images/";
include '../Payment-onl/config.php';
include '../Payment-onl/NL_Checkoutv3.php';

if (isset($_POST['method'])) {
    $method = $_POST['method'];
    switch ($method) {
        case "get-itemcart":
            $cart = array();
            if (isset($_COOKIE['cart'])) {
                $cart = json_decode($_COOKIE['cart'], true);
                foreach ($cart as $values) {
                    // echo $values['productname'];
                    ?>
<tr class="table_row" data-id="<?php echo $values['productid']; ?>">
    <td class="column-1">
        <div class="how-itemcart1">
            <img src="<?php echo $values['productimg']; ?>" alt="IMG">
        </div>
    </td>
    <td class="column-2"><?php echo $values['productname']; ?></td>
    <td class="column-3 totalprice"><?php echo $values['productprice']; ?></td>
    <td class="column-4">
        <div class="wrap-num-product flex-w m-l-auto m-r-0">
            <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                <i class="fs-16 zmdi zmdi-minus"></i>
            </div>

            <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product1"
                value="<?php echo $values['quantity']; ?>">

            <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                <i class="fs-16 zmdi zmdi-plus"></i>
            </div>
        </div>
    </td>
    <td class="column-5 totalcost"><?php echo $values['quantity'] * $values['productprice']; ?></td>
</tr>
<?php
}
            } else {
                echo "None Value";
                break;
            }
            break;
        case "del-itemcart":
            $result = array();
            $cart = array();
            $id = $_POST['id'] ? $_POST['id'] : "";
            $result['isDelitem'] = false;
            if (isset($_COOKIE['cart'])) {
                $cart = json_decode($_COOKIE['cart'], true);
                foreach ($cart as $key => $value) {
                    if ($value['productid'] == $id) {
                        unset($cart[$key]);
                        $result['isDelitem'] = true;
                    }
                }
            }
            setcookie("cart", json_encode($cart), time() + (86400 * 30), "/"); // 86400 = 1 day
            echo json_encode($result);
            break;
        case "edit-itemcart":
            $result = array();
            $cart = array();

            $id = $_POST['id'] ? $_POST['id'] : die;
            $number = $_POST['num'] ? $_POST['num'] : "";
            $result['isEditItems'] = false;

            if (isset($_COOKIE['cart'])) {
                $cart = json_decode($_COOKIE['cart'], true);
                foreach ($cart as $key => $value) {
                    if ($value['productid'] == $id) {
                        $cart[$key]['quantity'] = $number;
                        $result['isEditItems'] = true;
                    }
                }
            }
            setcookie("cart", json_encode($cart), time() + (86400 * 30), "/"); // 86400 = 1 day
            echo json_encode($result);
            break;
        case "add-orderdetail":
            $result = array();
            $cart = array();
            $name = $_POST['name'] ? $_POST['name'] : "";
            $phone = $_POST['phone'] ? $_POST['phone'] : "";
            $email = $_POST['email'] ? $_POST['email'] : "";
            $address = $_POST['address'] ? $_POST['address'] : "";
            $total = $_POST['total'] ? $_POST['total'] : "";
            $memberid = $_POST['memberid'] ? $_POST['memberid'] : "";
            /* [Check member id ] */
            if ($memberid == '') {
                $sqlcheck = "SELECT emailAdress FROM members WHERE emailAdress = ? Limit 1";
                $stmtcheck = mysqli_prepare($conn, $sqlcheck);
                mysqli_stmt_bind_param($stmtcheck, "s", $email);
                if (mysqli_stmt_execute($stmtcheck)) {
                    mysqli_stmt_store_result($stmtcheck);
                    if (mysqli_stmt_num_rows($stmtcheck) == 1) {
                        $sql = mysqli_query($conn, "SELECT ID FROM members WHERE emailAdress = '{$email}'");
                        $sqlrs = mysqli_fetch_array($sql);
                        $memberid = $sqlrs['ID'];
                    } else {
                        $password_string = '!@#$%*&abcdefghijklmnpqrstuwxyzABCDEFGHJKLMNPQRSTUWXYZ23456789';
                        $password = substr(str_shuffle($password_string), 0, 12);
                        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                        $stmt = $conn->prepare("INSERT INTO `members`(`fullname`, `emailAdress`,`password`) VALUES (?, ?, ?)");
                        $stmt->bind_param('sss', $name, $email, $hashed_password);
                        $stmt->execute();
                    }
                }

            }
            /* [Insert order] */
            $sql = "INSERT INTO `orders`(`membersid`, `totalcost`, `status`, `Datecreate`,`adress`,`phonenumber`)
                    VALUES ('" . $memberid . "','" . $total . "','Wait',unix_timestamp(),'" . $address . "','" . $phone . "')";
            if (mysqli_query($conn, $sql)) {
                $last_id = mysqli_insert_id($conn);
                $result['Isorders'] = true;
                $result['idorder'] = $last_id;
            } else {
                $result['Isorders'] = false;
                $result['Mess'] = $conn->error;
            }
            /* [get value cookie insert orderdetail] */
            if (isset($_COOKIE['cart'])) {
                $cart = json_decode($_COOKIE['cart'], true);
                foreach ($cart as $key => $value) {
                    $sqloderdetail = "INSERT INTO `ordersdetail`(`Ordersid`, `productid`, `quantity`, `description`,`size`,`color`)
                            VALUES ('{$last_id}','{$cart[$key]['productid']}','{$cart[$key]['quantity']}','{$cart[$key]['note']}','{$cart[$key]['size']}','{$cart[$key]['color']}')";
                    if (mysqli_query($conn, $sqloderdetail)) {
                        $result['Isorders'] = true;
                    } else {
                        $result['Isorders'] = false;
                        $result['Mess'] = $conn->error;
                    }
                }
            }
            setcookie("cart", json_encode($cart), time() + (86400 * 30), "/"); // 86400 = 1 day
            echo json_encode($result);
            break;
        case "payment-onl":
            $result = array();
            $nlcheckout = new NL_CheckOutV3(MERCHANT_ID, MERCHANT_PASS, RECEIVER, URL_API);
            // $total_amount = $_POST['totaloder'];
            $total_amount = 6000;

            $array_items[0] = array('item_name1' => 'Product name',
                'item_quantity1' => 1,
                'item_amount1' => $total_amount,
                'item_url1' => 'http://nganluong.vn/');

            // $array_items=array();
            $payment_method = $_POST['option_payment'];
            $bank_code = $_POST['bankcode'];
            $order_code = $_POST['order_id'] . '-' . time();

            $payment_type = '';
            $discount_amount = 0;
            $order_description = '';
            $tax_amount = 0;
            $fee_shipping = 0;
            $buyer_address = '';

            $return_url = 'http://localhost/cozastore/Payment-success.php';
            $cancel_url = urlencode('http://localhost/nganluong.vn/checkoutv3?orderid=' . $order_code);

            $buyer_fullname = $_POST['name'];
            $buyer_email = $_POST['email'];
            $buyer_mobile = $_POST['phone'];
            if ($payment_method != '' && $buyer_email != "" && $buyer_mobile != "" && $buyer_fullname != "" && filter_var($buyer_email, FILTER_VALIDATE_EMAIL)) {
                if ($payment_method == "VISA") {

                    $nl_result = $nlcheckout->VisaCheckout($order_code, $total_amount, $payment_type, $order_description, $tax_amount,
                        $fee_shipping, $discount_amount, $return_url, $cancel_url, $buyer_fullname, $buyer_email, $buyer_mobile,
                        $buyer_address, $array_items, $bank_code);

                } elseif ($payment_method == "NL") {
                    $nl_result = $nlcheckout->NLCheckout($order_code, $total_amount, $payment_type, $order_description, $tax_amount,
                        $fee_shipping, $discount_amount, $return_url, $cancel_url, $buyer_fullname, $buyer_email, $buyer_mobile,
                        $buyer_address, $array_items);

                } elseif ($payment_method == "ATM_ONLINE" && $bank_code != '') {
                    $nl_result = $nlcheckout->BankCheckout($order_code, $total_amount, $bank_code, $payment_type, $order_description, $tax_amount,
                        $fee_shipping, $discount_amount, $return_url, $cancel_url, $buyer_fullname, $buyer_email, $buyer_mobile,
                        $buyer_address, $array_items);
                }
            }
            if ($nl_result->error_code == '00') {
                $link = (string) $nl_result->checkout_url;
                $link = substr("$link", -(strpos(strrev($link), '/')));
                $result['link_NL'] = $link;
                $result['isCheckout'] = true;

            } else {
                $result['isCheckout'] = false;
                $result['Mess'] = $nl_result->error_message;
            }
            echo json_encode($result);
            break;
        case "payment-success":
            $result = array();
            $orderid = $_POST['orderid'];
            $stmt = $conn->prepare("UPDATE `orders` SET `status`='Ispayment' WHERE ID = ?");
            $stmt->bind_param('s', $orderid);
            $rs = $stmt->execute();
            if ($rs) {
                $result['ispayment'] = true;
            } else {
                $result['ispayment'] = false;
                $result['Mess'] = $conn->error;
            }
            echo json_encode($result);
            break;

    }
}