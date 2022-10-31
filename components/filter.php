<div class=" " style="padding-bottom: 32px;">
    Price
    <select name="price" id="price2" style="width: 125px;height: 40px;" onchange="reload1()">
        <option id="pr1" value="***-"></option>
        <option id="pr2" value="000-099">0-99 </option>
        <option id="pr3" value="100-199">100-199</option>
        <option id="pr4" value="200-299">200-299</option>
        <option id="pr5" value="300-">>300 </option>
    </select>
    Type
    <select name="loaisp" id="loaisp" style="width: 125px;height: 40px;" onchange="reload1()">
        <option value="0"></option>
        <option value="1">T-shirt</option>
        <option value="2">Jacket</option>
    </select>
</div>
<script>
    <?php if (isset($_REQUEST['from'])) {

    ?>
        var price = "<?= $_REQUEST['from'] ?>" + '-' + "<?= $_REQUEST['to'] ?>";
        let element = document.getElementById("price2");
        console.log(price);
        element.value = price;
    <?php
    }
    ?>

    document.getElementById("loaisp").value = <?= isset($_REQUEST['loaisp']) ? $_REQUEST['loaisp'] : 0 ?>;



    function reload1() {
        var pri = document.getElementById("price2");
        var loai = document.getElementById("loaisp");
        var valueprice = pri.value;
        var from = valueprice.substr(0, 3)
        var to1 = valueprice.substr(4, 3)
        var valueloai = loai.value;
        var tukhoa = document.getElementById("find").value ;
        window.location.href = "Search.php?from=" + from + "&to=" + to1 + "&loaisp=" + valueloai + "&tukhoa=" +
            tukhoa
    }
</script>