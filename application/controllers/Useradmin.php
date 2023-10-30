<?php
class Useradmin extends CI_Controller {
    public function index() {
        // Load the login form view
        $this->load->view('Useradmin');
    }

    public function process_login() {
        // Get the submitted username and password from the form
        $Userid = $this->input->post('Userid');
        $Userpassword = $this->input->post('Userpassword');

        // Perform user authentication here (check credentials against a database)
        if ($this->authenticateUser($Userid, $Userpassword)) {
            // If authentication is successful, set a session variable to track login status
            $this->session->set_userdata('logged_in', TRUE);
            redirect('Useradmin/foodview'); // Redirect to the food view page
        } else {
            // If authentication fails, show an error message or redirect back to the login page
            echo 'Invalid username or password. <a href="useradmin">Try again</a>';
        }
    }

    // Implement your actual authentication logic here (e.g., check credentials against a database)
    private function authenticateUser($Userid, $Userpassowrd) {
        // Replace this with your authentication logic
        // Return TRUE if authentication succeeds, FALSE otherwise
        // Example: check username and password against a database
        $this->load->model('User_model'); // Load a User model
        return $this->User_model->authenticate($Userid, $Userpassword);
    }

    public function foodview() {
        // Load the food view
        $this->load->view('Foodview');
    }
}
?>


