<?php namespace Kilrizzy\Bootforms;

use Illuminate\Support\Facades\Form;

class Bootform{
   
    public function __construct(){
        //
    }

    /**
     * Generate an html form field component
     *
     * @param  array  $options
     * @return string
     */
    public function field($options){
        //Assign Defaults
        $defaults = array(
            'type' => "text", //field input type (text, textarea, password, select, checkbox, radio, file)
            'name' => "", //field input name
            'id' => "", //field input id
            'value' => "", //field input value
            'label' => "", //field label
            'help' => "", //field help display text
            'label-class' => "", //label class
            'group' => true, //wrap group
            'group-class' => "", //class applied to the group container
            'group-attributes' => array(), //additional group attributes
            'controls' => true, //wrap controls
            'controls-class' => "", //class applied to the controls container
            'controls-attributes' => array(), //additional controls attributes
            'input-class' => "", //class applied to the input
            'input-attributes' => array(), //additional input attributes
            'input-prepend' => "", //prepend control data
            'input-append' => "", //append control data
            'base-label-class' => "control-label", //initial label class (in addition to label-class)
            'base-group-class' => "control-group", //initial group class (in addition to group-class)
            'base-controls-class' => "controls", //initial controls class (in addition to controls-class)
        );

        //Overwrite Defaults with $options
        $field = array_merge($defaults,$options);

        //Some field updates
        //--create id if not set
        if(empty($field['id'])){
            $field['id'] = $field['name'];
        }
        //--Add field type to group class
        $field['group-class'] .= ' field-group-'.$field['type'];
        //--Add name to group class
        $field['group-class'] .= ' '.$field['base-group-class'].'-'.$this->cleanString($field['name']);
        //Create output
        $output_items = array();

        //Create field HTML
        $output_items['field'] = $this->makeField($field);
        $output_items['label'] = $this->makeLabel($field);
        //Wrap Controls
        $output_items['controls'] = $this->wrapControls($field, $output_items['field']);
        //Wrap Group
        $output_items['group'] = $this->wrapGroup($field, $output_items['label'].$output_items['controls']);
        
        $output = $output_items['group'];
        return $output;

    }
    
    /**
     * Make field HTML from field array
     *
     * @param  array  $field
     * @return string
     */
    private function makeField($field){
        $output = '';
        //combine additional input attributes
        $input_attributes = array('class'=>$field['input-class']);
        $input_attributes = array_merge($input_attributes, $field['input-attributes']);
        //
        //TEXT
        if($field['type'] == "text"){
            $output .= Form::text($field['name'], $field['value'],$input_attributes);
        }
        //TEXTAREA
        if($field['type'] == "textarea"){
            $output .= Form::textarea($field['name'], $field['value'],$input_attributes);
        }
        //PASSWORD
        if($field['type'] == "password"){
            $output .= Form::password($field['name'], $field['value'],$input_attributes);
        }
        //SELECT
        if($field['type'] == "select"){
            $output .= Form::select($field['name'], $field['options'], $field['value'],$input_attributes);
        }
        //CHECKBOXES
        if($field['type'] == "checkbox"){
            foreach($field['options'] as $option_key=>$option_value){
                $output .= '<label class="checkbox">';
                    $checked = false;
                    if(is_array($field['value']) && in_array($option_key, $field['value'])){
                        $checked = true;
                    }
                    $output .= Form::checkbox($field['name'], $option_key, $checked);
                    $output .= $option_value;
                $output .= '</label>';
            }
        }
        //RADIO
        if($field['type'] == "radio"){
            foreach($field['options'] as $option_key=>$option_value){
                $output .= '<label class="radio">';
                    $checked = false;
                    if($option_key == $field['value']){
                        $checked = true;
                    }
                    $output .= Form::radio($field['name'], $option_key, $checked);
                    $output .= $option_value;
                $output .= '</label>';
            }
        }
        //FILE
        if($field['type'] == "file"){
            $output .= Form::file($o['name']);
        }
        //return
        return $output;
    }

    /**
     * Make field label from field array
     *
     * @param  array  $field
     * @return string
     */
    private function makeLabel($field){
        $output = '';
        if(!empty($field['label'])){
            //Label Start
            $output .= '<label for="'.$field['name'].'" class="'.$field['base-label-class'].' '.$field['label-class'].'">';
                $output .= $field['label'];
            //Label End
            $output .= '</label>';
        }
        return $output;
    }

    /**
     * Wrap field in control html
     *
     * @param  array  $field
     * @param  string  $contents
     * @return string
     */
    private function wrapControls($field,$contents){
        $control_attributes = $this->makeAttributes($field['controls-attributes']);
        if($field['controls']){
            //Add append / prepend classes
            if(!empty($field['input-prepend'])){
                $field['controls-class'] .= ' input-prepend';
            }
            if(!empty($field['input-append'])){
                $field['controls-class'] .= ' input-append';
            }
            //
            $controls_start = '';
            $controls_end = '';
            //start
            $controls_start = '<div class="'.$field['base-controls-class'].' '.$field['controls-class'].'" '.$control_attributes.'>';
            //prepend
            if(!empty($field['input-prepend'])){
                $controls_start .= '<span class="add-on">'.$field['input-prepend'].'</span>';
            }
            //append
            if(!empty($field['input-append'])){
                $controls_end .= '<span class="add-on">'.$field['input-append'].'</span>';
            }
            //HELP
            if(!empty($field['help'])){
                $controls_end .= '<span class="help-block">'.$field['help'].'</span>';
            }
            //Controls End
            $controls_end .= '</div>';
            //output
            return $controls_start.$contents.$controls_end;
        }else{
            return $contents;
        }
    }

    /**
     * Wrap field in group html
     *
     * @param  array  $field
     * @param  string  $contents
     * @return string
     */
    private function wrapGroup($field,$contents){
        $group_attributes = $this->makeAttributes($field['group-attributes']);
        if($field['controls']){
            $group_start = '';
            $group_end = '';
            $group_start .= '<div class="'.$field['base-group-class'].' '.$field['group-class'].'"  '.$group_attributes.'>';
            $group_end .= '</div>';
            return $group_start.$contents.$group_end;
        }else{
            return $contents;
        }
    }

    /**
     * Make attributes html from array
     *
     * @param  array  $attributes
     * @return string
     */
    private function makeAttributes($attributes){
        $output = '';
        $attr_items = array();
        if(is_array($attributes)){
            foreach($attributes as $attributes_key => $attributes_value){
                $attr_items[] = $attributes_key.' = "'.$attributes_value.'"';
            }
            $output = implode(' ',$attr_items);
        }
        return $output;
    }

    private function cleanString($string){
        $string = preg_replace("/[^A-Za-z0-9]/", '', $string);
        return $string;
    }

}