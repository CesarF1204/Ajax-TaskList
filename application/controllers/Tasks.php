<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tasks extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    public function index_html() {
        $this->load->model('Task');
        $get_each_task['tasks'] = $this->Task->get_all_tasks();
		$this->load->view('partials/tasks_list.php', $get_each_task);
    }
	public function index() {
        $this->load->view('tasks/index.php');
	}
    public function new_task() {
        $this->load->model('Task');
        $task_details = array('name' => $this->input->post('new_task_name'));
        $added_task = $this->Task->add_tasks($task_details);
        redirect(base_url());
    }
    public function update($id) {
		$this->load->model('Task');
        $values = array('name' => $this->input->post('new_task_name'));
        $result = $this->Task->update_task($id, $values);
        $this->session->set_flashdata('success', '<p class="success">Your account has been updated.</p>');
		redirect(base_url());
	}
    public function delete(){
		$this->load->model('Task');
		$this->Task->delete_task($this->input->post('task_id'));
		$this->session->set_flashdata('success', '<p class="errors">Task has been removed.</p>');
		redirect(base_url());
    }

}
