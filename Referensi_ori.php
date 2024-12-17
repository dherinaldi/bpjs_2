<?php

require "ServiceReferensi.php";
class Referensi
{
    protected $serviceReferensi;

    public function __construct()
    {
        $this->serviceReferensi = new ServiceReferensi;
    }

    public function getDiagnosa($kode)
    {
        $diagnosa = $this->serviceReferensi->diagnosa($kode);
        return $diagnosa;
    }

    public function getPoli($kode)
    {
        $poli = $this->serviceReferensi->poli($kode);
        return $poli;
    }

    public function getPoli_antrol()
    {
        $poli = $this->serviceReferensi->poli_antrol();
        return $poli;
    }

    public function postAntrian($request)
    {
        $result = $this->serviceReferensi->postAntrian($request);
        return $result;
    }

    public function postSep($json)
    {
        $result = $this->serviceReferensi->sep($json);
        return $result;
    }

    public function getPeserta($noka, $tanggal)
    {
        $hasil = $this->serviceReferensi->peserta($noka, $tanggal);
        return $hasil;
    }

    public function getRujukanRS($norujukan)
    {
        $hasil = $this->serviceReferensi->cariRujukanRs($norujukan);
        return $hasil;
    }

    public function listRujukanRS($tglMulai, $tglAkhir)
    {
        $hasil = $this->serviceReferensi->listRujukanRS($tglMulai, $tglAkhir);
        return $hasil;
    }

    public function cariRujukanKeluarRS($norujukan)
    {
        $hasil = $this->serviceReferensi->cariRujukanKeluarRS($norujukan);
        return $hasil;
    }

    public function getHistory($data)
    {
        $hasil = $this->serviceReferensi->getHistory($data);
        return $hasil;
    }

}

$referensi = new Referensi;

#echo $referensi->getDiagnosa("a32");
#echo $referensi->getPoli("ANA");
//echo $referensi->getPoli_antrol();

$data = '{"kodebooking": "16032021A001",
    "jenispasien": "JKN",
    "nomorkartu": "00012345678",
    "nik": "3212345678987654",
    "nohp": "085635228888",
    "kodepoli": "ANA",
    "namapoli": "Anak",
    "pasienbaru": 0,
    "norm": "123345",
    "tanggalperiksa": "2021-01-28",
    "kodedokter": 12345,
    "namadokter": "Dr. Hendra",
    "jampraktek": "08:00-16:00",
    "jeniskunjungan": 1,
    "nomorreferensi": "0001R0040116A000001",
    "nomorantrean": "A-12",
    "angkaantrean": 12,
    "estimasidilayani": 1615869169000,
    "sisakuotajkn": 5,
    "kuotajkn": 30,
    "sisakuotanonjkn": 5,
    "kuotanonjkn": 30,
    "keterangan": "Peserta harap 30 menit lebih awal guna pencatatan administrasi."
 }';

$data_array = array('kodebooking' => '16032021A001');
$data_json = json_encode($data_array);

$data_sep = array(
    'request' => array(
        't_sep' => array(
            'noKartu' => '0002035874171',
            'tglSep' => '2023-06-16 20:40:18',
            'ppkPelayanan' => '0187R006',
            'jnsPelayanan' => '2',
            'klsRawat' => array(
                'klsRawatHak' => '',
                'klsRawatNaik' => '',
                'pembiayaan' => '',
                'penanggungJawab' => '',
            ),
            'noMR' => '125142',
            'rujukan' => array(
                'asalRujukan' => '2',
                'tglRujukan' => '2023-06-12 00:00:00',
                'noRujukan' => '0221R0380623B000001',
                'ppkRujukan' => '0221R038',
            ),
            'catatan' => 'coba hit end poin RJ',
            'diagAwal' => 'Z11',
            'poli' => array(
                'tujuan' => 'ORT',
                'eksekutif' => '0',
            ),
            'cob' => array(
                'cob' => '0',
            ),
            'katarak' => array(
                'katarak' => '0',
            ),
            'jaminan' => array(
                'lakaLantas' => '0',
                'noLP' => '',
                'penjamin' => array(
                    'tglKejadian' => '',
                    'keterangan' => '',
                    'suplesi' => array(
                        'suplesi' => '0',
                        'noSepSuplesi' => '',
                        'lokasiLaka' => array(
                            'kdPropinsi' => '',
                            'kdKabupaten' => '',
                            'kdKecamatan' => '',
                        ),
                    ),
                ),
            ),
            'tujuanKunj' => '0',
            'flagProcedure' => '',
            'kdPenunjang' => '',
            'assesmentPel' => 4,
            'skdp' => array(
                'noSurat' => '',
                'kodeDPJP' => '32346',
            ),
            'dpjpLayan' => '32346',
            'noTelp' => '081111111101',
            'user' => 'Daniar Rinaldi',
        ),
    ),
);

//echo $referensi->postAntrian('11212122');

//echo $referensi->postAntrian($data);
#echo $referensi->postSep($data_sep);
$data = $referensi->getPeserta('0002035874171', '2023-06-16');
$datas = json_decode($data);

#cek data
echo '<pre>';
print_r($datas);

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

$data = $referensi->getRujukanRS('0221R0380324B000002');

echo '<pre>';
print_r($data);
echo "</pre>";

$data1 = $referensi->listRujukanRS('2024-03-24', '2024-03-26');
$datas1 = json_decode($data1);

print_r($datas1);

$data2 = $referensi->cariRujukanKeluarRS('0187R0060324B000004');

$datas2 = json_decode($data2);

print_r($datas2);
