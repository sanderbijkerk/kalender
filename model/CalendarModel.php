<?php
function getAllBirthdays()
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM verjaardagen ORDER BY month ASC, day ASC, name ASC";

	$query = $db->prepare($sql);
	$query->execute();

	$db = null;

	return $query->fetchAll();
}

function getBirthday($id) {
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM verjaardagen WHERE id = :id LIMIT 1";

	$query = $db->prepare($sql);
	$query->execute(array(
		":id" => $id
	));

	$db = null;

	return $query->fetch();
}

function createBirthday()
{
	$name = isset($_POST["name"]) ?  $_POST["name"] : null;
	$day = isset($_POST["day"]) ?  $_POST["day"] : null;
	$month = isset($_POST["month"]) ?  $_POST["month"] : null;
	$year = isset($_POST["year"]) ?  $_POST["year"] : null;
	$age = isset($_POST["age"]) ?  $_POST["age"] : null;

	if ($name === null || $day === null || $month === null || $year === null || $age === null ) {
		return false;
	}

	//Database verbinding maken
	$db = openDatabaseConnection();

	$sql = "INSERT INTO verjaardagen (name, day, month, year, age) VALUES (:name, :day, :month, :year, :age)";

	$query = $db->prepare($sql);
	$query->execute(array(
		":name" => $name,
		":day" => $day,
		":month" => $month,
		":year" => $year,
		":age" => $age 
	));

	//Database verbinding sluiten
	$db = null;

	return true;
}

function deleteBirthday($id)
{
	if ($id === '') {
		return false;
	}

	$db = openDatabaseConnection();

	$sql = "DELETE FROM verjaardagen WHERE id = :id";

	$query = $db->prepare($sql);
	$query->execute(array(
		":id" => $id
	));

	$db = null;

	return true;
}

function editBirthday($id=null) {
	$name = isset($_POST["name"]) ?  $_POST["name"] : null;
	$day = isset($_POST["day"]) ?  $_POST["day"] : null;
	$month = isset($_POST["month"]) ?  $_POST["month"] : null;
	$year = isset($_POST["year"]) ?  $_POST["year"] : null;
	$age = isset($_POST["age"]) ?  $_POST["age"] : null;

	if ($name === null || $day === null || $month === null || $year === null || $age === null ) {
		return false;
	}

	$db = openDatabaseConnection();

	$sql = "UPDATE verjaardagen 
			SET name = :name, day = :day, month = :month, year = :year, age = :age 
			WHERE id = :id";

	$query = $db->prepare($sql);
	$query->execute(array(
		":id" => $id,
		":name" => $name,
		":day" => $day,
		":month" => $month,
		":year" => $year,
		":age" => $age
	));		

	$db = null;

	return true;
}