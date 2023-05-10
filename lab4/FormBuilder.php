<?php
class FormBuilder {
    const METHOD_POST = 'post';
    const METHOD_GET = 'get';

    public $method;
    public $action;
    public $submitValue;
    public $fields = [];

    public function __construct($method, $action, $submitValue) {
        $this->method = $method;
        $this->action = $action;
        $this->submitValue = $submitValue;
    }

    public function addTextField($name, $value) {
        $this->fields[] = [
            'type' => 'text',
            'name' => $name,
            'value' => $value
        ];
    }

    public function addRadioGroup($name, $options) {
        $radioButtons = [];
        foreach ($options as $option) {
            $radioButtons[] = [
                'type' => 'radio',
                'name' => $name,
                'value' => $option
            ];
        }
        $this->fields = array_merge($this->fields, $radioButtons);
    }

    public function getForm() {
        $form = '<form method="' . $this->method . '" action="' . $this->action . '">';
        foreach ($this->fields as $field) {
            $form .= '<input type="' . $field['type'] . '" name="' . $field['name'] . '" value="' . $field['value'] . '" />';
        }
        $form .= '<input type="submit" value="' . $this->submitValue . '" />';
        $form .= '</form>';
        return $form;
    }
}
?>