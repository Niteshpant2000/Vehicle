<?php

namespace App\Controllers;

helper('inflector');

use App\Models\VehicleModel;

class Vehicle extends BaseController
{
    public function index()
    {
        $model = model(VehicleModel::class);

        $data = [
            'vehicle' => $model->getVehicles(),
        ];

        echo view('templates/header', $data);
        echo view('vehicle/list', $data);
        echo view('templates/footer', $data);
    }

    public function details($segment = null)
    {
        $model = model(VehicleModel::class);

        $data['vehicleobj'] = $model->getVehicle($segment);

        if (empty($data['vehicleobj'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find book with ID: ' . $segment);
        }
    
        $data['company'] = $data['vehicleobj']['company'];
    
    
        echo view('templates/header', $data);
        echo view('vehicle/details', $data);
        echo view('templates/footer', $data);
    }

    public function create()
    {
        $model = model(VehicleModel::class);

        if ($this->request->getMethod() === 'post' && $this->validate([
            'company' => 'required|min_length[1]|max_length[255]',
            'model' => 'required|min_length[1]|max_length[255]',
            'number' => 'required|is_natural_no_zero',
        ])) {
            $model->insertVehicle(
                $this->request->getPost('company'),
                $this->request->getPost('model'),
                $this->request->getPost('number'),
            );

            return redirect()->to('vehicle');
        } else {
            echo view('templates/header');
            echo view('vehicle/create', ['heading' => 'Add a new book']);
            echo view('templates/footer');
        }
    }

    public function edit($segment = null)
    {
        $model = model(VehicleModel::class);

        $data['vehicleobj'] = $model->getVehicle($segment);

        if (empty($data['vehicleobj'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find book with ID: ' . $segment);
        }

        $data['company'] = $data['vehicleobj']['company'];

        if ($this->request->getMethod() === 'post' && $this->validate([
            'company' => 'required|min_length[1]|max_length[255]',
            'model' => 'required|min_length[1]|max_length[255]',
            'number' => 'required|is_natural',
        ])) {
            $model->updateVehicle(
                $data['vehicleobj']['_id'],
                $this->request->getPost('company'),
                $this->request->getPost('model'),
                $this->request->getPost('number'),
            );

            return redirect()->to('books');
        } else {
            echo view('templates/header', $data);
            echo view('vehicle/edit', $data);
            echo view('templates/footer', $data);
        }
    }

    public function delete($segment = null) {
        if (!empty($segment) && $this->request->getMethod() == 'get') {
            $model = model(VehicleModel::class);
            $model->deleteVehicle($segment);
        }

        return redirect()->to('vehicle');
    }
}