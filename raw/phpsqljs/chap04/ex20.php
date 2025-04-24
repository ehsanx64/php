<?php	// An if ... else statement with curly braces
$bank_balance = 1000;
$savings = $money = 0;
echo "Current Bank Balance: $bank_balance<br />";
echo "Current Money: $money<br />";
echo "Current Savings: $savings<br />";
if ($bank_balance < 100) {
	$money += 1000;
	$bank_balance += $money;
} else {
	$savings += 50;
	$bank_balance -= 50;
}
echo "Applied Bank Balance: $bank_balance<br />";
echo "Current Money: $money<br />";
echo "Current Savings: $savings<br />";
?>

