<?php
use Bpjs\Bridging\Vclaim\BridgeVclaim;
use Bpjs\Bridging\Antrol\BridgeAntrol;
use Symfony\Component\HttpFoundation\Request;

use Virusphp\BridgingSatusehat\Bridge\BridgeBase;

require "vendor/autoload.php";

class ServiceReferensi
{
    protected $bridging;
    protected $antrol;

    public function __construct(){
        $this->bridging = new BridgeVclaim;
        $this->antrol = new BridgeAntrol;
        $this->bridging_base = new BridgeBase();
    }

    public function diagnosa($kode){
        $endpoint = "referensi/diagnosa/{$kode}";
        $diagnosa = $this->bridging->getRequest($endpoint);
        return $diagnosa;

    }
    public function poli($kode){
        $endpoint = "referensi/poli/{$kode}";
        $poli = $this->bridging->getRequest($endpoint);
        return $poli;

    }

    public function poli_antrol(){        
        $endpoint = "ref/poli/";
        $poli = $this->antrol->getRequest($endpoint);
        return $poli;

    }

    public function peserta($noka,$tanggal){
       # Peserta/nokartu/{parameter 1}/tglSEP/{parameter 2}
       $endpoint = "Peserta/nokartu/{$noka}/tglSEP/{$tanggal}";
       $hasil = $this->bridging->getRequest($endpoint);
        return $hasil;
    }

    public function postAntrian($data)
	{
		$endpoint = 'antrean/add';
		return $this->antrol->postRequest($endpoint, $data);
	}
    public function postAntrian1(Request $request)
	{
		$endpoint = 'antrean/add';
		$data = $request->all();
		return $this->antrol->postRequest($endpoint, $data, "POST");
	}

    #create SEP
    public function sep($datajson)
	{
		$endpoint = 'SEP/2.0/insert';
		return $this->bridging->postRequest($endpoint, $datajson);
	}

    public function cariSep($nosep)
	{
		$endpoint = "SEP/{$nosep}";
		return $this->bridging->getRequest($endpoint);
	}

    public function getPatient($nik)
	{
		$endpoint = 'Practitioner?identifier=https://fhir.kemkes.go.id/id/nik|'. $nik;
		return $this->bridging_base->getRequest($endpoint);
	}

    public function createEncounter($data)
	{
		$endpoint = 'Encounter';
		return $this->bridging_base->postRequest($endpoint, $data);
	}

    public function createMedication($data)
	{
		$endpoint = 'Medication';
		return $this->bridging_base->postRequest($endpoint, $data);
	}


}

?>