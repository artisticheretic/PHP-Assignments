<?php

// Defining Validation Class Of First Name And Last Name

    class NameValidation {

// Defining private and public properties and methods 

        private $data;
        private $errors = [];

        public function __construct($post_data) {

            $this->data = $post_data;
        }

// Function to call other functions which will validate the individual fields and throw errors if any.

        public function validateForm() {

            $this->validateFirstName();
            $this->validateLastName();
            return $this->errors;

        }

// Validating First Name - Alphabetic input ONLY

        private function validateFirstName() {

            $val = trim($this->data['fname']);

            if(empty($val)) {
                $this->addError('fname', 'First Name Cannot Be Empty And/Or Contain Empty Spaces');
            }
            else {
                if (!preg_match("/^[a-zA-Z-']*$/",$val)) {
                    $this->addError('fname', 'Only Alphabets Are Allowed And No Empty Spaces');
                }
            }

        }

// Validating Last Name - Alphabetic input ONLY

        private function validateLastName() {

            $val = trim($this->data['lname']);

            if(empty($val)) {
                $this->addError('lname', 'Last Name Cannot Be Empty And/Or Contain Empty Spaces');
            }
            else {
                if (!preg_match("/^[a-zA-Z-']*$/",$val)) {
                    $this->addError('lname', 'Only Alphabets Are Allowed And No Empty Spaces');
                }
            }

        }

// Function which displays the respective errors 

        private function addError($key, $val) {

            $this->errors[$key] = $val;

        }

    }

?>