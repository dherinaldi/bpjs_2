<?php
require "ServiceReferensi_2.php";

class Referensi
{
    protected $serviceReferensi;

    public function __construct()
    {
        $this->serviceReferensi = new ServiceReferensi_2;
    }

    public function getHistory($param)
    {
        $hasil = $this->serviceReferensi->getHistory($param);
        return $hasil;
    }

    public function handleRequest($request)
	{
		$hasil = $this->serviceReferensi->handleRequest($request);	
		return json_encode($hasil);
	}
}

$referensi = new Referensi;

//$data = '{"nomor_kartu": "0002032825678","kode_dokter": "392055"}'; 

#$data = array('no_kartu'=>'0002032825678', 'kode_dokter'=> '392055');

$data['nomor_kartu'] = "0002032825678";
$data['kode_dokter'] = "392055";

echo "<p>";
echo $referensi->getHistory($data);
echo "</p>";




