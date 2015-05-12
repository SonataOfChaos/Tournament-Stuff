<?php

// Script by Fred Fletcher, Canada.

$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$location = $_POST['location'];
$report = $_POST['report'];
$description = $_POST['desc'];

$xml = new DOMDocument('1.0', 'utf-8');
$xml->formatOutput = true;
$xml->preserveWhiteSpace = false;
$xml->load('TeamMail.xml');

$element = $xml->getElementsByTagName('reports')->item(0);

$timestamp = $element->getElementsByTagName('timestamp')->item(0);
$fname = $element->getElementsByTagName('fname')->item(0);
$lname = $element->getElementsByTagName('lname')->item(0);
$location = $element->getElementsByTagName('location')->item(0);
$report = $element->getElementsByTagName('report')->item(0);
$description = $element->getElementsByTagName('description')->item(0);

$newItem = $xml->createElement('reports');

$newItem->appendChild($xml->createElement('timestamp', date("F j, Y, g:i a",time())));;

$newItem->appendChild($xml->createElement('fname', $_POST['firstname']));
$newItem->appendChild($xml->createElement('lname', $_POST['lastname']));
$newItem->appendChild($xml->createElement('location', $_POST['location']));
$newItem->appendChild($xml->createElement('report', $_POST['report']));
$newItem->appendChild($xml->createElement('description', $_POST['desc']));

$xml->getElementsByTagName('entries')->item(0)->appendChild($newItem);

$xml->save('TeamMail.xml');

echo "Data has been written.";

?>