<?php

    class ValidateForm{

        //Initialize the data to be validated from the form
        private $datas = [];

        //Initialize the error array
        private $errors = [];



        /**
         * Send the form data to the instance
         * @param $datas  Form data
         */
         public function __construct($datas){
             $this->datas = $datas;
         }



        /**
         * Check data in a form field
         * @param  $name    The name of the field
         * @param  $rule    The validation rule to use
         * @param  boolean  $options  Optional options
         */
         public function check($name, $rule, $options = false){
             $validator = "validate_$rule";
             if(!$this->$validator($name, $options)){
                 $this->errors[$name] = "Le champs $name n'a pas été rempli correctement";
             }
         }



        /**
         * Check that the field is filled
         * @param  $name  The name of the field
         */
         public function validate_required($name){
             return array_key_exists($name, $this->datas) && $this->datas[$name] != '';
         }



        /**
         * Check that the email field is filled
         * @param  $name  The name of the email field
         */
         public function validate_email($name){
             return array_key_exists($name, $this->datas) && filter_var($this->datas[$name], FILTER_VALIDATE_EMAIL);
         }



        /**
         * Check that the selected option of the select field exists in the $options array
         * @param  $name     The name of the field
         * @param  $options  Array containing key options
         */
         public function validate_in($name, $options){
             return array_key_exists($name, $this->datas) && in_array($this->datas[$name], $options);
         }



        /**
         * Recover Form Validation Errors
         * @return array
         */
         public function errors(){
             return $this->errors;
         }
    }

?>
