<?php

/******************************************
Asisten Pemrogaman 11
 ******************************************/

class TabelPasien extends DB
{
	function getPasien()
	{
		// Query mysql select data pasien
		$query = "SELECT * FROM pasien";
		// Mengeksekusi query
		return $this->execute($query);
	}

	function selectPasien($id = '')
	{
		// Query mysql select data pasien
		$query = "SELECT * FROM pasien WHERE id = '$id'";
		// Mengeksekusi query
		return $this->execute($query);
	}

	function addPasien($nik, $name, $place, $tl, $gender, $email, $telp)
	{
		// Query mysql add data pasien.
		$query = "INSERT INTO pasien VALUES ('', '$nik', '$name', '$place',
		          '$tl', '$gender', '$email', '$telp')";
		
		return $this->execute($query);
	}

	function updatePasien($id, $nik, $name, $place, $tl, $gender, $email, $telp)
	{
		// Query mysql add data pasien.
		$query = "UPDATE pasien SET nik = '$nik', nama = '$name', tempat = '$place',
		          tl = '$tl', gender = '$gender', email = '$email', telp = '$telp'
				  WHERE id = '$id'";
		
		return $this->execute($query);
	}

	function deletePasien($id)
	{
		// Query mysql add data pasien.
		$query = "DELETE FROM pasien WHERE id = '$id'";
		return $this->execute($query);
	}
}

?>