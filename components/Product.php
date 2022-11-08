<div class="w3-col l3 s6">
    <div class="w3-container">
        <div class="w3-display-container">
            <img src="Images/T-SHIRT/<?= $row['hinhanhSP'] ?>" style="width:100%">
            <span class="w3-tag w3-display-topleft">Sale</span>
            <div class="w3-display-middle w3-display-hover">
                <a href="javascript:void(0)" class="w3-bar-item  w3-right w3-white" onclick="showdetail('<?= $row['tenSP'] ?>','<?= $row['giaSP'] ?>','Images/T-SHIRT/<?= $row['hinhanhSP'] ?>','<?= $row['thongtinSP'] ?>','<?= $row['sizeL'] ?>','<?= $row['sizeXL'] ?>')">
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
            <span class=" cart-header " id='ten' style="font-size: 30px;"></span>
            <span onclick="document.getElementById('detail5').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
        </div>

        <div class="cart-row w3-container w3-row w3-border">
            <span class="w3-col s6"><h4><b>Items</b></h4></span>
            <span class="w3-col s6"><h4><b>Infor</b></h4></span>
        </div>

        <div class="w3-container">

            <div class="w3-row ">
                <div class="w3-col s6">
                    <img class="cart-item-image1 w3-margin-top w3-image " id='hinh' width="100%" height="auto" style="max-width: 250px;">
                </div>
                <div class="cart-quantity cart-column w3-col s6" style="overflow-y: scroll;height:auto;max-height:300">
                    <h5 id='mota'></h5>

                </div>

            </div>


            <div class="cart-total">
                <div class="w3-left w3-margin-top w3-margin-bottom">
                    <strong class="cart-total-title">Size</strong>
                    <select name="size" id="size" class="w3-select w3-border" style="width: 80px;height: auto; background-color: lightgray">
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
            <div class="w3-right">
            <strong class="" style="font-size: 25px;">Price: $</strong>
            <strong class="" id='gia1' style="font-size: 25px;"></strong>
            </div>
            <br>
            <br>
            <button class="w3-button w3-red w3-transparent w3-right" id="addtoc" onclick="addItemToCart(document.getElementById('ten').innerHTML,document.getElementById('gia1').innerHTML,document.getElementById('hinh').src,document.getElementById('sl').innerHTML, document.getElementById('size').value)">Add to cart
                <i class="fa fa-shopping-cart"></i></button>
        </div>

    </div>
</div>