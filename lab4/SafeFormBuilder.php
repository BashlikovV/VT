<?php
require_once('FormBuilder.php');

class SafeFormBuilder extends FormBuilder {

    public function __construct($method, $action, $submitValue) {
        parent::__construct($method, $action, $submitValue);
    }

    private function populateDefaultValues() {
        $values = array_merge($_POST, $_GET);
        foreach ($this->fields as &$field) {
            if (isset($values[$field['name']])) {
                $field['value'] = htmlspecialchars($values[$field['name']], ENT_QUOTES, 'UTF-8');
            }
        }
    }

    public function getForm() {
        $this->populateDefaultValues();
        return parent::getForm();
    }
}
?>