<?php

function compareFirstName($a, $b) {
	return $a['firstName'] > $b['firstName'] ? 1 : -1;
}

function compareMiddleName($a, $b) {
	return $a['middleName'] > $b['middleName'] ? 1 : -1;
}

function compareLastName($a, $b) {
	return $a['lastName'] > $b['lastName'] ? 1 : -1;
}

$people = array(
	'lady' => array(
		'firstName' => 'Elli',
		'middleName' => 'Rose', 
		'lastName' => 'Balcomb'
		)
	,
	'gentleman' => array(
		'firstName' => 'Nathan', 
		'middleName' => 'Patrick',
		'lastName' => 'Walsh'
		)
	,
	'pet' => array(
		'firstName' => 'Professor',
		'middleName' => 'Catface',
		'lastName' => 'Meowmers'
		)
	);

$fruit = array(
	'apple' => 'Kalin',
	'banana' => 'Elli', 
	'mango' => 'Nate',
	'kiwi' => 'James'
	);

// sort via a callback that makes a comparison
usort($people, 'compareFirstName');
usort($people, 'compareMiddleName');
usort($people, 'compareLastName');

// sort associative array via the keys (hence K!)
ksort($people);
print_r($people);

// sort associative array via the values
asort($fruit);
print_r($fruit);
