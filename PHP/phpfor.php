<?php
$cars = array(
array('toyato','red',123),
array('BMW','red',123),
array('marsardies','red',123)
);

for ($row=0; $row < 3; $row++) {
	echo "This Row number" .$row. "";
	echo "<ul>";
	for ($col=0; $col < 3; $col++) {
		echo "<li>" . $cars[$row][$col] . "</li>";
	}
	echo "</ul>";
}
?>
