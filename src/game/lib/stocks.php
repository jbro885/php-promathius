<?
// Check that the script is not being accessed directly
if ( !defined('PROMATHIUS') )
{
	die("Hacking attempt");
}
// Run stock database changes
$times = howmanytimes(lasttime('stocks'), $perminutes);

if(newday('stocks')) {
	// bump stocks a day
	mysql_safe_query("UPDATE $stockdb SET days3=days2;");
	mysql_safe_query("UPDATE $stockdb SET days2=days1;");
	$stocks = mysql_safe_query("SELECT * FROM $stockdb;");       
	$days = date('z', lasttime('stocks')) + 200;
	while ($stock = mysql_fetch_array($stocks)) {
		$x = 0.5;
		$b = - $stock['bender'] / 1000;
		for($i = 0; $i < $days; $i++) {
			$x = $x * $x + $b;
		}
		$add = $stock['bender'] / 1000 + 1;
		$newprice = round(($x+$add)*40000);
		$diff = round(240*($newprice - $stock['days2']) / 1500);
		$p = $stock[days2] + $diff;
		if($p < 1)
			$p = 1;

		mysql_safe_query("UPDATE $stockdb SET days1=$p WHERE id=$stock[id];");
	}
	justRun('stocks', $perminutes);
}

if($times) {
	echo "<!-- hi -->";
	// stock market functions! yeehaw
	$stocks = mysql_safe_query("SELECT * FROM $stockdb;");       
	$days = date('z') + 200;
	while ($stock = mysql_fetch_array($stocks)) {
		$x = 0.5;
		$b = - $stock['bender'] / 1000;
		for($i = 0; $i < $days; $i++) {
			$x = $x * $x + $b;
		}
		$add = $stock['bender'] / 1000 + 1;
		$newprice = round(($x+$add)*40000);
		$diff = round($times*($newprice - $stock['days1']) / 1500);
		$stock[price] += $diff;  
		if($stock[price] < 1)
			$stock[price] = 1;

		mysql_safe_query("UPDATE $stockdb SET price=$stock[price] WHERE id=$stock[id];");
	}
	justRun('stocks', $perminutes);
}

?>
