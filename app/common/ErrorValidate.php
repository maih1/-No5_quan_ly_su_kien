<?php
    class ErrorValidate { 

        protected $_errors = array();

        //add an error for an attribute if the validation fails
        public function addError($attribute, $error) { 
            $this->_errors[$attribute] = $error;
        }

        //get the error for an attribute
        public function getError($attribute) { 
            return (isset($this->_errors[$attribute])) ? $this->_errors[$attribute] : '';
        }
        //get all errors for all attributes
        public function getErrors() {
            return $this->_errors;       
        }

        // public abstract function load($data);
        // public abstract function validate();

    }
?>