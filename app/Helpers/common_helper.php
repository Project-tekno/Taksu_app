<?php
//Helper


/**
 * Encrypting password
 * @param string password
 * @return string[] $salt,$encrypted salt and encrypted password
 */
function hashSSHA($password)
{

	$salt = sha1(rand());
	$salt = substr($salt, 0, 10);
	$encrypted = base64_encode(sha1($password . $salt, true) . $salt);
	$hash = array("salt" => $salt, "encrypted" => $encrypted);
	return $hash;
}

/**
 * Decrypting password
 * @param salt, password
 * returns hash string
 */
function checkhashSSHA($salt, $password)
{

	$hash = base64_encode(sha1($password . $salt, true) . $salt);

	return $hash;
}

function tglFormat($tgl, $format)
{
	$tgl2time = strtotime($tgl);

	switch ($format) {
		default:
			$tanggal = $tgl;
			break;
		case "D":
			$tanggal = getHari(date("N", $tgl2time));
			break;
		case "M":
			$tanggal = getBulan(date("m", $tgl2time));
			break;
		case "yyyy":
			$tanggal = getHari(date("Y", $tgl2time));
			break;
		case "dd-mm-yyyy":
			$tanggal = date("d-m-Y", $tgl2time);
			break;
		case "d M yyyy":
			$tanggal = date("d", $tgl2time) . " " . getBulan(date("m", $tgl2time)) . " " . date("Y", $tgl2time);
			break;
		case "d M yyyy T":
			$tanggal = intval(date("d", $tgl2time)) . " " . getBulan(date("m", $tgl2time)) . " " . date("Y", $tgl2time) . " " . date("H:i:s", $tgl2time);
			break;
		case "D, d M yyyy T":
			$tanggal = getHari(date("N", $tgl2time)) . ", " . intval(date("d", $tgl2time)) . " " . getBulan(date("m", $tgl2time)) . " " . date("Y", $tgl2time) . " " . date("H:i:s", $tgl2time);
			break;
	}
	return $tanggal;
}

function tgl_indo($tgl)
{
	$tanggal = substr($tgl, 8, 2);
	$bulan = getBulan(substr($tgl, 5, 2));
	$tahun = substr($tgl, 0, 4);
	return $tanggal . ' ' . $bulan . ' ' . $tahun;
}

function getHari($hari)
{
	$arrHari = array(1 => "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu");
	return $arrHari[$hari];
}

function getBulan($bln)
{
	$arrBulan = array("01" => "Januari", "02" => "Februari", "03" => "Maret", "04" => "April", "05" => "Mei", "06" => "Juni", "07" => "Juli", "08" => "Agustus", "09" => "September", "10" => "Oktober", "11" => "November", "12" => "Desember");
	return $arrBulan[$bln];
}

function tgl_formal($tgl)
{
	if (!empty($tgl)) {
		$tanggal = substr($tgl, 8, 2);
		$bulan = substr($tgl, 5, 2);
		$tahun = substr($tgl, 0, 4);
		return $tanggal . '-' . $bulan . '-' . $tahun;
	} else
		return '00-00-0000';
}

function tgl_formal_with_mounth_name($tgl)
{
	if (!empty($tgl)) {
		$tanggal = substr($tgl, 8, 2);
		$bulan = getBulan(substr($tgl, 5, 2));
		$tahun = substr($tgl, 0, 4);
		return $tanggal . ' ' . $bulan . ' ' . $tahun;
	} else
		return '00-00-0000';
}

function tgl_mysql($tgl)
{
	if (!empty($tgl)) {
		$tanggal = substr($tgl, 0, 2);
		$bulan = substr($tgl, 3, 2);
		$tahun = substr($tgl, 6, 4);
		return $tahun . '-' . $bulan . '-' . $tanggal;
	} else
		return '0000-00-00';
}

/**
 * Converts bytes into human readable file size.
 *
 * @param string $bytes
 * @return string human readable file size (2,87 Мб)
 * @author Mogilev Arseny
 */


//-----------------------------dari paging.php------------------------------//
