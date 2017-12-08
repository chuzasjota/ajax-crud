<?php
class Persona extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
			//load the login model
			$this->load->model('PersonModel');
	}

	public function index(){
		$data['persons']=$this->PersonModel->getPersons();
		$data['genders']=$this->PersonModel->getGender();
		$this->load->view('header');
		$this->load->view('person', $data);
		$this->load->view('footer');
	}

	public function form(){
		$data['genders']=$this->PersonModel->getGender();
		$this->load->view('header');
		$this->load->view('form', $data);
		$this->load->view('footer');
	}

	public function insert(){
		$dataUser = array(
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'phone' => $this->input->post('phone'),
			'city' => $this->input->post('city'),
			'idGender' => $this->input->post('idGender')
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
			'idGender' => $this->input->post('idGender')
		);

		$id = $this->input->post('idPerson');

		$update = $this->PersonModel->updatePerson($id, $dataUser);
		print json_encode($update);
	}

	public function delete($id){
		$delete = $this->PersonModel->deletePerson($id);
		print json_encode($delete);
	}

}
?>