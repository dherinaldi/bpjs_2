<?php
use Bpjs\Bridging\Icare\BridgeIcare;
use Illuminate\Http\Request;
#use Symfony\Component\HttpFoundation\Request;

require "vendor/autoload.php";

class ServiceReferensi_2
{
    protected $bridging;

	public function __construct()
	{
		$this->bridging = new BridgeIcare();
	}

	// Example To use get Referensi diagnosa
	// Name of Method example
	public function getHistory(Request $reqeust)
	{
		$data = $this->handleRequest($reqeust);
		$endpoint = 'api/rs/validate';
		return $this->bridging->postRequest($endpoint, $data);
	}

	protected function handleRequest($request)
	{
		$data['param'] = $request->nomor_kartu;
		$data['kodedokter'] = $request->kode_dokter;
		return json_encode($data);
	}
}

?>