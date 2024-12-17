<?php
//namespace \bpsj_2\v2;
//require "../vendor/autoload.php";
//require __DIR__ . "/vendor/autoload.php";

use Bpjs\Bridging\Vclaim\BridgeVclaim;
use Bpjs\Bridging\Antrol\BridgeAntrol;
use Symfony\Component\HttpFoundation\Request;

use Virusphp\BridgingSatusehat\Bridge\BridgeBase;

use Bpjs\Bridging\Icare\BridgeIcare;
use Illuminate\Http\Request as Request_icare;

require __DIR__ . DIRECTORY_SEPARATOR . "../vendor/autoload.php";

class ServiceReferensi
{
    protected $bridging;
    protected $antrol;

    public function __construct(){
        $this->bridging = new BridgeVclaim;
        $this->antrol = new BridgeAntrol;
        $this->bridging_base = new BridgeBase();
        $this->bridging_icare = new BridgeIcare();

		var_dump($this->bridging);

        echo "<br>";

        var_dump($this->antrol);

		die();
    }

	public function diagnosa($kode){
        $endpoint = "referensi/diagnosa/{$kode}";
        $diagnosa = $this->bridging->getRequest($endpoint);
        return $diagnosa;

    }
	
}

$servicereferensi = new ServiceReferensi;

//print_r($servicereferensi);

?>