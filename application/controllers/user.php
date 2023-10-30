<?php
Class User extends CI_controller{
    function index() {
        $this->load->model('User_model');
        $users = $this->User_model->all();
        $data = array();
        $data['users']= $users;
        $this->load->view('list',$data);    }
    function create() {
        $this->load->model('User_model');
        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('email','required/valid_email');
        if($this->form_validation->run()==false) {
        $this->load->view('create');
        } else{
            $formArray =array();
            $formArray['name']=$this->input->post('name');
            $formArray['email']=$this->input->post('email');
            $formArray['created_at']= date('Y-m-d');
            $this->User_model->create($formArray);
            $this->session ->set_flashdata('success','Record added succesfully!');
            redirect(base_url().'index.php/user/index');

        }
    }
    function  edit($user_id)
    {
        $this->load->model('User_model');
        $user = $this->User_model->getUser($user_id);
        $data =array();
        $data['user_id']=$user_id;
        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('email','required/valid_email');
        if($this->form_validation->run()==false) {
            $this->load->view('edit',$data);
        } else {
            $formArray =array();
            $formArray['name']=$this->input->post('name');
            $formArray['email']=$this->input->post('email');
           $this->Usermodel-> updateuser_id ($user_id, $formArray);
           $this->session->set_flashdata('success','Record updated successfully');
           redirect( base_url().'index.php/user/index');

    }
}
function delete($user_id)
{
    $this->load->model('User_model');
    $user = $this->User_model->getUser($user_id);
    if(empty($user)) {
        $this->session->set_flashdata('failure', 'Record not found in database');
        redirect(base_url().'index.php/user/index');
    }
    $this->User_model->delete($user_id);
    $this->session->set_flashdata('success', 'Record deleted successfully');
    redirect(base_url().'index.php/user/index');
}
}
?>