<?php

function xss($val){
	return htmlspecialchars($val,ENT_QUOTES);
}



?>