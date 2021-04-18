function themsp()
{
    document.getElementById("thongtinsp").style.display='none';
    document.getElementById("suasp").style.display='none';
    document.getElementById("themsp").style.display='block';
    document.getElementById("f7").style.display="block";
    document.getElementById("nutthemsp").style.display='none';

}
function suasp(ten,gia,hinh)
{
    document.getElementById("f77").style.display="block";
    document.getElementById("ten").value=ten;
    document.getElementById("gia").innerHTML=gia;
    document.getElementById("hinh").innerHTML=hinh;
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
