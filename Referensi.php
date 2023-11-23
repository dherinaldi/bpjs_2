<?php

require "ServiceReferensi.php";
class Referensi{
    protected $serviceReferensi;

    public function __construct(){
        $this->serviceReferensi = new ServiceReferensi;
    }

    public function getDiagnosa($kode){
        $diagnosa = $this->serviceReferensi->diagnosa($kode);
        return $diagnosa;
    }

    public function getPoli($kode){
        $poli = $this->serviceReferensi->poli($kode);
        return $poli;
    }
    

    public function getPoli_antrol(){
        $poli = $this->serviceReferensi->poli_antrol();
        return $poli;
    }

    public function postAntrian($request){
        $result = $this->serviceReferensi->postAntrian($request);
        return $result;
    }

    public function postSep($json){
        $result = $this->serviceReferensi->sep($json);
        return $result;
    }

    public function getPeserta($noka, $tanggal){
      $hasil = $this->serviceReferensi->peserta($noka,$tanggal);
      return $hasil;
  }

  public function getSEP($noSEP){
    $hasil = $this->serviceReferensi->cariSep($noSEP);
    return $hasil;
}

}

$referensi = new Referensi;

$param = isset($_REQUEST['param'])?$_REQUEST['param']:isset($_REQUEST['param']);
$data = isset($_REQUEST['data'])?$_REQUEST['data']:isset($_REQUEST['data']);
#echo 'data='.$data;
if($param=='diag'){
  $code = isset($_REQUEST['code'])?$_REQUEST['code']:'a32';
  echo $referensi->getDiagnosa($code);
 
}else if($param=='poli'){
  echo $referensi->getPoli("ana");
}
else if($param=='peserta'){
  if($data!='api'){
    require 'detail\peserta_detail.php';
  }else{
    $noka = isset($_REQUEST['noka'])?$_REQUEST['noka']:'0002082731613';
    $tanggal = date('Y-m-d');
    echo $referensi->getPeserta($noka, $tanggal);   

  }  
}
else if($param=='post_sep'){
  require 'detail\post_sep.php';  
}
else if($param=='cek_sep'){
  if($data!='api'){
    require 'detail\peserta_detail.php';
  }else{
    $noSep = isset($_REQUEST['noSep'])?$_REQUEST['noSep']:'0187R0060623V000017';
    echo $referensi->getSep($noSep);   
  }

}
else{
  echo "data kosong";
}
?>