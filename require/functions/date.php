<?php
function minMonth($date) {
	if ($date == 1) {
		return 'Jan';
	} elseif($date == 2) {
		return 'Fev';
	} elseif($date == 3) {
		return 'Mar';
	} elseif($date == 4) {
		return 'Abr';
	} elseif($date == 5) {
		return 'Mai';
	} elseif($date == 6) {
		return 'Jun';
	} elseif($date == 7) {
		return 'Jul';
	} elseif($date == 8) {
		return 'Ago';
	} elseif($date == 9) {
		return 'Set';
	} elseif($date == 10) {
		return 'Out';
	} elseif($date == 11) {
		return 'Nov';
	} elseif($date == 12) {
		return 'Dez';
	}
}
?>