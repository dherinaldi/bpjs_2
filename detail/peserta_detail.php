<?php #cek json data
  #echo '<pre>'; print_r($datas);
$data = $referensi->getPeserta('0002035874171','2023-06-16');
  $datas = json_decode($data);
    
  $metaData = $datas->metaData;
  $response = $datas->response;

  
  echo "code : {$metaData->code} <br>";
  echo "nama : {$response->peserta->nama} <br>";
  echo "nik : {$response->peserta->nik} <br>";
  echo "noka : {$response->peserta->noKartu} <br>";
  echo "pisa : {$response->peserta->pisa} <br>";
  echo "jk : {$response->peserta->sex} <br>";
  echo "RM : {$response->peserta->mr->noMR} <br>";
  echo "Telp : {$response->peserta->mr->noTelepon} <br>";
  echo "tglLahir : {$response->peserta->tglLahir} <br>";
  echo "TAT : {$response->peserta->tglTAT} <br>";
  echo "TMT : {$response->peserta->tglTMT} <br>";
  echo "status : {$response->peserta->statusPeserta->keterangan} <br>";
  echo "Faskes : {$response->peserta->provUmum->kdProvider} {$response->peserta->provUmum->nmProvider} <br>";
  echo "JenisPst : {$response->peserta->jenisPeserta->keterangan} <br>";
  echo "hak Kelas : {$response->peserta->hakKelas->keterangan} <br>";
  echo "umur : {$response->peserta->umur->umurSekarang} <br>";

?>