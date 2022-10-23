<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        select {
            width: 100%;
            padding: 16px 20px;
            border: none;
            border-radius: 4px;
            background-color: #f1f1f1;
        }
    </style>
</head>

<body>
    <div class="w3-col l3 s6">
        <div class="w3-container">
            <div class="w3-display-container">
                <img src="Images/T-shirt/<?= $row['hinhanhSP'] ?>" style="width:100%">
                <span class="w3-tag w3-display-topleft">Sale</span>
                <div class="w3-display-middle w3-display-hover">
                    <a href="javascript:void(0)" class="w3-bar-item  w3-right w3-white" onclick="showdetail('<?= $row['tenSP'] ?>','<?= $row['giaSP'] ?>','Images/T-shirt/<?= $row['hinhanhSP'] ?>','<?= $row['thongtinSP'] ?>','<?= $row['sizeL'] ?>','<?= $row['sizeXL'] ?>')">
                        <button class="w3-button w3-black"> Detail <i class=" fa fa-info-circle"></i></button>
                    </a>
                </div>
            </div>
            <p><?= $row['tenSP'] ?> <br><b>$<?= $row['giaSP'] ?></b></p>
        </div>
    </div>
    <!--BXD - ALEX OVERPRINT TEES/BLACK detail-->
    <div id="detail5" class="w3-modal  ">
        <div class="w3-modal-content  w3-card-4 w3-animate-zoom" style="max-width: 900px">

            <div class="w3-container w3-padding-16 w3-light-grey">
                <span class=" cart-header " id='ten'></span>
                <span onclick="document.getElementById('detail5').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
            </div>

            <div class="cart-row w3-container">
                <span class="cart-item cart-header cart-column">Items</span>
                <span class="cart-quantity cart-header cart-column">Infor</span>
            </div>

            <div class="cart-items w3-container">

                <div class="cart-row">
                    <div class="cart-item cart-column">
                        <img class="cart-item-image1" id='hinh' width="400" height="400">
                    </div>
                    <div class="cart-quantity cart-column">
                        <p id='mota'></p>

                    </div>

                </div>


                <div class="cart-total">
                    <strong class="cart-total-title">Price: $</strong>
                    <strong class="cart-total-price" id='gia1'></strong>
                    <div class="w3-left">
                        <strong class="cart-total-title">Size</strong>
                        <select name="size" id="size" style="width: 80px;height: 50px;" >
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                        </select>
                        <strong class="cart-total-title">Quantity of product:</strong>
                        <strong class="cart-total-title w3-text-red" id="sl"></strong>
                        </select>
                    </div>
                </div>
            </div>

            <div class="w3-container w3-border-top w3-padding-24 ">
                <button class="w3-button w3-red w3-transparent w3-right" id="addtoc" onclick="<?= LogCard() ?>">Add to cart
                    <i class="fa fa-shopping-cart"></i></button>
            </div>

        </div>
    </div>
</body>


</html>