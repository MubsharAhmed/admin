<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class General extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('general_model');
    }

    public function generalSetting()
    {
        if (!$this->isAdmin()) {
            $this->loadThis();
        } else {
            $this->global['pageTitle'] = '888Juventus : General Setting';
            $data['settings'] = $this->general_model->getAll();
            $this->loadViews("general_setting/general", $this->global, $data, NULL);
        }
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
                $config['upload_path']   = './uploads/logo/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name']     = time() . '_' . $_FILES['logo_image']['name'];

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('logo_image')) {
                    $uploadData = $this->upload->data();
                    $data['logo_image'] = $uploadData['file_name'];
                }
            }
            for ($i = 1; $i <= 3; $i++) {
                if (!empty($_FILES["s_image_$i"]['name'])) {
                    $config['upload_path']   = './uploads/slider_images/';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['file_name']     = time() . '_' . $_FILES["s_image_$i"]['name'];

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload("s_image_$i")) {
                        $uploadData = $this->upload->data();
                        $data["s_image_$i"] = $uploadData['file_name'];
                    }
                }
            }
            $this->general_model->updateGeneralSettings($data);
            $this->session->set_flashdata('success', 'Settings updated successfully');
            redirect('general');
        }
    }

    public function aboutUs()
    {
        $this->global['pageTitle'] = '888Juventus : About Us';

        $data['about'] = $this->general_model->getAllAboutUs();

        $this->loadViews("general_setting/aboutus", $this->global, $data,   NULL);
    }

    public function updateAboutUs()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('section_1_text', 'Section 1 Text', 'required');
        $this->form_validation->set_rules('section_2_h1', 'Section 2 Heading 1', 'required');
        $this->form_validation->set_rules('section_2_h2', 'Section 2 Heading 2', 'required');
        $this->form_validation->set_rules('section_2_text', 'Section 2 Text', 'required');
        $this->form_validation->set_rules('section_3_heading', 'Section 3 Heading', 'required');
        $this->form_validation->set_rules('section_3_text', 'Section 3 Text', 'required');
        $this->form_validation->set_rules('section_4_heading', 'Section 4 Heading', 'required');
        $this->form_validation->set_rules('section_4_text', 'Section 4 Text', 'required');
        $this->form_validation->set_rules('section_5_heading', 'Section 5 Heading', 'required');
        $this->form_validation->set_rules('section_5_text', 'Section 5 Text', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->aboutUs();
        } else {
            $data = array(
                'section_1_text'     => $this->input->post('section_1_text'),
                'section_2_h1'       => $this->input->post('section_2_h1'),
                'section_2_h2'       => $this->input->post('section_2_h2'),
                'section_2_text'     => $this->input->post('section_2_text'),
                'section_3_heading'  => $this->input->post('section_3_heading'),
                'section_3_text'     => $this->input->post('section_3_text'),
                'section_4_heading'  => $this->input->post('section_4_heading'),
                'section_4_text'     => $this->input->post('section_4_text'),
                'section_5_heading'  => $this->input->post('section_5_heading'),
                'section_5_text'     => $this->input->post('section_5_text')
            );

            // Section 2 Image Upload
            if (!empty($_FILES['section_2_image']['name'])) {
                $config['upload_path']   = './uploads/about_us/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name']     = time() . '_' . $_FILES['section_2_image']['name'];

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('section_2_image')) {
                    $uploadData = $this->upload->data();
                    $data['section_2_image'] = $uploadData['file_name'];
                }
            }

            // Section 3 Image Upload
            if (!empty($_FILES['section_3_image']['name'])) {
                $config['upload_path']   = './uploads/about_us/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name']     = time() . '_' . $_FILES['section_3_image']['name'];

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('section_3_image')) {
                    $uploadData = $this->upload->data();
                    $data['section_3_image'] = $uploadData['file_name'];
                }
            }

            // Section 4 Image Upload
            if (!empty($_FILES['section_4_image']['name'])) {
                $config['upload_path']   = './uploads/about_us/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name']     = time() . '_' . $_FILES['section_4_image']['name'];

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('section_4_image')) {
                    $uploadData = $this->upload->data();
                    $data['section_4_image'] = $uploadData['file_name'];
                }
            }

            // Section 5 Image Upload
            if (!empty($_FILES['section_5_image']['name'])) {
                $config['upload_path']   = './uploads/about_us/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name']     = time() . '_' . $_FILES['section_5_image']['name'];

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('section_5_image')) {
                    $uploadData = $this->upload->data();
                    $data['section_5_image'] = $uploadData['file_name'];
                }
            }

            $this->general_model->updateAboutUsSettings($data);

            $this->session->set_flashdata('success', 'About Us settings updated successfully');
            redirect('general/aboutUs');
        }
    }
}
