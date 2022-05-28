<?php


include("KontrakView.php");
include("presenter/ProsesPasien.php");

class ViewPasien implements KontrakView
{
	private $prosespasien; //presenter yang dapat berinteraksi langsung dengan view
	private $tpl;

	function ViewPasien()
	{
		//konstruktor
		$this->prosespasien = new ProsesPasien();
	}

	function tampil()
	{
		$this->prosespasien->prosesDataPasien();
		$data = null; $data_button = null;
		$data_nik = null; $data_name = null; $data_place = null;
		$data_date = null; $data_email = null; $data_telp = null;

		//semua terkait tampilan adalah tanggung jawab view
		for ($i = 0; $i < $this->prosespasien->getSize(); $i++) {
			$no = $i + 1;
			$data .= "<tr>
			<td>" . $no . "</td>
			<td>" . $this->prosespasien->getNik($i) . "</td>
			<td>" . $this->prosespasien->getNama($i) . "</td>
			<td>" . $this->prosespasien->getTempat($i) . "</td>
			<td>" . $this->prosespasien->getTl($i) . "</td>
			<td>" . $this->prosespasien->getGender($i) . "</td>
			<td>" . $this->prosespasien->getEmail($i) . "</td>
			<td>" . $this->prosespasien->getTelp($i) . "</td>
			<td>" .
			"<button name='edit' class='btn btn-warning'><a href='index.php?id_edit=" .
			$this->prosespasien->getId($i) . "' style='color: white; font-weight: bold;'>Ubah</a></button>
			<button name='hapus' class='btn btn-danger' ><a href='index.php?id_hapus=" .
			$this->prosespasien->getId($i) .  "' style='color: white; font-weight: bold;'>Hapus</a></button>" .
			"</td>";
		}

		if(isset($_GET['id_edit']))
		{
			$i = $_GET['id_edit'];

			$data_nik .= "<input type='text' class='form-control' name='nik' value='" . strval($this->prosespasien->getNik($i)) . "' required />";
			$data_button .= "<button type='submit' name='update' class='btn btn-dark mt-3'>Update</button>";
		}
		else
		{
			$data_nik .= "<input type='text' class='form-control' name='nik' required />";
			$data_button .= "<button type='submit' name='add' class='btn btn-dark mt-3'>Add</button>";
		}

		// Membaca template skin.html
		$this->tpl = new Template("templates/skin.html");

		// Mengganti kode dengan data yang sudah diproses
		$this->tpl->replace("DATA_TABEL", $data);
		$this->tpl->replace("DATA_NIK", $data_nik);
		$this->tpl->replace("DATA_BUTTON", $data_button);

		// Menampilkan ke layar
		$this->tpl->write();
	}
}
