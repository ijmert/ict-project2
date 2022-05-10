<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
namespace App\Models;


use core\Model;
use PDO;
use PDOException;


class SensorModel extends \Eloquent{
    public function __construct() {
        ;
    }
    public function getSensorData($id){
        try{
            $db = $this->db->pdo;
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $sqlQuery = "SELECT * FROM sensor WHERE id = '$id'";
            $stmt = $db->prepare($sqlQuery);
            $stmt->execute();
            
             $affectedRows = $stmt->rowCount();
             if ($affectedRows > 0 ){
                $dataTable = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($dataTable as $dataRow){
                    $sensorData['id'] = $dataRow['id'];
                    $sensorData['topic'] = $dataRow['topic'];
                    $sensorData['naam'] = $dataRow['name'];
                    $sensorData['maximum'] = $dataRow['max'];
                    $sensorData['minimum'] = $dataRow['min'];
                    $sensorData['eenheid'] = $dataRow['unit'];
                    $sensorData['type'] = $dataRow['type'];
                }
                return $sensorData;
                }
        } catch (PDOException $error){
            $this->errorMessage = $error->getMessage();
            return false;
        }
    }
    
    public function getSensorsFromAcount($userId) {
        try{
            $db = $this->db->pdo;
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $sqlQuery = "SELECT * FROM sensor WHERE user_id = '$userId'";
            $stmt = $db->prepare($sqlQuery);
            $stmt->execute();
            
             $affectedRows = $stmt->rowCount();
             if ($affectedRows > 0 ){
                $dataTable = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($dataTable as $dataRow){
                    $sensorData['id'] = $dataRow['id'];
                    $sensorData['topic'] = $dataRow['topic'];
                    $sensorData['naam'] = $dataRow['name'];
                    $sensorData['maximum'] = $dataRow['max'];
                    $sensorData['minimum'] = $dataRow['min'];
                    $sensorData['eenheid'] = $dataRow['unit'];
                    $sensorData['type'] = $dataRow['type'];
                    $allSensorData[$sensorData['id']] = $sensorData;
                }
                return $allSensorData;
                }
                throw new PDOException('er werden geen gegevens gevonden in de database');
        } catch (PDOException $error){
            $this->errorMessage = $error->getMessage();
            return false;
        }
    }
    public function removeSensor ($id){
         $db = $this->db->pdo;
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
          $sqlQuery =  "DELETE FROM sensor WHERE id = '$id'";
          $stmt = $db->prepare($sqlQuery);
          $stmt->execute();
        } catch (PDOException $error) {
             $this->errorMessage = $error->getMessage();
            return false;
        }
    }
}

