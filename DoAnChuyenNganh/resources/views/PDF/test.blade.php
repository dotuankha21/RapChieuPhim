<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" /> -->
    <link rel="icon" type="image/x-icon" href="../img/logo.ico">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <title>Hóa Đơn</title>
</head>
<style>    
body {
    margin: 0;
    padding: 0;
    background-color: #FAFAFA;
    font: 12pt "Tohoma";
}
* {
    box-sizing: border-box;
    -moz-box-sizing: border-box;
}
.page {
    width: 18cm;
    overflow:hidden;
    min-height:297mm;
    padding: 2.5cm;
    margin-left:auto;
    margin-right:auto;
    background: white;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}
.subpage {
    padding: 1cm;
    border: 5px red solid;
    height: 237mm;
    outline: 2cm #FFEAEA solid;
}
 @page {
 size: A4;
 margin: 0;
}
button {
    width:100px;
    height: 24px;
}
.header {
    overflow:hidden;
}
.logo {
    background-color:#FFFFFF;
    text-align:left;
    float:left;
}
.title {
    text-align:center;
    position:relative;
    color:#0000FF;
    font-size: 24px;
    top:1px;
}
.footer-left {
    text-align:center;
    text-transform:uppercase;
    padding-top:24px;
    position:relative;
    height: 150px;
    width:50%;
    color:#000;
    float:left;
    font-size: 12px;
    bottom:1px;
}
.footer-right {
    text-align:center;
    text-transform:uppercase;
    padding-top:24px;
    position:relative;
    height: 150px;
    width:50%;
    color:#000;
    font-size: 12px;
    float:right;
    bottom:1px;
}
.TableData {
    /* background:#ffffff;
    font: 13px;
    width:100%;
    border-collapse:collapse;
    font-family:Verdana, Arial, Helvetica, sans-serif;
    font-size:15px;
    border:thin solid #d3d3d3; */
}
.TableData TH {
    background: rgba(0,0,255,0.1);
    text-align: center;
    font-weight: bold;
    color: #000;
    border: solid 1px #ccc;
    height: 24px;
}
.TableData TR {
    height: 24px;
    border:thin solid #d3d3d3;
}
.TableData TR TD {
    padding-right: 2px;
    padding-left: 2px;
    border:thin solid #d3d3d3;
}
.TableData TR:hover {
    background: rgba(0,0,0,0.05);
}
.TableData .cotSTT {
    text-align:center;
    width: 5%;
}
.TableData .maVe {
    text-align:left;
    width: 15%;
}
.TableData .Ghe {
    text-align:left;
    width: 30%;
}
.TableData .DonGia {
    text-align:right;
    width: 120px;
}
/* .TableData .cotSoLuong {
    text-align: center;
    width: 50px;
} */
.TableData .cotSo {
    text-align: right;
    width: 120px;
}
.TableData .tong {
    text-align: right;
    font-weight:bold;
    text-transform:uppercase;
    padding-right: 4px;
}
/* .TableData .cotSoLuong input {
    text-align: center;
} */
@media print {
 @page {
 margin: 0;
 border: initial;
 border-radius: initial;
 width: initial;
 min-height: initial;
 box-shadow: initial;
 background: initial;
 page-break-after: always;
}
}
</style>
<body onload="window.print();">
<div id="page" class="page">
    <div class="header">
        <div class="logo"><img src="" width="50px" height="50px"/></div>
        
    </div>
    <center><div class="title">
        Hoa Don Thanh Toan
        <br/>
        -------oOo-------
  </div></center>
  <br/>
<center>
  <table class="TableData">
    <h4>Ma HD: {{ $data[0]->MAHOADON }}</h4>
    <h4>Ngay lap: {{ $data[0]->NGAYTAO }} </h4>
    <h4>Nhan vien: {{ $data[0]->MANHANVIEN }}</h4>
    <br>
    <h4>Thong Tin Ve</h4>
    <tr>
      <th>STT</th>
      <th>Ma</th>
      <th>Ghe</th>
      <th>Gia</th>
    </tr>
    <?php
    $pos = 1;
    
    foreach($data as $invoice)
    {
        echo "<tr>";
        echo "<td class=\"cotSTT\">".$pos++."</td>";
        echo "<td class=\"maVe\">".$invoice["idVe"]."</td>";
        echo "<td class=\"Ghe\">".$invoice["MaGheNgoi"]."</td>";
        echo "<td class=\"Dongia\" align='center'>".$invoice["GiaVe"]."</td>";
        echo "</tr>";
    }       
?>
<br>
    <h4>Thong Tin Thuc An</h4>
    <tr>
      <th>STT</th>
      <th>Ma</th>
      <th>Ten</th>
      <th>So Luong</th>
      <th>Gia</th>
      <th>Tong</th>
    </tr>
    <?php
    $pos = 1;
    
    foreach($data1 as $invoice)
    {
        echo "<tr>";
        echo "<td class=\"cotSTT\">".$pos++."</td>";
        echo "<td class=\"maVe\">".$invoice["MATHUCAN"]."</td>";
        echo "<td class=\"Ghe\">".$invoice["TENTHUCAN"]."</td>";
        echo "<td class=\"Dongia\" align='center'>".$invoice["SOLUONG"]."</td>";
        echo "<td class=\"Dongia\" align='center'>".$invoice["DONGIA"]."</td>";
        echo "<td class=\"Dongia\" align='center'>".$invoice["SOLUONG"]*$invoice["DONGIA"]."</td>";
        echo "</tr>";
    }       
?>
  </table>
  </center>
  <div>
    <br>
    <center>---oOo------------------------------------------------------------------------------------------------------oOo---</center>
    <br>
    <h3 border-bottom: 1px solid #000><center>Tong Thanh Tien: {{ $data[0]->TONGTIEN }}&nbsp;VND</center></h3>
    <br>
</div>
  <div class="footer-left"> HCM, ngay  thang  nam 2023<br/>
    Khách hàng </div>
  <div class="footer-right"> HCM, ngay  thang  nam 2023<br/>
    Nhân viên </div>
</div>

</body>
</html>
