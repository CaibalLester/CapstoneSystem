<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\RTCController;
use App\Controllers\HomepageController;
use App\Models\AdminModel;
use App\Models\ClientModel;
use App\Models\UserModel;
use App\Models\ApplicantModel;
use App\Models\Form1Model;
use App\Models\Form2Model;
use App\Models\Form3Model;
use App\Models\AgentModel;
use App\Models\ConfirmModel;
use App\Models\ScheduleModel;

class AdminController extends BaseController
{
    private $client;
    private $confirm;
    private $db;
    private $homecon;
    private $rtc;
    private $agent;
    private $user;
    private $applicant;
    private $admin;
    private $form1;
    private $form2;
    private $form3;
    protected $scheduleModel;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->confirm = new ConfirmModel();
        $this->rtc = new RTCController();
        $this->user = new UserModel();
        $this->applicant = new ApplicantModel();
        $this->agent = new AgentModel();
        $this->admin = new AdminModel();
        $this->form1 = new Form1Model();
        $this->form2 = new Form2Model();
        $this->form3 = new Form3Model();
        $this->homecon = new HomepageController();
        $this->client = new ClientModel();
        $this->scheduleModel = new ScheduleModel();
    }

    public function AdDash()
    {
        $totalAgents = count($this->agent->findAll());
        $totalApplicants = count($this->applicant->findAll());
        $pendingApplicants = $this->applicant->where('status', 'pending')->countAllResults();
        $data = array_merge($this->getData(), $this->getDataAd(), $this->topagent(), $this->getagent(), $this->rtc->RTC());
        $data['totalAgents'] = $totalAgents;
        $data['totalApplicants'] = $totalApplicants;
        $data['pendingApplicants'] = $pendingApplicants;
        return view('Admin/AdDash', $data);
    }
    //Top 3 Agents
    private function topagent()
    {
        // Load the database service
        $builder = \Config\Database::connect()->table('agent a');
        $builder->select('a.username, a.FA, a.agentprofile, (SELECT COUNT(*) FROM agent b WHERE b.FA = a.agent_id) AS total_fA');
        $builder->orderBy('total_fa', 'DESC');
        $builder->limit(3);
        // Get the result as an array
        $result = $builder->get()->getResultArray();
        // Pass the data to your view or perform any other actions
        $data['top'] = $result;
        // Return the data
        return $data;
    }

    private function getagent()
    {
        $data['agent'] = $this->agent->findAll();
        return $data;
    }

    public function ManageAgent()
    {
        // $agentModel = new AgentModel();
        $data = $this->usermerge();
        $data['agent'] = $this->agent->paginate(10, 'group1'); // Change 10 to the number of items per page
        $data['pager'] = $this->agent->pager;
        return view('Admin/ManageAgent', $data);
    }

    public function Forms()
    {
        $data = array_merge($this->getData(), $this->getDataAd());
        return view('Admin/Forms', $data);
    }

    public function formsTable($form)
    {
        $data = array_merge($this->getData(), $this->getDataAd());
        $data['user'] = $this->user->where(['role !=' => 'admin'])->Where(['role !=' => 'client'])->findAll();
        $data['link'] = $form;
        $search = $this->request->getPost('searchusers');

        if (!empty($search)) {
            $data['user'] = $this->user->like('username', $search)->where(['role !=' => 'admin'])->findAll();
        }
        return view('Admin/formsTable', $data);
        // var_dump( $search);
    }

    public function ManageApplicant()
    {
        $appmodel = new ApplicantModel();
        $data = $this->usermerge();
        // Add a where condition to retrieve only records with status = 'confirmed'
        $applicants = $appmodel->where('status', 'pending')->paginate(10, 'group1');

        $data['applicant'] = $applicants;
        $data['pager'] = $appmodel->pager;

        return view('Admin/ManageApplicant', $data);
    }

    private function usermerge()
    {
        $session = session();
        $userId = $session->get('id');
        $data = $this->getDataAd();
        $userModel = new UserModel();
        $data['user'] = $userModel->find($userId);
        return $data;
    }

    public function userSearch()
    {
        $appmodel = new ApplicantModel();
        $data = $this->usermerge();
        $filterUser = $this->request->getPost('filterUser');
        $applicants = $this->applicant->like('username', $filterUser)->where('status', 'pending')->paginate(10, 'group1');
        $data['applicant'] = $applicants;
        $data['pager'] = $this->applicant->pager;

        return view('Admin/ManageApplicant', $data);
    }

    // Controller method for searching agents by full name
    public function agentSearch()
    {
        $agentModel = new AgentModel();
        $data = $this->usermerge();
        // Get the search input from the form
        $filterUser = $this->request->getPost('filterAgent');
        // Add a where condition to filter records based on the search input
        $agents = $agentModel->like('username', $filterUser)->paginate(10, 'group1');
        $data['pager'] = $agentModel->pager; // Use $agentModel->pager
        $data['agent'] = $agents;
        return view('Admin/ManageAgent', $data);
    }

    public function getDataAd()
    {
        $session = session();
        $userId = $session->get('id');
        $data['admin'] = $this->admin->where('admin_id', $userId)
            ->orderBy('id', 'desc')
            ->first();

        return $data;
    }

    public function AdProfile()
    {
        $data = array_merge($this->getData(), $this->getDataAd());
        return view('Admin/AdProfile', $data);
    }

    public function AdSetting()
    {
        $data = array_merge($this->getData(), $this->getDataAd());
        return view('Admin/AdSetting', $data);
    }

    public function AdHelp()
    {
        $data = array_merge($this->getData(), $this->getDataAd());
        return view('Admin/AdHelp', $data);
    }

    public function promotion()
    {
        $data = array_merge($this->getData(), $this->getDataAd());
        $search = $this->request->getPost('searchusers');
        if (!empty($search)) {
            $data['applicant'] = $this->applicant->like('username', $search)->findAll();
        } else {
            $data['applicant'] = $this->applicant->where('status', 'pending')->paginate(10, 'group1');
            $data['pager'] = $this->applicant->pager;
        }
        return view('Admin/promotion', $data);
    }

    public function getData()
    {
        $session = session();
        $userId = $session->get('id');
        $data['user'] = $this->user->find($userId);
        return $data;
    }

    public function viewAppForm($token)
    {
        $data = $this->form1->where('app_life_token', $token)->first();

        return view('Admin/Forms/details', ['lifechangerform' => $data]);
    }
    public function viewAppForm2($token)
    {
        $data = $this->form2->where('aial_token', $token)->first();
        return view('Admin/Forms/details2', ['aial' => $data]);
    }
    public function viewAppForm3($token)
    {
        $data = $this->form3->where('app_gli_token', $token)->first();
        return view('Admin/Forms/details3', ['gli' => $data]);
    }
    public function viewAppForm4($token)
    {
        $data = $this->form1->where('app_life_token', $token)->first();
        return view('Admin/Forms/details4', ['lifechangerform' => $data]);
    }
    public function viewAppForm5($token)
    {
        $data = $this->form1->where('app_life_token', $token)->first();
        return view('Admin/Forms/details5', ['lifechangerform' => $data]);
    }

    public function random($length = 6)
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = '';

        for ($i = 0; $i < $length; $i++) {
            $code .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $code;
    }

    public function newAgent($app_token)
    {
        $data['applicant'] = $this->applicant->where('app_token', $app_token)->first();
        $username = $data['applicant']['username'];
        $agentCode = $this->random();

        $ref = $data['applicant']['refcode'];
        $agent = $this->agent->where('AgentCode', $ref)->first();
        $FA = $agent['agent_id'];

        $appdata = [
            'agent_id' => $data['applicant']['applicant_id'],
            'username' => $data['applicant']['username'],
            'email' => $data['applicant']['email'],
            'firstname' => $data['applicant']['firstname'],
            'lastname' => $data['applicant']['lastname'],
            'middlename' => $data['applicant']['middlename'],
            'province' => $data['applicant']['province'],
            'region' => $data['applicant']['region'],
            'birthday' => $data['applicant']['birthday'],
            'barangay' => $data['applicant']['barangay'],
            'street' => $data['applicant']['street'],
            'number' => $data['applicant']['number'],
            'profile' => $data['applicant']['profile'],
            'agent_token' => $data['applicant']['app_token'],
            'AgentCode' => $agentCode,
            'FA' => $FA,
        ];
        // return redirect()->back();
        // var_dump($appdata);

        $this->agent->save($appdata);

        $this->applicant->set('status', 'confirmed')->where('app_token', $app_token)->update();
        $this->user->set('role', 'agent')->where('token', $app_token)->update();

        $verificationLink = site_url("login");
        $emailSubject = 'Promotion';
        $emailMessage = "Congratulations on your promotion! We're thrilled to see your hard work and dedication pay off. 
        Please click the link below to login and access your new responsibilities: $verificationLink";
        $this->homecon->sendVerificationEmail($data['applicant']['email'], $emailSubject, $emailMessage);
        return redirect()->to('promotion')->with('success', "$username was Promoted To Agent");
    }

    public function svad()
    {
        $session = session();
        $userId = $session->get('id');

        // Initialize $data array
        $data = [];

        // Get the old image file name from the database
        $oldAdmin = $this->admin->select('adminProfile')->where('admin_id', $userId)->first();

        // Check if a file is uploaded
        if ($imageFile = $this->request->getFile('profile')) {
            // Check if the file is valid
            if ($imageFile->isValid()) {
                // Generate a unique name for the uploaded image
                $imageName = $imageFile->getRandomName();

                // Set the path to the upload directory
                $uploadPath = FCPATH . 'uploads/';

                // Move the uploaded image to the upload directory
                if ($imageFile->move($uploadPath, $imageName)) {
                    // Image upload successful, store the image filename in the database
                    $img['adminProfile'] = $imageName;

                    // Delete the old image file if it exists
                    if (!empty($oldAdmin['adminProfile'])) {
                        $oldFilePath = $uploadPath . $oldAdmin['adminProfile'];
                        if (file_exists($oldFilePath)) {
                            unlink($oldFilePath);
                        }
                    }
                } else {
                    $error = $imageFile->getError();
                }
            }
        }

        // Add other form data to the data array
        $data = [
            'lastname' => $this->request->getVar('lastname'),
            'firstname' => $this->request->getVar('firstname'),
            'middlename' => $this->request->getVar('middlename'),
            'username' => $this->request->getVar('username'),
            'number' => $this->request->getVar('number'),
            'email' => $this->request->getVar('email'),
            'birthday' => $this->request->getVar('birthday'),
            'region' => $this->request->getVar('region_text'),
            'province' => $this->request->getVar('province_text'),
            'city' => $this->request->getVar('city_text'),
            'image' => $img,
            'barangay' => $this->request->getVar('barangay_text'),
            'street' => $this->request->getVar('street'),
        ];

        // Check if $data array is not empty before updating the database
        if (!empty($data)) {
            // Update the admin data
            $this->admin->set($data)->where('admin_id', $userId)->update();
        }

        return redirect()->to('/AdSetting');
    }

    public function confirm($token)
    {
        $data['applicant'] = $this->confirm->where('token', $token)->first();
        // $form['applicant'] = $this->applicant->where('app_token', $token)->first();
        $verificationToken = bin2hex(random_bytes(25));

        if ($data['applicant']['role'] != 'client') {
            $appdata = [
                'applicant_id' => $data['applicant']['applicant_id'],
                'username' => $data['applicant']['username'],
                'number' => $data['applicant']['number'],
                'firstname' => $data['applicant']['firstname'],
                'lastname' => $data['applicant']['lastname'],
                'middlename' => $data['applicant']['middlename'],
                'email' => $data['applicant']['email'],
                'refcode' => $data['applicant']['refcode'],
                'app_token' => $data['applicant']['token'],
            ];

            $this->applicant->save($appdata);

            $formdata1 = [
                'user_id' => $data['applicant']['applicant_id'],
                'app_life_token' => $token,
                'username' => $data['applicant']['username'],
            ];

            $this->form1->save($formdata1);

            $formdata2 = [
                'user_id' => $data['applicant']['applicant_id'],
                'aial_token' => $token,
            ];

            $this->form2->save($formdata2);
            $this->confirm->delete($data['applicant']['id']);
            $con = ['confirm' => 'true', 'verification_token'=> $verificationToken];
            $this->user->set($con)->where('token', $token)->update();
        } else {
            $lastApplicationNo = $this->client->selectMax('applicationNo')->get()->getRowArray()['applicationNo'];
            $newApplicationNo = $lastApplicationNo + 1;
            $clientData = [
                'client_id' => $data['applicant']['applicant_id'],
                'username' => $data['applicant']['username'],
                'number' => $data['applicant']['number'],
                'firstname' => $data['applicant']['firstname'],
                'lastname' => $data['applicant']['lastname'],
                'middlename' => $data['applicant']['middlename'],
                'email' => $data['applicant']['email'],
                'refcode' => $data['applicant']['refcode'],
                'client_token' => $data['applicant']['token'],
                // 'plan' => $data['applicant']['plan'],
                'applicationNo' => $newApplicationNo,
            ];
            $this->client->save($clientData);
            $this->confirm->delete($data['applicant']['id']);
            $con = ['confirm' => 'true', 'verification_token'=> $verificationToken];
            $this->user->set($con)->where('token', $token)->update();
        }

        // $verificationLink = site_url("login");
        $verificationLink = site_url("verify-email/{$verificationToken}");
        $emailSubject = 'Registration Confirmation';
        $emailMessage = "Your account has been confirmed. Please click the link verify your account: {$verificationLink}";
        $this->homecon->sendVerificationEmail($data['applicant']['email'], $emailSubject, $emailMessage);

        return redirect()->to('/confirmation')->with('success', 'Acount Confirmed!');
    }

    public function deny($token)
    {
        $data['applicant'] = $this->confirm->where('token', $token)->first();
        $id = $data['applicant']['id'];

        $this->confirm->delete($id);
        // $verificationLink = site_url("verify-email/{$verificationToken}");
        $emailSubject = 'Register Deny';
        $emailMessage = "Your Account was Deny Where sorry to inform you";
        $this->homecon->sendVerificationEmail($data['applicant']['email'], $emailSubject, $emailMessage);

        // var_dump($id);
        return redirect()->to('/confirmation')->with('warning', 'Acount Denied');
    }

    public function confirmation()
    {
        $data = array_merge($this->getData(), $this->getDataAd());
        $con = $this->confirm->paginate(10, 'group1');
        $data['applicant'] = $con;
        $data['pager'] = $this->confirm->pager;
        $search = $this->request->getPost('searchusers');

        if (!empty($search)) {
            $data['applicant'] = $this->confirm->like('username', $search)->paginate(10, 'group1');
        }

        // var_dump($data);
        return view('Admin/confirmation', $data);
    }

    public function sched()
    {
        // Load the model
        $data = array_merge($this->getData(), $this->getDataAd());
        $scheduleModel = new ScheduleModel();

        // Get all schedules from the database
        $data['schedules'] = $scheduleModel->findAll();

        // Pass data to the view
        return view('Admin/Schedule', $data);
    }

    public function schedsave()
    {
        $input = $this->request->getPost();
        $validationRules = [
            'title' => 'required',
            'description' => 'required',
            'start_datetime' => 'required|valid_date',
            'end_datetime' => 'required|valid_date'
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'title' => $input['title'],
            'description' => $input['description'],
            'start_datetime' => $input['start_datetime'],
            'end_datetime' => $input['end_datetime'],
        ];

        $this->scheduleModel->insert($data);
        return redirect()->back()->with('success', 'Schedule submitted successfully.');
    }


}
