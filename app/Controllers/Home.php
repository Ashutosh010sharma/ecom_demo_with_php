<?php

namespace App\Controllers;
use App\Models\User;
use App\Models\UserDetails;


class Home extends BaseController
{
    protected $helpers = ['form','url'];
    public function index(): string
    {
        return view('welcome_message');
    }
    public function register()
    {
        $validation = \Config\Services::validation();
       if ($this->request->is('get')){
        return view('register');
       }
       else if ($this->request->is('post')){
        if ($this-> validate([
            "username"=>"required",
            "email"=>"required|valid_email",
            "password"=>"required|min_length[5]|max_length[20]",
            "cpassword"=>"matches[password]"
        ])){
            // submit the form
            $username=$this->request->getVar("username");
            $email=$this->request->getVar("email");
            $password=$this->request->getVar("password");

            // saving he data in database using model
            $data=[
                "user_name"=>$username,
                "user_email"=>$email,
                "user_password"=>$password
            ];
            // var_dump($data);
            $model=new User();
            $model-> insert($data);

            $session=session();
            $session->set('success_message','User Register Successfully');
            $session->markAsFlashdata('success_message');
            return view('register');

            // echo 'user register succesfully';
        }
        else{
            return redirect()->back()->withInput();
        }
       }
    }
    public function login() 
    {

        if ($this->request->is('get')){
            return view('login');
           }
           else if ($this->request->is('post')){
            if ($this-> validate([
                
                "email"=>"required|valid_email",
                "password"=>"required",
                
            ])){
               $model=new User();
               $record=$model->where("user_email",$this->request->getVar("email"))
               ->where("user_password",$this->request->getVar("password"))
               ->first();
               $session=session();
               if(! is_null($record)){
                //database id found
                $sess_data=[
                    "user_id"=>$record['user_id'],
                    "username"=>$record['user_name'],
                    'email'=>$record['user_email'],
                    "user_type"=>$record['user_type'],
                    "loginned"=>"loginned"
                ];
                $session->set($sess_data);
                if ($record['user_type']=="user"){
                    $url="user_dashboard";

                }
                else if($record['user_type']=="admin"){
                    $url="admin/admin_dashboard";
                }
                return redirect()->to(base_url($url));
               }
               else{
                
                $session->set('failed_message','Record Does not matches try again');
                $session->markAsFlashdata('failed_message');
                return redirect()->back()->withInput();
               }

            }
            else{
                return redirect()->back()->withInput();
            }
        
    }
   }
   public function logout(){
    $session=session();
    session_unset();
    session_destroy();
    return redirect()->to(base_url());
  }
  public function profile(){
    if ($this->request->is('get')){
        return view('profile');
  }
  else if ($this->request->is('post')){
    $country=$this->request->getVar("country");
    $state=$this->request->getVar("state");
    $district=$this->request->getVar("district");
    $pincode=$this->request->getVar("pincode");
    $phone_no=$this->request->getVar("phone_no");
    $local_address=$this->request->getVar("local_address");
    $permanent_address=$this->request->getVar("permanent_address");

    $model=new UserDetails();
    $session=session();
    $user_id=$session->user_id;
   // $user_id=$model->where("user_id",$user_id)->first();

    $existingUser = $model->where("user_id", $user_id)->first();
    $data=[
          
        'country'=>$country,
        'state'=>$state,
        'district'=>$district,
        'pincode'=>$pincode,
        'phone_no'=>$phone_no,
        'local_address'=>$local_address,
        'permanent_address'=>$permanent_address

    ];
    if (!empty($existingUser)) {
        // Update the existing user record
        $model->update($existingUser['id'], $data);
    }
    else{
        //insert
        $model->insert($data);
    }
    return redirect()->to(base_url('profile'));
  }
  }
}