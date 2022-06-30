<?php

namespace app\core;

abstract class Model {

    protected $errors;

    abstract public function is_valid();

    public function getErrors(){
        return $this->errors;
    }

    protected function isNotNull($attribute_name, $attribute_value){
        if (is_null($attribute_value)){
            $this->errors[$attribute_name] = $attribute_name . ' não pode ser nulo.';
        }
    }

    protected function isNotBlank($attribute_name, $attribute_value){
        if (empty($attribute_value)){
            $this->errors[$attribute_name] = $attribute_name . ' não pode ficar em branco.';
        }
    }

    protected function isNumber($attribute_name, $attribute_value){
        if (!empty($attribute_value)
            AND !is_numeric($attribute_value)
        ){
            $this->errors[$attribute_name] = $attribute_name . ' deve ser um valor válido.';
        }
    }

    protected function uploadFile($attribute_name, $attribute_value, $extensions){
        if(!empty($attribute_value)) {
            $path_upload = "resources/var/upload/";
            if (!file_exists($path_upload . $attribute_value)) {
                $file_extension = pathinfo($attribute_value, PATHINFO_EXTENSION);
                //$file_extension = pathinfo($_FILES[$attribute_name]['name'],PATHINFO_EXTENSION);
                if (!in_array($file_extension, $extensions)) {
                    $this->errors[$attribute_name] = $attribute_name . ' não é um formato de arquivo válido.';
                } else {
                    $path_temp = $_FILES[$attribute_name]['tmp_name'];
                    $filename = uniqid() . ".$file_extension";
                    if (move_uploaded_file($path_temp, $path_upload . $filename)) {
                        $this->setImagem($filename);
                    } else {
                        $this->errors[$attribute_name] = $attribute_name . ': Não foi possível enviar o arquivo, tente novamente';
                    }
                }
            }
        }
    }


}