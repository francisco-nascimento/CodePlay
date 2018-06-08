<?php
$a = "VivaOLinux";
$b = "vivaolinux";

if ( strcasecmp($a,$b)==0 ) {
	echo "$a é igual à $b";
} else {
	echo "$a NÃO é igual à $b";
}

echo strcasecmp($a,$b);
?>