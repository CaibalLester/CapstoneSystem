<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use \App\Models\UserModel;
use App\Models\ApplicantModel;
use App\Models\Form1Model;
use App\Models\AgentModel;

class ProfileController extends BaseController
{
    public function agentprofile($token)
    {
        $agentModel = new AgentModel();
        $data = $this->getDataAd();

        // Initialize the encryption service and pass it to the view
        // $encryption = \Config\Services::encrypter();
        // $dectoken = $encryption->decrypt($token);
        $data['agent'] = $agentModel->where('agent_token', $token)->first();
        $agentid = $data['agent']['agent_id'];
        $data['FA'] = $agentModel->where('FA', $agentid)->paginate(10); // Change 10 to the number of items per page

        $data['pager'] = $agentModel->pager;
        return view("Admin/agentprofile", $data);

    }


    public function subagentprofile($token)
    {
        $agentModel = new AgentModel();
        $data = $this->getDataAd();
        $data['agent'] = $agentModel->where('agent_token', $token)->first();

        $agentid = $data['agent']['agent_id'];
        $data['FA'] = $agentModel->where('FA', $agentid)->paginate(10); // Change 10 to the number of items per page

        $data['pager'] = $agentModel->pager;

        return view("Agent/subagentprofile", $data);
    }

    public function applicantprofile($token)
    {
        $appmodel = new ApplicantModel();
        $data = $this->getDataAd();
        $data['applicant'] = $appmodel->where('app_token', $token)->first();
        return view("Admin/applicantprofile", $data);
    }



    public function ManageAgent()
    {
        $agentModel = new AgentModel();
        // Use the model to fetch all records
        $data['agent'] = $agentModel->findAll();
        return view('Admin/ManageAgent', $data);
    }

    private function getDataAd()
    {
        $session = session();
        // Get the user ID from the session
        $userId = $session->get('id');
        // Load the User model
        $adminModel = new AdminModel();
        // Find the user by ID
        $data['admin'] = $adminModel->where('admin_id', $userId)
            ->orderBy('id', 'desc')
            ->first();
        return $data;
    }
    // public function try()
    // {
    //     // Encrypt a string
    //     $encryption = \Config\Services::encrypter();
    //     $encryptedString = $encryption->encrypt('Hello, world!');

    //     echo "Encrypted String: $encryptedString<br>";

    //     // Decrypt the string
    //     $decryptedString = $encryption->decrypt($encryptedString);
    //     echo "Decrypted String: $decryptedString";
    // }
}
