<?php

namespace application\models;

use application\core\Model;

class ModelMain extends Model
{



    public function getAllMembers()
    {
        $members = $this->conn->query("SELECT * FROM person ORDER BY id");
        return $members;
    }

    public function saveData($data)
    {
        $executeQuery = $this->conn->query("
            INSERT INTO person (firstname, lastname, birthdate, rep_subject, country_id, phone, email)
            VALUES (?,?,?,?,?,?,?)",
            [
                $data['firstname'],
                $data['lastname'],
                $data['birthdate'],
                $data['rep_subj'],
                $data['country_id'],
                $data['phone'],
                $data['email']
            ]
        );

        if ($executeQuery) {
            return $this->conn->lastInsertId();
        } else {
            return false;
        }
    }


    public function checkEmail($email)
    {
        $result = $this->conn->query("SELECT COUNT(id) AS total FROM person WHERE email=?", [$email])[0];
        return $result['total'] > 0 ? true : false;
    }

    public function updatePhoto($filename, $id){
        $executeQuery = $this->conn->query("
            UPDATE person SET
            photo = ?
            WHERE 
            id = ?",
            [
                $filename,
                $id
            ]
        );

        if ($executeQuery) {
            return $this->conn->lastInsertId();
        } else {
            return false;
        }
    }

    public function updateData($data, $id, $email){
        if (empty($data['company'])){
            $data['company'] = NULL;
        }
        if (empty($data['position'])){
            $data['position'] = NULL;
        }
        if (empty($data['about'])){
            $data['about'] = NULL;
        }


        $executeQuery = $this->conn->query("
            UPDATE person SET
            company = ?,
            position = ?, 
            about = ?
            WHERE 
            id = ? AND
            email = ?",
            [
                $data['company'],
                $data['position'],
                $data['about'],
                $id,
                $email
            ]
        );

        if ($executeQuery) {
            return $this->conn->lastInsertId();
        } else {
            return false;
        }
    }


}