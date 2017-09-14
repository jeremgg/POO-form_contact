<?php

    class Form{

        //Initialize form data
        private $datas = [];



        /**
         * Send the form data to the instance
         * @param $datas  Form data
         */
        public function __construct($datas = []){
            $this->datas = $datas;
        }



        /**
         * Retrieve the value of the fields
         * @param  $name Field name
         * @return string
         */
         private function getValue($name){
             if(isset($this->datas[$name])) {
                 return $this->datas[$name];
             }else{
                 return '';
             }
         }



        /**
         * Save the value of the fields and
         * generating form fields
         * @param  $type   Field Type
         * @param  $name   Field name
         * @param  $label  Field Label
         * @return string
         */
        private function input($type, $name, $label){
            $value = $this->getValue($name);
            if($type == 'textarea'){
                $input = "<textarea name=\"$name\" class=\"form-control\" id=\"input$name\">$value</textarea>";
            }
            else{
                $input = "<input type=\"$type\" name=\"$name\" class=\"form-control\" id=\"input$name\" value=\"$value\">";

            }
            return "<div class=\"form-group\">
                <label for=\"input$name\">$label</label>
                $input
            </div>";
        }



        /**
         * Generate text form fields
         * @param  $name   Field name
         * @param  $label  Field Label
         * @return string
         */
        public function text($name, $label){
            return $this->input('text', $name, $label);
        }



        /**
         * Generate email form fields
         * @param  $name   Field name
         * @param  $label  Field Label
         * @return string
         */
        public function email($name, $label){
            return $this->input('email', $name, $label);
        }



        /**
         * Generate textarea form fields
         * @param  $name   Field name
         * @param  $label  Field Label
         * @return string
         */
        public function textarea($name, $label){
            return $this->input('textarea', $name, $label);
        }



        /**
         * Generate select form fields
         * @param  $name     Field name
         * @param  $label    Field Label
         * @param  $options  Field options
         * @return string
         */
        public function select($name, $label, $options){
            $options_html = "";
            $value = $this->getValue($name);

            //list options and set the selected option
            foreach($options as $k => $v){
                $selected = '';
                if($value == $k){
                    $selected = ' selected';
                }
                $options_html .= "<option value=\"$k\"$selected>$v</option>";
            }

            return "<div class=\"form-group\">
                <label for=\"input$name\">$label</label>
                <select name=\"$name\" class=\"form-control\" id=\"input$name\">$options_html</select>
            </div>";
        }



        /**
         * Generate form button
         * @param  $label  Button Label
         * @return string
         */public function submit($label){
            return '<button type="submit" class="btn btn-primary">' . $label . '</button>';
        }
    }


?>
