<?php

namespace App\Controllers;

use App\Models\PatientsModel;
use CodeIgniter\Controller;

class Patients extends Controller
{

    public function index()
    {
        $patientsModel = new PatientsModel();
        $data['patients'] = $patientsModel->orderBy('id', 'DESC')->findAll();
        return view('patients/patient_view', $data);
    }

    public function create()
    {
        return view('patients/add_patient');
    }

    public function store()
    {
        $patientsModel = new PatientsModel();
        $data = [
            'name' => $this->request->getVar('name'),
            'gender' => $this->request->getVar('gender'),
            'phone' => $this->request->getVar('phone'),
            'date_visited' => date("Y/m/d"),
        ];
        $patientsModel->insert($data);
        return $this->response->redirect(site_url('/patient-list'));
    }

    public function singleUser($id = null)
    {
        $patientsModel = new PatientsModel();
        $data['patient_obj'] = $patientsModel->where('id', $id)->first();
        return view('patients/edit_patient', $data);
    }

    public function update()
    {
        $patientsModel = new PatientsModel();
        $id = $this->request->getVar('id');
        $data = [
            'name' => $this->request->getVar('name'),
            'gender' => $this->request->getVar('gender'),
            'phone' => $this->request->getVar('phone'),
//            'date_visited' => $this->request->getVar('date_visited'),
        ];
        $patientsModel->update($id, $data);
        return $this->response->redirect(site_url('/patient-list'));
    }


    public function delete($id = null)
    {
        $patientsModel = new PatientsModel();
        $data['user'] = $patientsModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/patient-list'));
    }
}
