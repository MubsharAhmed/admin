<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{
   
    function userCount($searchText, $userType = 'user')
    {
        $this->db->select('*');
        $this->db->from('users');
        if(!empty($searchText)) {
            $likeCriteria = "(email  LIKE '%".$searchText."%'
                            OR  name  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('role', $userType);
        $query = $this->db->get();
        
        return $query->num_rows();
    }
   
    function users($searchText, $page, $segment, $userType = 'user')
    {
        $this->db->select('*');
        $this->db->from('users');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.email  LIKE '%".$searchText."%'
                            OR  BaseTbl.name  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('role', $userType);
        $this->db->order_by('id', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

    function addNewUser($userInfo)
    {
        $this->db->trans_start();
        $this->db->insert('users', $userInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }

    function managerCount($searchText, $userType = 'manager')
    {
        $this->db->select('*');
        $this->db->from('users');
        if(!empty($searchText)) {
            $likeCriteria = "(email  LIKE '%".$searchText."%'
                            OR  name  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('role', $userType);
        $query = $this->db->get();
        
        return $query->num_rows();
    }

    function managers($searchText, $page, $segment, $userType = 'manager')
    {
        $this->db->select('BaseTbl.*');
        $this->db->from('users as BaseTbl');
        // $this->db->join('easycompanies as company','company.user_id = BaseTbl.id');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.email  LIKE '%".$searchText."%'
                            OR  BaseTbl.name  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.role', $userType);
        $this->db->order_by('BaseTbl.id', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();
        return $result;
    }

    function allManagers($userType = 'manager')
    {
        $this->db->select('BaseTbl.*');
        $this->db->from('users as BaseTbl');
        
        $this->db->where('BaseTbl.role', $userType);
        $this->db->order_by('BaseTbl.id', 'DESC');
        $query = $this->db->get();
        
        $result = $query->result();
        return $result;
    }

    function allAgents($userType = 'agent')
    {
        $this->db->select('BaseTbl.*');
        $this->db->from('users as BaseTbl');
        
        $this->db->where('BaseTbl.role', $userType);
        $this->db->order_by('BaseTbl.id', 'DESC');
        $query = $this->db->get();
        
        $result = $query->result();
        return $result;
    }

    function getAllBets()
    {
        $this->db->select('BaseTbl.*, users.username');
        $this->db->from('bets as BaseTbl');
        $this->db->join('users','users.id = BaseTbl.userId');
        $query = $this->db->get();
        
        return $query->result();
    }

    function usernameExists($username)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username', $username);
        $this->db->where('role', 'user');
        $query = $this->db->get();
        
        return $query->num_rows();
    }

    function addNewManager($userInfo)
    {
        $this->db->trans_start();
        $this->db->insert('users', $userInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }

    function agentCount($searchText, $userType = 'agent')
    {
        $this->db->select('*');
        $this->db->from('users');
        if(!empty($searchText)) {
            $likeCriteria = "(email  LIKE '%".$searchText."%'
                            OR  name  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('role', $userType);
        $query = $this->db->get();
        
        return $query->num_rows();
    }

    function agents($searchText, $page, $segment, $userType = 'agent')
    {
        $this->db->select('BaseTbl.*');
        $this->db->from('users as BaseTbl');
        // $this->db->join('easycompanies as company','company.user_id = BaseTbl.id');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.email  LIKE '%".$searchText."%'
                            OR  BaseTbl.name  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.role', $userType);
        $this->db->order_by('BaseTbl.id', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();
        return $result;
    }

    function addNewAgent($userInfo)
    {
        $this->db->trans_start();
        $this->db->insert('users', $userInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    function getUserRoles()
    {
        $this->db->select('roleId, role, status as roleStatus');
        $this->db->from('tbl_roles');
        $query = $this->db->get();
        
        return $query->result();
    }

    function checkEmailExists($email, $userId = 0)
    {
        $this->db->select("email");
        $this->db->from("users");
        $this->db->where("email", $email);   
        if($userId != 0){
            $this->db->where("id !=", $userId);
        }
        $query = $this->db->get();

        return $query->result();
    }
    
    function getUserInfo($userId, $userRole = 'user')
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id', $userId);
        $this->db->where('role', $userRole);
        $query = $this->db->get();
        
        return $query->row();
    }
    
    function editUser($userInfo, $userId)
    {
        $this->db->where('id', $userId);
        $this->db->update('users', $userInfo);
        
        return TRUE;
    }
    
    function deleteUser($userId)
    {
        $this->db->where('id', $userId);
        $this->db->delete('users');
        
        return $this->db->affected_rows();
    }

    function matchOldPassword($userId, $oldPassword)
    {
        $this->db->select('userId, password');
        $this->db->where('userId', $userId);        
        $this->db->where('isDeleted', 0);
        $query = $this->db->get('tbl_users');
        
        $user = $query->result();

        if(!empty($user)){
            if(verifyHashedPassword($oldPassword, $user[0]->password)){
                return $user;
            } else {
                return array();
            }
        } else {
            return array();
        }
    }
   
    function changePassword($userId, $userInfo)
    {
        $this->db->where('userId', $userId);
        $this->db->where('isDeleted', 0);
        $this->db->update('tbl_users', $userInfo);
        
        return $this->db->affected_rows();
    }

    function loginHistoryCount($userId, $searchText, $fromDate, $toDate)
    {
        $this->db->select('BaseTbl.userId, BaseTbl.sessionData, BaseTbl.machineIp, BaseTbl.userAgent, BaseTbl.agentString, BaseTbl.platform, BaseTbl.createdDtm');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.sessionData LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        if(!empty($fromDate)) {
            $likeCriteria = "DATE_FORMAT(BaseTbl.createdDtm, '%Y-%m-%d' ) >= '".date('Y-m-d', strtotime($fromDate))."'";
            $this->db->where($likeCriteria);
        }
        if(!empty($toDate)) {
            $likeCriteria = "DATE_FORMAT(BaseTbl.createdDtm, '%Y-%m-%d' ) <= '".date('Y-m-d', strtotime($toDate))."'";
            $this->db->where($likeCriteria);
        }
        if($userId >= 1){
            $this->db->where('BaseTbl.userId', $userId);
        }
        $this->db->from('tbl_last_login as BaseTbl');
        $query = $this->db->get();
        
        return $query->num_rows();
    }

    function loginHistory($userId, $searchText, $fromDate, $toDate, $page, $segment)
    {
        $this->db->select('BaseTbl.userId, BaseTbl.sessionData, BaseTbl.machineIp, BaseTbl.userAgent, BaseTbl.agentString, BaseTbl.platform, BaseTbl.createdDtm');
        $this->db->from('tbl_last_login as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.sessionData  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        if(!empty($fromDate)) {
            $likeCriteria = "DATE_FORMAT(BaseTbl.createdDtm, '%Y-%m-%d' ) >= '".date('Y-m-d', strtotime($fromDate))."'";
            $this->db->where($likeCriteria);
        }
        if(!empty($toDate)) {
            $likeCriteria = "DATE_FORMAT(BaseTbl.createdDtm, '%Y-%m-%d' ) <= '".date('Y-m-d', strtotime($toDate))."'";
            $this->db->where($likeCriteria);
        }
        if($userId >= 1){
            $this->db->where('BaseTbl.userId', $userId);
        }
        $this->db->order_by('BaseTbl.id', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

    function getUserInfoById($userId)
    {
        $this->db->select('userId, name, email, mobile, roleId');
        $this->db->from('tbl_users');
        $this->db->where('isDeleted', 0);
        $this->db->where('userId', $userId);
        $query = $this->db->get();
        
        return $query->row();
    }

    function getUserInfoWithRole($userId)
    {
        $this->db->select('BaseTbl.userId, BaseTbl.email, BaseTbl.name, BaseTbl.mobile, BaseTbl.isAdmin, BaseTbl.roleId, Roles.role');
        $this->db->from('tbl_users as BaseTbl');
        $this->db->join('tbl_roles as Roles','Roles.roleId = BaseTbl.roleId');
        $this->db->where('BaseTbl.userId', $userId);
        $this->db->where('BaseTbl.isDeleted', 0);
        $query = $this->db->get();
        
        return $query->row();
    }

}