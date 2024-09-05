<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class User extends BaseController
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        // $this->isLoggedIn();
    }
    
    public function index()
    {
        $this->global['pageTitle'] = '888Juventus : Dashboard';
        $searchText = '';
        $data['managerCount'] = $this->user_model->managerCount($searchText);
        $data['agentCount'] = $this->user_model->agentCount($searchText);
        $data['userCount'] = $this->user_model->userCount($searchText);
        
        $this->loadViews("general/dashboard", $this->global, $data , NULL);
    }
    
   
    function users()
    {
        if(!$this->isAdmin())
        {
            $this->loadThis();
        }
        else
        {        
            $searchText = '';
            if(!empty($this->input->post('searchText'))) {
                $searchText = $this->security->xss_clean($this->input->post('searchText'));
            }
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->user_model->userCount($searchText);

			$returns = $this->paginationCompress ( "users/", $count, 10 );
            
            $data['users'] = $this->user_model->users($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = '888Juventus : Users';
            
            $this->loadViews("users/users", $this->global, $data, NULL);
        }
    }

    public function bethistory()
    {
        $this->global['pageTitle'] = '888Juventus : Bet History';
        $data['bets'] = $this->user_model->getAllBets();
        
        $this->loadViews("users/betHistory", $this->global, $data , NULL);
    }

    function addUser()
    {
        if(!$this->isAdmin())
        {
            $this->loadThis();
        }
        else
        {
            $this->global['pageTitle'] = '888Juventus : Add New User';
            $data['agents'] = $this->user_model->allAgents();
            $this->loadViews("users/addUser", $this->global, $data, NULL);
        }
    }

    function addNewUser()
    {
        if(!$this->isAdmin())
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('name','Full Name','trim|required|max_length[128]');
            $this->form_validation->set_rules('username','Username','trim|required|max_length[16]');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[128]');
            $this->form_validation->set_rules('password','Password','required|max_length[20]');
            $this->form_validation->set_rules('cpassword','Confirm Password','trim|required|matches[password]|max_length[20]');
            $this->form_validation->set_rules('phone','Phone Number','required|min_length[10]');
            $this->form_validation->set_rules('agent','Agent','required');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->addUser();
            }
            else
            {
                $name = ucwords(strtolower($this->security->xss_clean($this->input->post('name'))));
                $username = strtolower($this->security->xss_clean($this->input->post('username')));
                $email = strtolower($this->security->xss_clean($this->input->post('email')));
                $password = $this->input->post('password');
                $phone = $this->security->xss_clean($this->input->post('phone'));
                $balance = $this->security->xss_clean($this->input->post('balance'));
                $agent = $this->security->xss_clean($this->input->post('agent'));
                $role = 'user';

                if($this->user_model->usernameExists($username) == 1){
                    $this->session->set_flashdata('error', 'Username already exists');
                    redirect('addUser');
                    exit;
                }
                
                $userInfo = array(
                                'name'=> $name,
                                'username'=> $username,
                                'email'=>$email,
                                'password'=>getHashedPassword($password),
                                'phone'=>$phone,
                                'balance'=>$balance,
                                'role'=>$role,
                                'parent_id'=>$agent,
                            );
                
                $this->load->model('user_model');
                $result = $this->user_model->addNewUser($userInfo);
                
                if($result > 0){
                    $this->session->set_flashdata('success', 'New User created successfully');
                } else {
                    $this->session->set_flashdata('error', 'User creation failed');
                }
                
                redirect('addUser');
            }
        }
    }

    function editUser($userId = NULL)
    {
        if(!$this->isAdmin())
        {
            $this->loadThis();
        }
        else
        {
            if($userId == null)
            {
                redirect('users');
            }
            
            $data['userInfo'] = $this->user_model->getUserInfo($userId, 'user');

            $this->global['pageTitle'] = '888Juventus : Edit User';
            $data['agents'] = $this->user_model->allAgents();
            
            $this->loadViews("users/editUser", $this->global, $data, NULL);
        }
    }
    
   
    function updateUser()
    {
        if(!$this->isAdmin())
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $userId = $this->input->post('userId');
            
            $this->form_validation->set_rules('name','Full Name','trim|required|max_length[128]');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[128]');
            $this->form_validation->set_rules('password','Password','matches[cpassword]|max_length[20]');
            $this->form_validation->set_rules('cpassword','Confirm Password','matches[password]|max_length[20]');
            $this->form_validation->set_rules('phone','Phone Number','required|min_length[10]');
            $this->form_validation->set_rules('agent','Agent','required');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->editUser($userId);
            }
            else
            {
                $name = ucwords(strtolower($this->security->xss_clean($this->input->post('name'))));
                $email = strtolower($this->security->xss_clean($this->input->post('email')));
                $password = $this->input->post('password');
                $balance = $this->security->xss_clean($this->input->post('balance'));
                $phone = $this->security->xss_clean($this->input->post('phone'));
                $agent = $this->security->xss_clean($this->input->post('agent'));
                
                $userInfo = array();
                
                if(empty($password))
                {
                    $userInfo = array('email'=>$email, 'name'=>$name, 'phone'=>$phone, 'balance'=>$balance, 'parent_id'=>$agent);
                }
                else
                {
                    $userInfo = array('email'=>$email, 'password'=>getHashedPassword($password), 'name'=>ucwords($name), 'phone'=>$phone, 'balance'=>$balance, 'parent_id'=>$agent);
                }
                
                $result = $this->user_model->editUser($userInfo, $userId);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'User updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User updation failed');
                }
                
                redirect('users');
            }
        }
    }

    function deleteUser()
    {
        if(!$this->isAdmin())
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $userId = $this->input->post('userId');
            
            $result = $this->user_model->deleteUser($userId);
            
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }

    function managers()
    {
        if(!$this->isAdmin())
        {
            $this->loadThis();
        }
        else
        {        
            $searchText = '';
            if(!empty($this->input->post('searchText'))) {
                $searchText = $this->security->xss_clean($this->input->post('searchText'));
            }
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->user_model->managerCount($searchText);

			$returns = $this->paginationCompress ( "managers/", $count, 10 );
            
            $data['managers'] = $this->user_model->managers($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = '888Juventus : Managers';
            
            $this->loadViews("managers/managers", $this->global, $data, NULL);
        }
    }

    
    function addManager()
    {
        if(!$this->isAdmin())
        {
            $this->loadThis();
        }
        else
        {
            $this->global['pageTitle'] = '888Juventus : Add New Manager';

            $this->loadViews("managers/addManager", $this->global, NULL, NULL);
        }
    }

    function addNewManager()
    {
        if(!$this->isAdmin())
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('name','Full Name','trim|required|max_length[128]');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[128]');
            $this->form_validation->set_rules('password','Password','required|max_length[20]');
            $this->form_validation->set_rules('cpassword','Confirm Password','trim|required|matches[password]|max_length[20]');
            $this->form_validation->set_rules('phone','Phone Number','required|min_length[10]');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->addManager();
            }
            else
            {
                $name = ucwords(strtolower($this->security->xss_clean($this->input->post('name'))));
                $email = strtolower($this->security->xss_clean($this->input->post('email')));
                $password = $this->input->post('password');
                $phone = $this->security->xss_clean($this->input->post('phone'));
                $balance = $this->security->xss_clean($this->input->post('balance'));
                $role = 'manager';
                
                $userInfo = array(
                                'name'=> $name,
                                'email'=>$email,
                                'password'=>getHashedPassword($password),
                                'phone'=>$phone,
                                'balance'=>$balance,
                                'role'=>$role,
                            );
                
                $this->load->model('user_model');
                $result = $this->user_model->addNewManager($userInfo);
                
                if($result > 0){
                    $this->session->set_flashdata('success', 'New Manager created successfully');
                } else {
                    $this->session->set_flashdata('error', 'Manager creation failed');
                }
                
                redirect('addManager');
            }
        }
    }

    function editManager($userId = NULL)
    {
        if(!$this->isAdmin())
        {
            $this->loadThis();
        }
        else
        {
            if($userId == null)
            {
                redirect('managers');
            }
            
            $data['userInfo'] = $this->user_model->getUserInfo($userId, 'manager');

            $this->global['pageTitle'] = '888Juventus : Edit Manager';
            
            $this->loadViews("managers/editManager", $this->global, $data, NULL);
        }
    }
    
   
    function updateManager()
    {
        if(!$this->isAdmin())
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $userId = $this->input->post('userId');
            
            $this->form_validation->set_rules('name','Full Name','trim|required|max_length[128]');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[128]');
            $this->form_validation->set_rules('password','Password','matches[cpassword]|max_length[20]');
            $this->form_validation->set_rules('cpassword','Confirm Password','matches[password]|max_length[20]');
            $this->form_validation->set_rules('phone','Phone Number','required|min_length[10]');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->editManager($userId);
            }
            else
            {
                $name = ucwords(strtolower($this->security->xss_clean($this->input->post('name'))));
                $email = strtolower($this->security->xss_clean($this->input->post('email')));
                $password = $this->input->post('password');
                $balance = $this->security->xss_clean($this->input->post('balance'));
                $phone = $this->security->xss_clean($this->input->post('phone'));
                
                $userInfo = array();
                
                if(empty($password))
                {
                    $userInfo = array('email'=>$email, 'name'=>$name, 'phone'=>$phone, 'balance'=>$balance);
                }
                else
                {
                    $userInfo = array('email'=>$email, 'password'=>getHashedPassword($password), 'name'=>ucwords($name), 'phone'=>$phone, 'balance'=>$balance);
                }
                
                $result = $this->user_model->editUser($userInfo, $userId);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Manager updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Manager updation failed');
                }
                
                redirect('managers');
            }
        }
    }

    function deleteManager()
    {
        if(!$this->isAdmin())
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $userId = $this->input->post('userId');
            
            $result = $this->user_model->deleteUser($userId);
            
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }

    function agents()
    {
        if(!$this->isAdmin())
        {
            $this->loadThis();
        }
        else
        {        
            $searchText = '';
            if(!empty($this->input->post('searchText'))) {
                $searchText = $this->security->xss_clean($this->input->post('searchText'));
            }
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->user_model->managerCount($searchText);

			$returns = $this->paginationCompress ( "agents/", $count, 10 );
            
            $data['agents'] = $this->user_model->agents($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = '888Juventus : Agents';
            
            $this->loadViews("agents/agents", $this->global, $data, NULL);
        }
    }

    
    function addAgent()
    {
        if(!$this->isAdmin())
        {
            $this->loadThis();
        }
        else
        {
            $this->global['pageTitle'] = '888Juventus : Add New Agent';
            $data['managers'] = $this->user_model->allManagers();

            $this->loadViews("agents/addAgent", $this->global, NULL, NULL);
        }
    }

    function addNewAgent()
    {
        if(!$this->isAdmin())
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('name','Full Name','trim|required|max_length[128]');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[128]');
            $this->form_validation->set_rules('password','Password','required|max_length[20]');
            $this->form_validation->set_rules('cpassword','Confirm Password','trim|required|matches[password]|max_length[20]');
            $this->form_validation->set_rules('phone','Phone Number','required|min_length[10]');
            $this->form_validation->set_rules('manager','Manager','required');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->addAgent();
            }
            else
            {
                $name = ucwords(strtolower($this->security->xss_clean($this->input->post('name'))));
                $email = strtolower($this->security->xss_clean($this->input->post('email')));
                $password = $this->input->post('password');
                $phone = $this->security->xss_clean($this->input->post('phone'));
                $balance = $this->security->xss_clean($this->input->post('balance'));
                $manager = $this->security->xss_clean($this->input->post('manager'));
                $role = 'agent';
                
                $userInfo = array(
                                'name'=> $name,
                                'email'=>$email,
                                'password'=>getHashedPassword($password),
                                'phone'=>$phone,
                                'balance'=>$balance,
                                'role'=>$role,
                                'parent_id'=>$manager
                            );
                
                $this->load->model('user_model');
                $result = $this->user_model->addNewAgent($userInfo);
                
                if($result > 0){
                    $this->session->set_flashdata('success', 'New Agent created successfully');
                } else {
                    $this->session->set_flashdata('error', 'Agent creation failed');
                }
                
                redirect('addAgent');
            }
        }
    }

    function editAgent($userId = NULL)
    {
        if(!$this->isAdmin())
        {
            $this->loadThis();
        }
        else
        {
            if($userId == null)
            {
                redirect('agents');
            }
            
            $data['userInfo'] = $this->user_model->getUserInfo($userId, 'agent');
            $data['managers'] = $this->user_model->allManagers();

            $this->global['pageTitle'] = '888Juventus : Edit Agent';
            
            $this->loadViews("agents/editAgent", $this->global, $data, NULL);
        }
    }
    
   
    function updateAgent()
    {
        if(!$this->isAdmin())
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $userId = $this->input->post('userId');
            
            $this->form_validation->set_rules('name','Full Name','trim|required|max_length[128]');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[128]');
            $this->form_validation->set_rules('password','Password','matches[cpassword]|max_length[20]');
            $this->form_validation->set_rules('cpassword','Confirm Password','matches[password]|max_length[20]');
            $this->form_validation->set_rules('phone','Phone Number','required|min_length[10]');
            $this->form_validation->set_rules('manager','Manager','required');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->editAgent($userId);
            }
            else
            {
                $name = ucwords(strtolower($this->security->xss_clean($this->input->post('name'))));
                $email = strtolower($this->security->xss_clean($this->input->post('email')));
                $password = $this->input->post('password');
                $phone = $this->security->xss_clean($this->input->post('phone'));
                $balance = $this->security->xss_clean($this->input->post('balance'));
                $manager = $this->security->xss_clean($this->input->post('manager'));
                
                $userInfo = array();
                
                if(empty($password))
                {
                    $userInfo = array('email'=>$email, 'name'=>$name, 'phone'=>$phone, 'balance'=>$balance, 'parent_id'=>$manager);
                }
                else
                {
                    $userInfo = array('email'=>$email, 'password'=>getHashedPassword($password), 'name'=>ucwords($name), 'phone'=>$phone, 'balance'=>$balance, 'parent_id'=>$manager);
                }
                
                $result = $this->user_model->editUser($userInfo, $userId);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Agent updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Agent updation failed');
                }
                
                redirect('agents');
            }
        }
    }

    function deleteAgent()
    {
        if(!$this->isAdmin())
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $userId = $this->input->post('userId');
            
            $result = $this->user_model->deleteUser($userId);
            
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }

    function addNew()
    {
        if(!$this->isAdmin())
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('user_model');
            $data['roles'] = $this->user_model->getUserRoles();
            
            $this->global['pageTitle'] = '888Juventus : Add New User';

            $this->loadViews("users/addNew", $this->global, $data, NULL);
        }
    }

    
    function checkEmailExists()
    {
        $userId = $this->input->post("userId");
        $email = $this->input->post("email");

        if(empty($userId)){
            $result = $this->user_model->checkEmailExists($email);
        } else {
            $result = $this->user_model->checkEmailExists($email, $userId);
        }

        if(empty($result)){ echo("true"); }
        else { echo("false"); }
    }
    
    function editOld($userId = NULL)
    {
        if(!$this->isAdmin())
        {
            $this->loadThis();
        }
        else
        {
            if($userId == null)
            {
                redirect('userListing');
            }
            
            $data['roles'] = $this->user_model->getUserRoles();
            $data['userInfo'] = $this->user_model->getUserInfo($userId);

            $this->global['pageTitle'] = '888Juventus : Edit User';
            
            $this->loadViews("users/editOld", $this->global, $data, NULL);
        }
    }
    
    function pageNotFound()
    {
        $this->global['pageTitle'] = '888Juventus : 404 - Page Not Found';
        
        $this->loadViews("general/404", $this->global, NULL, NULL);
    }

    function loginHistoy($userId = NULL)
    {
        if(!$this->isAdmin())
        {
            $this->loadThis();
        }
        else
        {
            $userId = ($userId == NULL ? 0 : $userId);

            $searchText = $this->input->post('searchText');
            $fromDate = $this->input->post('fromDate');
            $toDate = $this->input->post('toDate');

            $data["userInfo"] = $this->user_model->getUserInfoById($userId);

            $data['searchText'] = $searchText;
            $data['fromDate'] = $fromDate;
            $data['toDate'] = $toDate;
            
            $this->load->library('pagination');
            
            $count = $this->user_model->loginHistoryCount($userId, $searchText, $fromDate, $toDate);

            $returns = $this->paginationCompress ( "login-history/".$userId."/", $count, 10, 3);

            $data['userRecords'] = $this->user_model->loginHistory($userId, $searchText, $fromDate, $toDate, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = '888Juventus : User Login History';
            
            $this->loadViews("users/loginHistory", $this->global, $data, NULL);
        }        
    }

    function profile($active = "details")
    {
        $data["userInfo"] = $this->user_model->getUserInfoWithRole($this->vendorId);
        $data["active"] = $active;
        
        $this->global['pageTitle'] = $active == "details" ? '888Juventus : My Profile' : '888Juventus : Change Password';
        $this->loadViews("users/profile", $this->global, $data, NULL);
    }

    
    function profileUpdate($active = "details")
    {
        $this->load->library('form_validation');
            
        $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[128]');
        $this->form_validation->set_rules('mobile','Mobile Number','required|min_length[10]');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[128]|callback_emailExists');        
        
        if($this->form_validation->run() == FALSE)
        {
            $this->profile($active);
        }
        else
        {
            $name = ucwords(strtolower($this->security->xss_clean($this->input->post('fname'))));
            $mobile = $this->security->xss_clean($this->input->post('mobile'));
            $email = strtolower($this->security->xss_clean($this->input->post('email')));
            
            $userInfo = array('name'=>$name, 'email'=>$email, 'mobile'=>$mobile, 'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
            
            $result = $this->user_model->editUser($userInfo, $this->vendorId);
            
            if($result == true)
            {
                $this->session->set_userdata('name', $name);
                $this->session->set_flashdata('success', 'Profile updated successfully');
            }
            else
            {
                $this->session->set_flashdata('error', 'Profile updation failed');
            }

            redirect('profile/'.$active);
        }
    }

    function changePassword($active = "changepass")
    {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('oldPassword','Old password','required|max_length[20]');
        $this->form_validation->set_rules('newPassword','New password','required|max_length[20]');
        $this->form_validation->set_rules('cNewPassword','Confirm new password','required|matches[newPassword]|max_length[20]');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->profile($active);
        }
        else
        {
            $oldPassword = $this->input->post('oldPassword');
            $newPassword = $this->input->post('newPassword');
            
            $resultPas = $this->user_model->matchOldPassword($this->vendorId, $oldPassword);
            
            if(empty($resultPas))
            {
                $this->session->set_flashdata('nomatch', 'Your old password is not correct');
                redirect('profile/'.$active);
            }
            else
            {
                $usersData = array('password'=>getHashedPassword($newPassword), 'updatedBy'=>$this->vendorId,
                                'updatedDtm'=>date('Y-m-d H:i:s'));
                
                $result = $this->user_model->changePassword($this->vendorId, $usersData);
                
                if($result > 0) { $this->session->set_flashdata('success', 'Password updation successful'); }
                else { $this->session->set_flashdata('error', 'Password updation failed'); }
                
                redirect('profile/'.$active);
            }
        }
    }

    function emailExists($email)
    {
        $userId = $this->vendorId;
        $return = false;

        if(empty($userId)){
            $result = $this->user_model->checkEmailExists($email);
        } else {
            $result = $this->user_model->checkEmailExists($email, $userId);
        }

        if(empty($result)){ $return = true; }
        else {
            $this->form_validation->set_message('emailExists', 'The {field} already taken');
            $return = false;
        }

        return $return;
    }
}

?>