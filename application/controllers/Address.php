<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Address extends CI_Controller {

	public function index($address_id = " ")
	{
        if(@$status == '') {
            $status = $this->input->get('status');
		}
		if( $status == 'edit'){
			$data['status']  = 'edit';   
			$data['Address'] = @$this->Address->get_address_by_id($address_id)[0];
        }

        $data['Addresss'] = @$this->Address->gets_address();

        
		$this->template->view('Address/Address_view', $data);
    }
    
    public function add_address()
    {
    
        $this->form_validation->set_rules('address_student_name', 'Student name', 'required');
        $this->form_validation->set_rules('address_telephone', 'Telephone', 'required|is_natural|min_length[10]|max_length[12]');
        $this->form_validation->set_rules('address_name', 'Address', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('status', '<div class="alert bg-danger" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> ผิดพลาด!! <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>');
            redirect('Address/', 'refresh');
        }
        else
        {
            $Address_Student_name = @$this->Address->get_address_by_student_name($this->input->post('address_student_name'))[0];

            if($Address_Student_name['Address_Student_name'] == $this->input->post('address_student_name'))
            {

                $this->session->set_flashdata('status', '<div class="alert bg-warning" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> ผิดพลาด!! กรุณากรอกอีกครั้ง <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>');
                redirect('Address/', 'refresh');
            }
            else{

                $array['Address_Student_name'] = $this->input->post('address_student_name');
                $array['Address_telephone'] = $this->input->post('address_telephone');
                $array['Address_name'] = $this->input->post('address_name');

                $this->Address->insert($array);

                $this->session->set_flashdata('status', '<div class="alert bg-success" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> เพิ่มสำเร็จ!! <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>');
                redirect('Address/', 'refresh');
            }
        }
    }

    public function destory($address_id)
    {
        $this->Address->delete($address_id);

        $this->session->set_flashdata('status', '<div class="alert bg-success" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> ลบสำเร็จ!! <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>');
        redirect('Address/', 'refresh');

    }

    public function edit_form($address_id)
    {
		redirect('Address/index/'.$address_id.'/?status=edit', 'refresh');
    }

    public function edit($address_id)
    {
        $this->form_validation->set_rules('address_student_name', 'Student name', 'required');
        $this->form_validation->set_rules('address_telephone', 'Telephone', 'required|is_natural|min_length[10]|max_length[12]');
        $this->form_validation->set_rules('address_name', 'Address', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('status', '<div class="alert bg-danger" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> ผิดพลาด!! <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>');
            redirect('Address/index/'.$address_id.'/?status=edit', 'refresh');
        }
        else
        {
    
            $array['Address_Student_name'] = $this->input->post('address_student_name');
            $array['Address_telephone'] = $this->input->post('address_telephone');
            $array['Address_name'] = $this->input->post('address_name');

            $this->Address->update($address_id, $array);

            $this->session->set_flashdata('status', '<div class="alert bg-success" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> แก้ไขสำเร็จ!! <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>');
            redirect('Address/', 'refresh');
           
        }

    }
}
