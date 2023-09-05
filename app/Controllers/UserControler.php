<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserControler extends BaseController
{
    public function index()
    {
        $model = new UserModel;
        $data['user_detail'] = $model->orderBy('id_user','ASC')->findAll();
        return view('list',$data);
    }

    public function store(){
        helper(['form','url']);
        $model = new UserModel;
        $data = [
            'fname_user' => $this->request->getVar('txtFirstName'),
            'lname_user' => $this->request->getVar('txtLastName'),
            'email_user' => $this->request->getVar('txtEmail'),
        ];
      
        $save = $model->insert_data($data);
        if($save != false){
            echo json_encode(array('status' => true,'data' => $data));
        }
        else{
            echo json_encode(array('status' => false,'data' => $data));
        }
    }
    public function edit($id){
        helper(['form','url']);
        $model = new UserModel;
    }
}
