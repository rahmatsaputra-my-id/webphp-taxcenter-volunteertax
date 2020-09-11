<?php
$kode_akun = $_REQUEST["query"];
$query=$this->db->where('kode_akun',$kode_akun)->get('data_akun');
foreach ($query->result() as $dd) {
$results[] = array(
		"value" => $dd->id,
		"desc" => $dd->nama_akun,
		"tokens" => array($query, $query . rand(1, 10))
	);

}

/*$query = $_REQUEST["query"];

$max = rand(5, 10);
$results = array();

for($i = 0; $i <= $max; $i++) {
	$results[] = array(
		"value" => $query . ' - ' . rand(10, 100),
		"desc" => "some description goes here...",
		"img" => "" . (rand(1, 10000) . rand(1, 10000)),
		"tokens" => array($query, $query . rand(1, 10))
	);
}*/

echo json_encode($results);
?>