<?php

namespace Core;

class Validator
{
    protected $errors = [];
    protected $rulesList = ['required', 'min', 'max', 'email'];
    protected $messages = [
        'required' => 'The :fieldname: field is required',
        'min' => 'The :fieldname: field must be minimum :rulevalue: characters',
        'max' => 'The :fieldname: field must be maximum :rulevalue: characters',
        'email' => 'The :fieldname: is not valid email',
    ];

    public function validate(array $data = [], array $rules = [])
    {
        foreach ($data as $fieldname => $value) {
            if(in_array($fieldname, array_keys($rules))) {
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

    protected function addError($fieldName, $error)
    {
        $this->errors[$fieldName][] = $error;
    }

    public function getErrors ()
    {
        return $this->errors;
    }

    public function hasErrors()
    {
        return !empty($this->errors);
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
}