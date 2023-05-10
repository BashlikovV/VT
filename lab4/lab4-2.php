<?php
require_once 'SafeFormBuilder.php';

$_POST = ['name' => 'John', 'age' => '25'];
$_GET = ['category' => 'books'];

$safeFormBuilder = new SafeFormBuilder(SafeFormBuilder::METHOD_POST, 'process.php', 'Submit');
$safeFormBuilder->addTextField('name', '');
$safeFormBuilder->addTextField('age', '');
$safeFormBuilder->addRadioGroup('category', ['books', 'movies']);

echo $safeFormBuilder->getForm();
?>