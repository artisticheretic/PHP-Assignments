<?php

    class EmailValidation {

        private $email;
        private $emailErr = [];

        public function __construct($em) {

            $this->email = $em;

        }

        public function emailValidate() {

            $this->validateEmail();
            return $this->emailErr;

        }

        public function validateEmail() {

            $emailId = $this->email['email'];

            if(empty($emailId)) {
                $this->addEmailErr('email', 'Email ID Cannot Be Empty');
            }
            else {
                if (!filter_var($emailId, FILTER_VALIDATE_EMAIL)) {
                    $this->addEmailErr('email', 'Invalid Email Syntax');
                }
                else {
                    $this->addEmailErr('email', 'Valid Email Syntax');
                }
            }

        }

        public function addEmailErr($key, $emailId) {

            $this->emailErr[$key] = $emailId;

        }

        public function emailGetApi() {

            $curl = curl_init();
            $emailId = $this->email;

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.apilayer.com/email_verification/check?email=$emailId",
                CURLOPT_HTTPHEADER => array(
                        "apikey: dKK0sX4WHp19gRZRUiQHnYjkUc1c8h31"
                ),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET"
                ));

            $response = curl_exec($curl);
            $validationResult = json_decode($response);

            if (($validationResult->format_valid) && ($validationResult->smtp_check)) {
                return $emailId;
            } else{
                return "WRONG EMAIL FORMAT";
            }

            curl_close($curl);
            
            
        }

    }

?>