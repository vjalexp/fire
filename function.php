<?php
function calc_it() 
	{
	
global $x1,$x2,$x3,$x4,$x5,$x6,$x7,$x8,$x9,$x10;
global $public_room,$industrial_room,$min_order,$hall_row,$floor,$K_pole,$K_smoke;
/* Общественные здания */
if(!empty($x1) && !empty($x2)) {
$raw_sum = $public_room*($x2 - $x3) + $hall_row*$x4 + $x1*$floor; //Расчет суммы без коэффициентов
if ($x9 == TRUE) 
	{
	$sum = $raw_sum * $K_smoke;
	}
else if ($x10 == TRUE) 
	{ 
	$sum = $raw_sum * $K_pole;
	}
else if ($x10 == TRUE && $x9 == TRUE) {
	$sum = $raw_sum * $K_pole * $k_smoke;
	}
else {
	$sum = $raw_sum;
	}
}
/* Производственные здания */
if(!empty($x5) && !empty($x6)) {
$raw_sum = $industrial_room*($x6 - $x7) + $hall_row*$x8 + $x5*$floor; //Расчет суммы без коэффициентов
if ($x9 == TRUE) 
	{
	$sum = $raw_sum * $K_smoke;
	}
else if ($x10 == TRUE) 
	{ 
	$sum = $raw_sum * $K_pole;
	}
else if ($x10 == TRUE && $x9 == TRUE) {
	$sum = $raw_sum * $K_pole * $k_smoke;
	}
else {
	$sum = $raw_sum;
	}
}
/* */

echo "<p>Количество этажей: $x1 $x5  </p>";
echo "<p>Количество всех помещений: $x2 $x6 </p>";
echo "<p>Количество только помещений с массовым пребыванием людей:  $x3 $x7 </p>";
if($sum < $min_order) { //доводка цены до минимальной суммы заказа
	$min_order_dif = $min_order - $sum;
	echo "<p>Ваша сумма меньше суммы минимального заказа на $min_order_dif RUR и будет увеличена до $min_order RUR</p>";
	$complete_sum = $sum + $min_order_dif; 
	echo "<p style='color:red'>Сумма заказа: ".number_format($complete_sum,0,'',' ')." RUR </p>";
}
else {
	echo "<p style='color:red'>Сумма заказа: ".number_format($sum,0,'',' ')." RUR </p>";
}
if ($x9 == TRUE) {
echo "<p>Будет произведен расчет задымляемости лестничных клеток </p>";
}
if ($x10 == TRUE) {
echo "<p>Есть этажи выше шести метров, атриумы, второй свет и т.д.</p>";
}
	
	}
?>