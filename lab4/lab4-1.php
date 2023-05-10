<?php
    require_once 'FormBuilder.php';

    $_POST = ['name' => 'John', 'age' => '25'];
    $_GET = ['category' => 'books'];

    $formBuilder = new FormBuilder(FormBuilder::METHOD_POST, 'process.php', 'Submit');
    $formBuilder->addTextField('name', '');
    $formBuilder->addTextField('age', '');
    $formBuilder->addRadioGroup('category', ['books', 'movies']);

    echo $formBuilder->getForm();
?>