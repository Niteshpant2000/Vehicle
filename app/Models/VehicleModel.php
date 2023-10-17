<?php

namespace App\Models;

use App\Libraries\DatabaseConnector;

class VehicleModel{
    private $collection;

    function __construct() {
        $connection = new DatabaseConnector();
        $database = $connection->getDatabase();
        $this->collection = $database->vehicle;
    }

    function getVehicles($limit = 10) {
        try {
            $cursor = $this->collection->find([], ['limit' => $limit]);
            $Vehicles = $cursor->toArray();

            return $Vehicles;
        } catch(\MongoDB\Exception\RuntimeException $ex) {
            show_error('Error while fetching: ' . $ex->getMessage(), 500);
        }
    }

    function getVehicle($id) {
        try {
            $Vehicle = $this->collection->findOne(['_id' => new \MongoDB\BSON\ObjectId($id)]);

            return $Vehicle;
        } catch(\MongoDB\Exception\RuntimeException $ex) {
            show_error('Error while fetching: ' . $id . $ex->getMessage(), 500);
        }
    }

    function insertVehicle($company, $model, $number) {
        try {
            $insertOneResult = $this->collection->insertOne([
                'company' => $company,
                'model' => $model,
                'number' => $number,
                
            ]);

            if($insertOneResult->getInsertedCount() == 1) {
                return true;
            }

            return false;
        } catch(\MongoDB\Exception\RuntimeException $ex) {
            show_error('Error while creating: ' . $ex->getMessage(), 500);
        }
    }

    function updateVehicle($id, $company, $model, $number) {
        try {
            $result = $this->collection->updateOne(
                ['_id' => new \MongoDB\BSON\ObjectId($id)],
                ['$set' => [
                    'company' => $company,
                    'model' => $model,
                    'number' => $number,
                ]]
            );

            if($result->getModifiedCount()) {
                return true;
            }

            return false;
        } catch(\MongoDB\Exception\RuntimeException $ex) {
            show_error('Error while updating: ' . $id . $ex->getMessage(), 500);
        }
    }

    function deleteVehicle($id) {
        try {
            $result = $this->collection->deleteOne(['_id' => new \MongoDB\BSON\ObjectId($id)]);

            if($result->getDeletedCount() == 1) {
                return true;
            }

            return false;
        } catch(\MongoDB\Exception\RuntimeException $ex) {
            show_error('Deleted vehicle with id: ' . $id . $ex->getMessage(), 500);
        }
    }
}