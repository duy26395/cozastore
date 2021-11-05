<?php
include '../ConfigConnect.php';
$pathimg = "images/";

if (isset($_POST['method'])) {
    $method = $_POST['method'];
    switch ($method) {
        case "get-itemproduct":
            $sql = $result = $row = "";
            $limit = 8;
            $start = isset($_POST['pageItems']) ? (($_POST['pageItems']) - 1) * $limit : null;
            $key_category = isset($_POST['key_category']) ? $_POST['key_category'] : "";
            $keySearch = isset($_POST['keySearch']) ? $_POST['keySearch'] : "";

            if($keySearch != '' || $keySearch > 0 )
            {
                if($key_category == 0 || $key_category == '')
                {
                    $sql = "SELECT p.id as pid,p.*,c.* FROM `product` p left join category c on p.categoryid = c.ID 
                    WHERE c.category_parentid = 0 and p.Productname like '%{$keySearch}%'
                    Limit $start,$limit";
                } else {
                    $sql = "SELECT p.id as pid,p.*,c.* FROM `product` p left join category c on p.categoryid = c.ID 
                    WHERE c.category_parentid = 0 and p.Productname like '%{$keySearch}%' and c.ID = '{$key_category}'
                    Limit $start,$limit";
                }
            } else {
                if($key_category == 0 || $key_category == ''){
                    $sql = "SELECT p.id as pid,p.*,c.* FROM `product` p left join category c on p.categoryid = c.ID 
                    WHERE c.category_parentid = 0 Limit $start,$limit";
                } else {
                    $sql = "SELECT p.id as pid,p.*,c.* FROM `product` p left join category c on p.categoryid = c.ID 
                    WHERE c.category_parentid = 0 and c.ID = '{$key_category}' Limit $start,$limit";
                }
            }
            $result = $conn->query($sql);
            if (!empty($result) && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {?>
<div data-id="<?=$row['pid'];?>"
    class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?=strtolower($row['categoryname']);?>">
    <!-- Block2 -->
    <div class="block2">
        <div class="block2-pic hov-img0">
            <img src="<?php echo $pathimg . $row['productimg']; ?>" alt="IMG-PRODUCT">
            <a class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                Quick View
            </a>
        </div>

        <div class="block2-txt flex-w flex-t p-t-14 justify-content-between">
            <div class="block2-txt-child1 flex-col-l ">
                <a href="product-detail.php?search=<?=$row['pid'];?>"
                    class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                    <p class="block2-textproduct"><?=$row['Productname'];?></p>
                </a>
                <a href="product-detail.php?search=<?=$row['pid'];?>"
                    class="stext-109 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                    <p class="block2-textproduct"><?=$row['Productcompany'];?></p>
                </a>
                <span class="stext-105 cl3">
                    $<?=$row['Price'];?>
                </span>
            </div>
            <div class="block2-txt-child2 flex-r">
                <span class="stext-107 cl3">
                    Qty : <?=$row['quantity'];?>
                </span>
            </div>
        </div>
    </div>
</div> <?php
                            }}
            break;
        case "get-category":
            $sql = $result = $row = "";
            $sql = "SELECT * FROM `category` where category_parentid = 0";
            $result = $conn->query($sql);
            if (!empty($result) && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {?>
<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-id="<?=($row['ID']);?>"
    data-filter=".<?=strtolower($row['categoryname']);?>">
    <?=$row['categoryname'];?>
</button>
<?php }}
            break;

        case "get-Productdetail-Related" :
            $sql = $result = $row = "";
            if (isset($_POST["iditem"])) {$id = $_POST["iditem"];}

            $sql = "SELECT p.id as pid,p.* FROM `product` p
            WHERE categoryid in (select categoryid from product where id = '{$id}' ) Limit 8";
            $result = $conn->query($sql);
            if (!empty($result) && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {?>
<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15" data-id="<?=$row['pid'];?>">
    <!-- Block2 -->
    <div class="block2">
        <div class="block2-pic hov-img0">
            <img src="<?php echo $pathimg . $row['productimg']; ?>" alt="IMG-PRODUCT">
            <a class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                Quick View
            </a>
        </div>

        <div class="block2-txt flex-w flex-t p-t-14 justify-content-between">
            <div class="block2-txt-child1 flex-col-l ">
                <a href="product-detail.php?search=<?=$row['pid'];?>"
                    class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                    <p class="block2-textproduct"><?=$row['Productname'];?></p>
                </a>
                <a href="product-detail.php?search=<?=$row['pid'];?>"
                    class="stext-109 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                    <p class="block2-textproduct"><?=$row['Productcompany'];?></p>
                </a>
                <span class="stext-105 cl3">
                    $<?=$row['Price'];?>
                </span>
            </div>
            <div class="block2-txt-child2 flex-r">
                <span class="stext-107 cl3">
                    Qty : <?=$row['quantity'];?>
                </span>
            </div>
        </div>
    </div>
</div>
<?php } }
            break;
    }
}