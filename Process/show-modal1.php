<?php
include '../ConfigConnect.php';
$pathimg = "images/";

function checkdata($e)
{
    $e = trim($e);
    return $e;
}
$result = array();
if (isset($_POST['method'])) {
    $method = $_POST['method'];
    switch ($method) {
        case "view-product-detail":
            try {
                $sql = $row = "";
                if (isset($_POST["iditem"])) {$id = $_POST["iditem"];}
                $sql = "SELECT p.id as pid,p.*,c.* FROM `product` p left join category c on p.categoryid = c.ID WHERE p.id = '{$id}' Limit 1";
                $resultsql = $conn->query($sql);
                if (!empty($resultsql) && $resultsql->num_rows > 0) {
                    while ($row = $resultsql->fetch_assoc()) {
                        $result['IsView'] = true;
                        $result['Productname'] = $row['Productname'];
                        $result['Description'] = $row['Description'];
                        $result['Price'] = $row['Price'];
                        $result['productimg'] = $row['productimg'];
                    }
                } else {
                    $result['IsView'] = false;
                    $result['Mess'] = $conn->error;
                }
            } catch (Exception $e) {
                $result['IsView'] = false;
                $result['Mess'] = $e->getMessage();
            }
            echo json_encode($result);
            break;
        case "view-thumbnail-product":
            $sql = $row = "";
            if (isset($_POST["iditem"])) {$id = $_POST["iditem"];}
            $sql = "SELECT * FROM `imgproductdetail` p WHERE p.productid = '{$id}' Limit 5";
            $resultsql = $conn->query($sql);
            if (!empty($resultsql) && $resultsql->num_rows > 0) {
                while ($row = $resultsql->fetch_assoc()) {?>
<div class="item-slick3" data-thumb="<?php echo $pathimg . $row['nameimg']; ?>">
    <div class="wrap-pic-w pos-relative">
        <img src="<?php echo $pathimg . $row['nameimg']; ?>" alt="IMG-PRODUCT">

        <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
            href="<?php echo $pathimg . $row['nameimg']; ?>">
            <i class="fa fa-expand"></i>
        </a>
    </div>
</div>

<?php }
            }
            break;
    }
}