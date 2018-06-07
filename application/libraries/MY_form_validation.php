<?php

class MY_Form_validation extends CI_Form_validation {


    public function thai_character($input) 
    {

        $this->set_message('thai_character', '{field}, โปรดกรอกภาษาไทยเท่านั้น');

        if (preg_match("/^[ก-๙]+$/", $input)) {
        // if (preg_match("/^[A-Za-zก-๙]+$/", $input)) {                               
            return true;
        }
    
        return false;
    }

    public function thai_en_character($input) 
    {

        $this->set_message('thai_en_character', '{field}, โปรดกรอกภาษาไทยหรือภาษาอังกฤษเท่านั้น');

        // if (preg_match("/^[ก-๙]+$/", $input)) {
        if (preg_match("/[A-Za-zก-๙]+$/", $input)) {                               
            return true;
        }
    
        return false;
    }

    public function checkDateTime($dt)
    {
        $pattern = '[\d{4}-(0[1-9]|1[0-2])-(0[1-9]|1[0-9]|2[0-9]|3(0|1))]';
        if(preg_match($pattern, $dt)) {
            return true;
        }
        
        $this->form_validation->set_message('checkDateTime', 'Invalid Date!');
        return false;
    }
}