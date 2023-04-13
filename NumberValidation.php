<?php

// Defining Validation Class Of Phone Number

    class NumberValidation {

        private $phone;
        private $phoneErr = [];

        public function __construct($ph) {

            $this->phone = $ph;

        }

        public function phoneValidate() {

            $this->validateNumber();
            return $this->phoneErr;

        }

        public function validateNumber() {

            $phoneNumber = $this->phone['phone'];

            if(empty($phoneNumber)) {
                $this->addPhoneErr('phone', 'Phone Number Cannot Be Empty');
            }
            else {
                if (!preg_match('/^(91)+[0-9]{10}$/', $phoneNumber)) {
                    $this->addPhoneErr('phone', 'Phone Number Can Only Contain 10 Digits And Must Start With "91" ');
                }
            }

        }

        public function addPhoneErr($key, $phoneNumber) {

            $this->phoneErr[$key] = $phoneNumber;

        }

    }


?>
