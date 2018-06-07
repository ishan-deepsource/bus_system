<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_student extends CI_Controller {

	public function index($month_id = " ")
	{

        if(@$status == '') {
            $status = $this->input->get('status');
		}
		if( $status == 'edit'){
			$data['status']  = 'edit';   
			$data['Month'] = @$this->Month->get_month_by_id($month_id)[0];
        }

        $data['Months'] = @$this->Month->gets_month();

		$this->template->view('Upload/Create_month_view', $data);
    }
    
    public function create_month()
    {

        $this->form_validation->set_rules('Month_title', 'Month Title', 'required');
        $this->form_validation->set_rules('Month_date', 'Month Date', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('status', '<div class="alert bg-danger" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> ผิดพลาด!! <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>');
            redirect('Upload_student/');
        }
        else
        {
            $array['Month_title'] = $this->input->post('Month_title');
            $array['Month_date'] = $this->input->post('Month_date');

            $this->Month->insert($array);

            $this->session->set_flashdata('status', '<div class="alert bg-success" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> บันทึกสำเร็จ!! <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>');
            redirect('Upload_student/');
        }
    }

    public function edit_form($month_id)
    {

        redirect('Upload_student/index/'.$month_id.'/?status=edit', 'refresh');
    }

    public function edit_month($month_id)
    {

        $this->form_validation->set_rules('Month_title', 'Month Title', 'required');
        $this->form_validation->set_rules('Month_date', 'Month Date', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('status', '<div class="alert bg-danger" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> ผิดพลาด!! <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>');
            redirect('Upload_student/index/'.$month_id.'/?status=edit', 'refresh');
        }
        else
        {
            $array['Month_title'] = $this->input->post('Month_title');
            $array['Month_date'] = $this->input->post('Month_date');

            $this->Month->update($month_id, $array);

            $this->session->set_flashdata('status', '<div class="alert bg-success" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> บันทึกสำเร็จ!! <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>');
            redirect('Upload_student/');
        }
    }

    public function destroty($month_id)
    {

        $status = $this->Month->delete($month_id);

        if($status == true){

            $this->session->set_flashdata('status', '<div class="alert bg-success" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> ลบสำเร็จ!! <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>');

        }else if($status == false){

            $this->session->set_flashdata('status', '<div class="alert bg-danger" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> ผิดพลาด!! กรุณาลบนักเรียนให้หมดก่อน <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>');

        }

        redirect('Upload_student/');

    }

    public function student_list($month_month_id)
    {
        $data['month_month_id'] = $month_month_id;

        $data['Month'] = $this->Month->get_month_by_id($month_month_id)[0];

        $data['Students_by_month'] = $this->Student->gets_student_by_Month_Month_id($month_month_id);

        $this->template->view('Upload/Upload_student_view',$data);
    }

    public function add_student($month_month_id)
    {

        if($this->input->post('student_name')== ""){
            $this->session->set_flashdata('status', '<div class="alert bg-danger" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> ผิดพลาด!! <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>');
            redirect('Upload_student/student_list/'.$month_month_id, 'refresh');
        }
            $form_data = [];
            foreach($this->input->post('student_name') as $student_name){

                $form_data[] = array(
                    'Student_name' => $student_name,
                    'Month_Month_id' => $month_month_id, 
                );

            }

            $db_debug = $this->db->db_debug;
            $this->db->db_debug = FALSE;
            
            if(!$form_data){

                $this->session->set_flashdata('status', '<div class="alert bg-danger" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> ผิดพลาด!! <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>');
                redirect('Upload_student/student_list/'.$month_month_id, 'refresh');
            }else{

                if($this->Student->insert($form_data)){

                    $this->session->set_flashdata('status', '<div class="alert bg-success" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> เพิ่มสำเร็จ!! <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>');
                    redirect('Upload_student/student_list/'.$month_month_id, 'refresh');

                }else{
                    $this->session->set_flashdata('status', '<div class="alert bg-danger" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> ผิดพลาด!! <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>');
                    redirect('Upload_student/student_list/'.$month_month_id, 'refresh');

                }

            }
              
        $this->db->db_debug = $db_debug;

    }

    public function chang_status($student_id, $month_month_id)
    {
        $array['Student_status'] = 1;

        $this->Student->update_status($student_id, $array);

        $this->session->set_flashdata('status', '<div class="alert bg-success" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> เปลี่ยนสถานะสำเร็จ!! <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>');
        redirect('Upload_student/student_list/'.$month_month_id, 'refresh');
    }

    public function destroty_student($student_id, $month_month_id)
    {
        $this->Student->delete($student_id);

        $this->session->set_flashdata('status', '<div class="alert bg-success" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> ลบนักเรียนสำเร็จ!! <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>');
        redirect('Upload_student/student_list/'.$month_month_id, 'refresh');
    }
    
}
