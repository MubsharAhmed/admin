<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class General extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('general_model');
    }

    public function index()
    {
        $this->global['pageTitle'] = '888Juventus : General Setting';
        
        $data['settings'] = $this->general_model->getAll(); 
    
        $this->loadViews("general_setting/general", $this->global, $data, NULL);
    }
    

    public function update()
    {


        $this->load->library('form_validation');


        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('about_company', 'About Company', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data = array(
                'address' => $this->input->post('address'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'about_company' => $this->input->post('about_company')
            );


            

            if (!empty($_FILES['logo_image']['name'])) {
                // File upload configuration
                $config['upload_path']   = './uploads/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc|docx';
                $config['file_name']     = time() . '_' . $_FILES['logo_image']['name'];
            
                $this->load->library('upload', $config);
            
                if ($this->upload->do_upload('logo_image')) {
                    $uploadData = $this->upload->data();
                    $data['logo_image'] = $uploadData['file_name'];
                }
            }
            

            // print_r($data['logo_image']);
            // die;

            $this->general_model->updateGeneralSettings($data);

            $this->session->set_flashdata('success', 'Settings updated successfully');
            redirect('general');
        }
    }
}
?>
