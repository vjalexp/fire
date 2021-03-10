<?php
//error_reporting(E_ALL);
//error_reporting(!E_NOTICE);
require("config.php");
require("function.php");
$x1 = 0;
$x2 = 0;
$x3 = 0;
$x4 = 0;
$x5 = 0;
$x6 = 0;
$x7 = 0;
$x8 = 0;
$x9 = FALSE;
$x10 = FALSE;
?>
<html>
<head>
<style>
body {font-family:Tahoma;font-size:9pt;}
#order_result {padding:10px; background: #fc3;}
#public_rooms {padding-left: 10px; background: #ccc; }
#industrial_rooms {padding-left: 10px; background:#bbb; display:none;}
</style>
<script language="javascript">
function show_industrial() {
document.getElementById("public_rooms").style.display = "block";
document.getElementById("industrial_rooms").style.display = "none";
}
function show_public() {
document.getElementById("public_rooms").style.display = "none";
document.getElementById("industrial_rooms").style.display = "block";
}
function show_both() {
document.getElementById("public_rooms").style.display = "block";
document.getElementById("industrial_rooms").style.display = "block";
}
</script>
</head>
<body>
<p><h3>Стоимость расчета пожарной эвакуации</h3></p>
<form action='' name='myform' method='POST' >
	<span onClick='javascript:show_industrial();' style='cursor:pointer;'><u>Общественные здания</u></span>
	<span onClick='javascript:show_public();' style='cursor:pointer;'><u>Производственные здания</u></span>
	<!--| <span onClick='javascript:show_both();'  style='cursor:pointer;'><u>Все здания</u></span></p>-->
<div id='public_rooms'>
<p><b>Общественные здания</b></p>
	<p>Количество этажей <input type='text' size='2' name='x1' maxlength='5'></input></p>
	<p>Количество всех помещений <input type='text' size='2' name='x2' maxlength='5'></input></p>
	<p>Количество только помещений с массовым пребыванием людей <input type='text' size='2' name='x3' maxlength='5'></input></p>
	<p>Количество рядов в зальных помещениях <input type='text' size='2' name='x4' maxlength='5'></input></p>
</div>
<div id='industrial_rooms'>
<p><b>Производственные здания</b></p>
	<p>Количество этажей <input type='text' size='2' name='x5' maxlength='5'></input></p>
	<p>Количество всех помещений <input type='text' size='2' name='x6' maxlength='5'></input></p>
	<p>Количество только помещений с массовым пребыванием людей <input type='text' size='2' name='x7' maxlength='5'></input></p>
	<p>Количество рядов в зальных помещениях <input type='text' size='2' name='x8' maxlength='5'></input></p>
</div>
<p>Наличие задымляемых лестничных клеток <input type='checkbox' name='x9' ></input>
<p>Есть ли этажи выше шести метров, атриумы, второй свет и т.д. <input type='checkbox' name='x10' ></input>
<p><input type='submit' name='count' value='Рассчитать' ></input>
</form>
<?
if(isset($_REQUEST['count']))
	{
//print_r($_REQUEST);

/* Общественные здания */
$x1 = $_REQUEST['x1']; //Кол-во этажей
$x2 = $_REQUEST['x2']; //Кол-во всех помещений с пребыванием людей
$x3 = $_REQUEST['x3']; //Кол-во помещений с массовым пребыванием людей и/или сложной конструкции
$x4 = $_REQUEST['x4']; //Кол-во рядов в зальных помещениях
/* Производственные здания */
$x5 = $_REQUEST['x5']; //Кол-во этажей
$x6 = $_REQUEST['x6']; //Кол-во всех помещений с пребыванием людей
$x7 = $_REQUEST['x7']; //Кол-во помещений с массовым пребыванием людей и/или сложной конструкции
$x8 = $_REQUEST['x8']; //Кол-во рядов в зальных помещениях

$x9 = $_REQUEST['x9']; //Наличие задымляемых лестничных клеток
$x10 = $_REQUEST['x10']; //Есть ли этажи выше шести метров, атриумы, второй свет и т.д.

for($i=1;$i<=8;$i++) {
if (!eregi("^([0-9])", $x.$i)) { $er = 1; } //Проверка ввода числового кол-ва помещений, а не спама
}
if ($x2 <1 && $x6 <1 ) { $er = 1; }  //Проверка заполнения хоть одной комнаты
if ($er == "") {
echo "<div id='order_result'>";
echo "<p><b>Ваш заказ:</b> </p>";
calc_it();
echo "</div>";
}
else {
echo "<div id='order_result'>";
echo "<p>Вы ввели неверные данные либо Ваш заказ пустой!</p>";
echo "</div>";
}

	}
?>
</body>
</html>