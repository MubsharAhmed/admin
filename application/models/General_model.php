<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class General_model extends CI_Model
{

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('general_settings');
        $query = $this->db->get();
        return $query->row_array();
    }
    public function updateGeneralSettings($data)
    {

        $this->db->select('id');
        $this->db->from('general_settings');
        $this->db->where('id', 1);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            $this->db->where('id', 1);
            return $this->db->update('general_settings', $data);
        } else {
            return $this->db->insert('general_settings', $data);
        }
    }
    public function getAllAboutUs()
    {
        $this->db->select('*');
        $this->db->from('about_us');
        $query = $this->db->get();
        return $query->row_array();
    }
    public function updateAboutUsSettings($data)
    {
        $this->db->select('id');
        $this->db->from('about_us');
        $this->db->where('id', 1);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $this->db->where('id', 1);
            return $this->db->update('about_us', $data);
        } else {
            return $this->db->insert('about_us', $data);
        }
    }
    public function getAllHomeSections()
    {
        $this->db->select('*');
        $this->db->from('home');
        $query = $this->db->get();
        return $query->row_array();
    }
    public function updateHomeSettings($data)
    {
        $this->db->select('id');
        $this->db->from('home');
        $this->db->where('id', 1);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $this->db->where('id', 1);
            return $this->db->update('home', $data);
        } else {
            return $this->db->insert('home', $data);
        }
    }
    public function getServicesByType($type)
    {
        return $this->db->get_where('services', ['service_type' => $type])->result();
    }
    public function updateService($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('services', $data);
    }
    public function addService($data)
    {
        return $this->db->insert('services', $data);
    }
    public function getStaticServiceSection()
    {
        return $this->db->get_where('services_static_section', ['id' => 1])->row();
    }
    public function updatestaticServices($data)
    {
        $this->db->select('id');
        $this->db->from('services_static_section');
        $this->db->where('id', 1);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $this->db->where('id', 1);
            return $this->db->update('services_static_section', $data);
        } else {
            return $this->db->insert('services_static_section', $data);
        }
    }
    public function updateCaseStudiesData($data)
    {

        $this->db->select('id');
        $this->db->from('case_studies');
        $this->db->where('id', 1);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $this->db->where('id', 1);
            return $this->db->update('case_studies', $data);
        } else {
            return $this->db->insert('case_studies', $data);
        }
    }
    public function getAllCaseStudiesData()
    {
        $this->db->select('*');
        $this->db->from('case_studies');
        $query = $this->db->get();
        return $query->row_array();
    }
    public function getAllPricePackageData()
    {
        $this->db->select('*');
        $this->db->from('price_package');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function updatePricePackage($data)
    {
        foreach ($data as $id => $packageData) {
            $this->db->select('id');
            $this->db->from('price_package');
            $this->db->where('id', $id);

            $query = $this->db->get();

            if ($query->num_rows() > 0) {
                $this->db->where('id', $id);
                $this->db->update('price_package', $packageData);
            } else {
                $this->db->insert('price_package', $packageData);
            }
        }

        return true;
    }

    public function updateOrInsertIndividualSection($data)
    {
        $id = 1;

        // Check if the record exists
        $this->db->select('id');
        $this->db->from('individual_section');
        $this->db->where('id', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            // Record exists, update it
            $this->db->where('id', $id);
            return $this->db->update('individual_section', $data);
        } else {
            // Record does not exist, insert it
            $data['id'] = $id;
            return $this->db->insert('individual_section', $data);
        }
    }
    public function getAllIndividualData()
    {
        $this->db->select('*');
        $this->db->from('individual_section');
        $query = $this->db->get();
        return $query->row_array();
    }



    public function updatePopup($data)
    {
        $this->db->select('id');
        $this->db->from('pop_up');
        $this->db->where('id', 1);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $this->db->where('id', 1);
            return $this->db->update('pop_up', $data);
        } else {
            return $this->db->insert('pop_up', $data);
        }
    }

    public function getAllPopup()
    {
        return $this->db->get_where('pop_up', ['id' => 1])->row();
    }

    // for seeding data into admin table 
    public function seedAdminTable()
    {
        $data = [
            'name'     => 'Admin User',
            'email'    => 'admin2@gmail.com',
            'password' => password_hash('password', PASSWORD_DEFAULT),
        ];

        $existingAdmin = $this->db->get_where('admin', ['email' => $data['email']])->row();

        if (!$existingAdmin) {
            $this->db->insert('admin', $data);
            return "Admin data seeded successfully!";
        } else {
            return "Admin already exists!";
        }
    }
}
