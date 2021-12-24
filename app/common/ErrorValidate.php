<?php
    $errors = array();

    //add an error for an attribute if the validation fails
    function addError($attribute, $error) { 
        $errors[$attribute] = $error;
    }

    //get the error for an attribute
    function getError($attribute) { 
        return (isset($errors[$attribute])) ? $errors[$attribute] : '';
    }
    //get all errors for all attributes
    function getErrors() {
        global $errors;
        return $errors;       
    }
?>