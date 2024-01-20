<?php

namespace Core;

class Validator
{
    protected $errors = [];
    protected $data_items;
    protected $rulesList = ['required', 'min', 'max', 'email', 'match'];
    protected $messages = [
        'required' => 'The :fieldname: field is required',
        'min' => 'The :fieldname: field must be minimum :rulevalue: characters',
        'max' => 'The :fieldname: field must be maximum :rulevalue: characters',
        'email' => 'The :fieldname: is not valid email',
        'match' => 'The :fieldname: field must match :rulevalue: field'
    ];

    public function validate(array $data = [], array $rules = [])
    {
        $this->data_items = $data;
        foreach ($data as $fieldname => $value) {
            if(isset($rules[$fieldname])) {
                $this->check([
                    'fieldname' => $fieldname,
                    'value' => $value,
                    'rules' => $rules[$fieldname],
                ]);
            }
        }

        return $this;
    }

    protected function check(array $field)
    {
        foreach ($field['rules'] as $rule => $ruleValue) {
            if (in_array($rule, $this->rulesList)) {
                $methodName = $rule; // Имя метода соответствует правилу проверки
                $value = $field['value'];
                $result = $this->$methodName($value, $ruleValue);

                if (!$result) {
                    $this->addError($field['fieldname'], str_replace(
                        [':fieldname:', ':rulevalue:'],
                        [$field['fieldname'], $ruleValue],
                        $this->messages[$rule]
                        )
                    );
                }
            }
        }
    }

    public function getErrors ()
    {
        return $this->errors;
    }

    public function hasErrors()
    {
        return !empty($this->errors);
    }

    public function listErrors($fildname)
    {
        $output = '';
        if (isset($this->errors[$fildname])) {
            $output .=
            '<div class="invalid-feedback d-block"><ul class="list-unstyled">';
                foreach ($this->errors[$fildname] as $error) {
                    $output .= "<li>{$error}</li>";
                }
            $output .= '</ul></div>';
        }
        return $output;
    }

    protected function addError($fieldName, $error)
    {
        $this->errors[$fieldName][] = $error;
    }

    protected function required($value, $ruleValue)
    {
        return !empty(trim($value));
    }

    protected function min($value, $ruleValue)
    {
        return mb_strlen($value, 'UTF-8') >= $ruleValue;
    }
    protected function max($value, $ruleValue)
    {
        return mb_strlen($value, 'UTF-8') <= $ruleValue;
    }

    protected function email($value, $ruleValue)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    protected function match($value, $ruleValue)
    {
        return $value === $this->data_items[$ruleValue];
    }
}