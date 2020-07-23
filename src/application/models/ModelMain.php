<?php

namespace application\models;

use application\core\Model;
use PDOStatement;

class ModelMain extends Model
{

    public function uploadImage($image)
    {
        $extension = pathinfo($image['name'], PATHINFO_EXTENSION);
        if (($extension == "jpg") || ($extension == "jpeg") || ($extension == "gif") || ($extension == "png")){
            $filename = uniqid() . "." . $extension;
        }
        else {
            $filename = "";
            return $filename;
        }


        $res = move_uploaded_file($image['tmp_name'], "public/images/" . $filename);
        if ($res) {
            return $filename;
        }
        else {
            return "";
        }
    }

    public function getAllMembers(){
        $members = $this->conn->query("SELECT * FROM person ORDER BY id");
        return $members;
    }

    public function checkData($data){

    }

    public function checkEmail($email){
        $result = $this->conn->query("SELECT COUNT(id) AS total FROM person WHERE email=?", [$email])[0];
        return $result['total'] > 0 ? true : false;
    }


}