function themsp()
{
    document.getElementById("thongtinsp").style.display='none';
    document.getElementById("suasp").style.display='none';
    document.getElementById("themsp").style.display='block';
    document.getElementById("f7").style.display="block";
    document.getElementById("nutthemsp").style.display='none';

}
function suasp(ten,gia,hinh,mota)
{
    document.getElementById("f77").style.display="block";
    document.getElementById("oldname").innerHTML=ten;
    document.getElementById("ten").value=ten;
    document.getElementById("gia1").value=gia;
    document.getElementById("hinh").value=hinh;
    document.getElementById("mota").value=mota;
}
function xoasp()
{
     confirm("Do you really want to delete this product ?");
    
}
function capnhat()
{
    alert("Update successfully !");
    document.getElementById("suasp").style.display='none';
    document.getElementById("themsp").style.display='none';

}
function them()
{
    alert("Insert successfully!");
    document.getElementById("thongtinsp").style.display='block';
    document.getElementById("nutthemsp").style.display='block';
    document.getElementById("suasp").style.display='none';
    document.getElementById("themsp").style.display='none';
}
