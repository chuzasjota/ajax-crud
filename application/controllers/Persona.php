<?php
class Persona extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
			//load the login model
			$this->load->model('PersonModel');
	}

	public function index(){
		$data['persons']=$this->PersonModel->getPersons();
		$this->load->view('person', $data);
	}

	public function insert(){
		$dataUser = array(
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'phone' => $this->input->post('phone'),
			'city' => $this->input->post('city'),
			'gender' => $this->input->post('gender'),
			'location' => $this->input->post('location')
		);

		$insert = $this->PersonModel->insertPerson($dataUser);
		print json_encode($insert);
	}

	public function edit($id){
		$edit = $this->PersonModel->getPersonId($id);
		print json_encode($edit);
	}

	public function update(){
		$dataUser = array(
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'phone' => $this->input->post('phone'),
			'city' => $this->input->post('city'),
			'gender' => $this->input->post('gender'),
			'location' => $this->input->post('location')
		);

		$update = $this->PersonModel->updatePerson($dataUser);
		print json_encode($update);
	}

	public function delete($id){
		$delete = $this->PersonModel->deletePerson($id);
		print json_encode($delete);
	}

}
?>