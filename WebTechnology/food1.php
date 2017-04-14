<?php
	extract($_GET);
	$name=$type;
switch ($name) {
    case "Chicken 65":
        echo "http://localhost/wt2pro/C65.php";
        break;
    case "Paneer tikka masala":
        echo "http://localhost/wt2pro/PTM.php";
        break;
    case "Masala Dosa":
        echo "http://localhost/wt2pro/MS.php";
		break;
	case "Rosgulla":
		echo "http://localhost/wt2pro/R.php";
        break;
    default:
        echo "Not found!";
}
?>