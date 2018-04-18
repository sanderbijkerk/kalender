<?php

require(ROOT . "model/CalendarModel.php");

function index()
{
	
	
	render("calendar/index", array(
		'birthdays' => getAllBirthdays())
	);
}

function create()
{
	render("calendar/create");
}

function createSave()
{
	if (createBirthday()) {
		header("location:" . URL . "calendar/index");
		exit();
	} else {
		//er is iets fout gegaan..
		header("location:" . URL . "error/error_db");
		exit();	
	}
}

function read($id)
{
	$birthday = getBirthday($id);

	render("calendar/read", array(
		"birthday" => $birthday
	));
}

function edit($id) {
	$birthday = getBirthday($id);

	render("calendar/edit", array(
		"birthday" => $birthday
	));
}

function editSave($id)
{
	if (editBirthday($id)) {
		header("location:" . URL . "calendar/index");
		exit();
	} else {
		//er is iets fout gegaan..
		header("location:" . URL . "error/error_404");
		exit();	
	}}

function delete($id)
{
	if (deleteBirthday($id)) {
		header("location:" . URL . "calendar/index");
		exit();
	} else {
		//er is iets fout gegaan..
		header("location:" . URL . "error/error_delete");
		exit();	
	}
}