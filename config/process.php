<?php

session_start();

include_once('connection.php');
include_once('url.php');


//verifi if get data in POST
$data = $_POST;

//modify in database
if(!empty($data)) {

	//testing the form data
	//echo '<pre>';
	//print_r($data); exit;

	//create a contact
	if($data['type'] === 'create') {
		
		$name = $data['name'];
		$phone = $data['phone'];
		$email = $data['email'];
		$observations = $data['observations'];

		$query = 'INSERT INTO contacts (name, phone, email, observations) VALUES (:name, :phone, :email, :observations)';

		$stmt = $conn->prepare($query);

		$stmt->bindParam(':name', $name);
		$stmt->bindParam(':phone', $phone);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':observations', $observations);
		
		try {
	
			$stmt->execute();
			$_SESSION['msg'] = "Cadastrado com sucesso!";

		} catch (PDOException $e) {
			//conexion error
			$error = $e->getMessage();
			echo "Erro: $error";
		}

		//update contact
	} else if($data['type'] === 'edit') {

		$name = $data['name'];
		$phone = $data['phone'];
		$email = $data['email'];
		$observations = $data['observations'];
		$id = $data['id'];

		$query = 'UPDATE contacts 
							SET name = :name, phone = :phone, email = :email, observations = :observations 
							WHERE id = :id';

		$stmt = $conn->prepare($query);
		$stmt->bindParam(":name", $name);
		$stmt->bindParam(":phone", $phone);
		$stmt->bindParam(":email", $email);
		$stmt->bindParam(":observations", $observations);
		$stmt->bindParam(":id", $id);
		
		try {
	
			$stmt->execute();
			$_SESSION['msg'] = "Atualizado com sucesso!";

		} catch (PDOException $e) {
			//conexion error
			$error = $e->getMessage();
			echo "Erro: $error";
		}

		//delete a contact
	} else if($data['type'] === 'delete') {

		$id = $data['id'];

		$query = 'DELETE FROM contacts WHERE id = :id';
		$stmt = $conn->prepare($query);
		$stmt->bindParam(':id', $id);

		try {
	
			$stmt->execute();
			$_SESSION['msg'] = "Removido com sucesso!";

		} catch (PDOException $e) {
			//conexion error
			$error = $e->getMessage();
			echo "Erro: $error";
		}

	}

	// redirect to Home
	header('location:' . $BASE_URL . '../index.php');

	//select the data
	} else {
		$id;

	if(!empty($_GET)) {
		$id = $_GET["id"];
	}

	//return only one contact
	if(!empty($id)) {

		$query = "SELECT * FROM contacts WHERE id = :id";
		$stmt = $conn->prepare($query);
		$stmt->bindParam(":id", $id);
		$stmt->execute();
		$contact = $stmt->fetch();

	} else {
		// return all contacts
		$contacts = [];
		$query = "SELECT * FROM contacts";
		$stmt = $conn->prepare($query);
		$stmt->execute();
		$contacts = $stmt->fetchAll();
	}
}

//close the conexion
$conn = null;




