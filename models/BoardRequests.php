<?php
class BoardRequests extends model
{

	public function getList($offset, $id_company)
	{
		$array = array();

		$sql = $this->db->prepare("SELECT * FROM boardrequests WHERE id_company = :id_company LIMIT $offset, 15");
		$sql->bindValue(":id_company", $id_company);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}

	public function getSearch($request_search)
	{

		$array = array();

		$sql = $this->db->prepare("SELECT * FROM boardrequests WHERE license_plate LIKE '%$request_search%' OR license_name LIKE '%$request_search%' OR cpf LIKE '%$request_search%'");
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}

	public function getPending($id_company)
	{
		$r = 0;

		$sql = $this->db->prepare("SELECT COUNT(*) as c FROM boardrequests WHERE id_company = :id_company");
		$sql->bindValue(':id_company', $id_company);
		$sql->execute();

		$row = $sql->fetch();
		$r = $row['c'];

		return $r;
	}

	public function getLastDaysList($id_company)
	{
		$r = 0;

		$sql = $this->db->prepare("SELECT COUNT(*) as c FROM boardrequests WHERE request_date BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW() AND id_company = :id_company");
		$sql->bindValue(':id_company', $id_company);
		$sql->execute();

		$row = $sql->fetch();
		$r = $row['c'];

		return $r;
	}

	public function getCurrentMonthList($id_company)
	{
		$r = 0;

		$sql = $this->db->prepare("SELECT COUNT(*) as c FROM boardrequests WHERE MONTH(request_date) = MONTH(NOW()) AND id_company = :id_company");
		$sql->bindValue(':id_company', $id_company);
		$sql->execute();

		$row = $sql->fetch();
		$r = $row['c'];

		return $r;
	}


	// public function getListSeries($id, $school_id)
	// {
	// 	$array = array();

	// 	$sql = $this->db->prepare("SELECT series_id FROM students WHERE id = :id AND school_id = :school_id");
	// 	$sql->bindValue(":id", $id);
	// 	$sql->bindValue(":school_id", $school_id);
	// 	$sql->execute();

	// 	if ($sql->rowCount() > 0) {
	// 		$r = $sql->fetch();
	// 	}

	// 	$serie_id = $r['series_id'];

	// 	$sql = $this->db->prepare("SELECT * FROM students_classes WHERE series_id = '$serie_id' AND school_id = :school_id");
	// 	$sql->bindValue(":school_id", $school_id);
	// 	$sql->execute();

	// 	if ($sql->rowCount() > 0) {
	// 		$array = $sql->fetchAll();
	// 	}

	// 	return $array;
	// }

	// public function getListEvaluations($offset, $school_id)
	// {
	// 	$array = array();

	// 	$sql = $this->db->prepare("
	// 		SELECT 
	// 			students.*,
	// 			students_classes.name_class_students as class_name,
	// 			schools.school_name,
	// 			series.series_name as series_name
	// 		FROM 
	// 			students 
	// 		LEFT JOIN
	// 			students_classes ON students.student_class_id = students_classes.id
	// 		LEFT JOIN
	// 			schools ON students.school_id = schools.id
	// 		LEFT JOIN
	// 			series ON students.series_id = series.id
	// 		WHERE
	// 			students.school_id = :school_id 
	// 		AND
	// 			students.evaluation_stage >= 1
	// 		LIMIT $offset, 15");
	// 	$sql->bindValue(":school_id", $school_id);
	// 	$sql->execute();

	// 	if ($sql->rowCount() > 0) {
	// 		$array = $sql->fetchAll();
	// 	}

	// 	return $array;
	// }

	// public function getListAll($school_id)
	// {
	// 	$array = array();

	// 	$sql = $this->db->prepare("
	// 			SELECT 
	// 				students.*,
	// 				students_classes.name_class_students as class_name
	// 			FROM 
	// 				students 
	// 			LEFT JOIN
	// 				students_classes ON students.student_class_id = students_classes.id
	// 			WHERE
	// 				students.school_id = :school_id
	// 		");
	// 	$sql->bindValue(":school_id", $school_id);
	// 	$sql->execute();

	// 	if ($sql->rowCount() > 0) {
	// 		$array = $sql->fetchAll();
	// 	}

	// 	return $array;
	// }

	// public function getListStudentsClass($student_class_id, $school_id)
	// {
	// 	$array = array();

	// 	$sql = $this->db->prepare("
	// 			SELECT 
	// 				students.*,
	// 				students_classes.name_class_students as class_name,
	// 				schools.school_name as school_name,
	// 				series.series_name as series_name
	// 			FROM 
	// 				students 
	// 			LEFT JOIN
	// 				students_classes ON students.student_class_id = students_classes.id
	// 			LEFT JOIN
	// 				schools ON students.school_id = schools.id
	// 			LEFT JOIN
	// 				series ON students.series_id = series.id
	// 			WHERE
	// 				students.school_id = :school_id AND
	// 			students.student_class_id = :student_class_id
	// 		");
	// 	$sql->bindValue(":student_class_id", $student_class_id);
	// 	$sql->bindValue(":school_id", $school_id);
	// 	$sql->execute();

	// 	if ($sql->rowCount() > 0) {
	// 		$array = $sql->fetchAll();
	// 	}

	// 	return $array;
	// }


	public function getInfo($id, $id_company)
	{
		$array = array();

		$sql = $this->db->prepare("SELECT * FROM boardrequests WHERE id = :id AND id_company = :id_company");
		$sql->bindValue(":id", $id);
		$sql->bindValue("id_company", $id_company);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}

		return $array;
	}

	public function getCount($id_company)
	{
		$r = 0;

		$sql = $this->db->prepare("SELECT COUNT(*) as c FROM boardrequests WHERE id_company = :id_company");
		$sql->bindValue(':id_company', $id_company);
		$sql->execute();
		$row = $sql->fetch();

		$r = $row['c'];



		return $r;
	}

	public function create($license_plate, $license_name, $cpf, $phone, $plate_type, $user_id, $id_company)
	{

		$sql = $this->db->prepare("INSERT INTO  boardrequests SET license_plate = :license_plate, license_name = :license_name, cpf = :cpf, phone = :phone, plate_type = :plate_type, user_id = :user_id, id_company = :id_company, status = 1, request_date = NOW()");
		$sql->bindValue(":license_plate", $license_plate);
		$sql->bindValue(":license_name", $license_name);
		$sql->bindValue(":cpf", $cpf);
		$sql->bindValue(":phone", $phone);
		$sql->bindValue(":plate_type", $plate_type);
		$sql->bindValue(":user_id", $user_id);
		$sql->bindValue(":id_company", $id_company);
		$sql->execute();
	}

	public function changeStatus($id, $status, $id_company)
	{

		$sql = $this->db->prepare("UPDATE boardrequests SET status = :status WHERE id = :id AND id_company = :id_company");
		$sql->bindValue(":id", $id);
		$sql->bindValue(":status", $status);
		$sql->bindValue(":id_company", $id_company);
		$sql->execute();
	}

	public function update($id, $license_plate, $license_name, $cpf, $phone, $plate_type, $user_id, $id_company)
	{

		$sql = $this->db->prepare("UPDATE boardrequests SET license_plate = :license_plate, license_name = :license_name, cpf = :cpf, phone = :phone, plate_type = :plate_type, user_id = :user_id WHERE id = :id AND id_company = :id_company");
		$sql->bindValue(":id", $id);
		$sql->bindValue(":license_plate", $license_plate);
		$sql->bindValue(":license_name", $license_name);
		$sql->bindValue(":cpf", $cpf);
		$sql->bindValue(":phone", $phone);
		$sql->bindValue(":plate_type", $plate_type);
		$sql->bindValue(":user_id", $user_id);
		$sql->bindValue(":id_company", $id_company);
		$sql->execute();
	}

	// public function searchStudent($sp, $school_id)
	// {
	// 	$array = array();

	// 	$sql = $this->db->prepare("
	// 		SELECT 
	// 			students.*,
	// 			schools.school_name,
	// 			students_classes.name_class_students,
	// 			series.series_name as series_name
	// 		FROM 
	// 			students 
	// 		LEFT JOIN
	// 			schools ON students.school_id = schools.id
	// 		LEFT JOIN
	// 			students_classes ON students.student_class_id = students_classes.id
	// 		LEFT JOIN
	// 			series ON students.series_id = series.id
	// 		WHERE 
	// 			students.student_name 
	// 		LIKE 
	// 			'%$sp%' 
	// 		AND 
	// 			students.school_id = '$school_id' 
	// 		ORDER BY 
	// 			students.student_name 
	// 		ASC");
	// 	$sql->bindValue(":student_name", $sp);
	// 	$sql->bindValue(":school_id", $school_id);
	// 	$sql->execute();

	// 	if ($sql->rowCount() > 0) {
	// 		$array = $sql->fetchAll();
	// 	}
	// 	return $array;
	// }

	// public function answers($student_id, $school_id, $stage, $student_class, $series_id, $answers_list)
	// {
	// 	$answers = implode(',', $answers_list);

	// 	$sql = $this->db->prepare("INSERT INTO students_answers SET student_id = :student_id, school_id = :school_id, stage = :stage, student_class = :student_class, series_id = :series_id, answers = :answers");
	// 	$sql->bindValue(":student_id", $student_id);
	// 	$sql->bindValue(":school_id", $school_id);
	// 	$sql->bindValue(":stage", $stage);
	// 	$sql->bindValue(":student_class", $student_class);
	// 	$sql->bindValue(":series_id", $series_id);
	// 	$sql->bindValue(":answers", $answers);
	// 	$sql->execute();

	// 	$sql = $this->db->prepare("UPDATE students SET evaluation_stage = '$stage' WHERE id = '$student_id'");
	// 	$sql->bindValue(":evaluation_stage", $stage);
	// 	$sql->bindValue(":id", $student_id);
	// 	$sql->execute();
	// }

	// public function destroy($id, $school_id)
	// {
	// 	$sql = $this->db->prepare("DELETE FROM students WHERE id = :id AND school_id = :school_id");
	// 	$sql->bindValue(":id", $id);
	// 	$sql->bindValue(':school_id', $school_id);
	// 	$sql->execute();
	// }

	// public function getInfoSeries($id, $school_id)
	// {
	// 	$array = array();

	// 	$sql = $this->db->prepare("SELECT * FROM students_classes WHERE id = :id AND school_id = :school_id");
	// 	$sql->bindValue(':id', $id);
	// 	$sql->bindValue(':school_id', $school_id);
	// 	$sql->execute();

	// 	if ($sql->rowCount() > 0) {
	// 		$array = $sql->fetch();
	// 	}

	// 	return $array;
	// }

	// public function importStudents($student_name, $id, $series_id, $school_id)
	// {
	// 	$student_class_id = $id;
	// 	for ($i = 0; $i < sizeof($student_name); $i++) {
	// 		$sql = $this->db->prepare("INSERT INTO students SET student_name = '$student_name[$i]', student_class_id = :student_class_id, series_id = :series_id, school_id = :school_id");
	// 		$sql->bindValue(':student_class_id', $student_class_id);
	// 		$sql->bindValue(':series_id', $series_id);
	// 		$sql->bindValue(':school_id', $school_id);
	// 		$sql->execute();
	// 	}

	// }
}
