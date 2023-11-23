<?php
$nosep = isset($_REQUEST['nosep'])?$_REQUEST['nosep']:'0187R0060623V000017';
$data = $referensi->getSEP($nosep);
#echo '<pre>'.$data."<br>";
$datas = json_decode($data);

 #cek json data
#echo '<pre>'; print_r($datas);

$metaData = $datas->metaData;
$response = $datas->response;
?>
<div id="print2">
  <table>
    <tr>
      <td width="20%" >SEP</td>
      <td width="30%"><?php echo $response->noSep;?></td>
      <td width="20%">TGL SEP</td>
      <td width="30%"><?php echo $response->tglSep;?></td>
    </tr>
    <tr>
      <td>TGL SEP</td>
      <td><?php echo $response->tglSep;?></td>
      <td>Peserta</td>
      <td><?php echo $response->peserta->jnsPeserta;?></td>
    </tr>
    <tr>
      <td>No Kartu</td>
      <td><?php echo $response->peserta->noKartu;?></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td>Nama Peserta</td>
      <td><?php echo $response->peserta->nama;?></td>
      <td>Jns Rawat</td>
      <td><?php echo $response->jnsPelayanan;?></td>
    </tr>
    <tr>
      <td>Tgl Lahir</td>
      <td><?php echo $response->peserta->tglLahir;?> Kelamin : <?php echo $response->peserta->kelamin; ?></td>
      <td>Jns Kunjungan</td>
      <td></td>
    </tr>
    <tr>
      <td>No Telepon</td>
      <td></td>
      <td>Prosedur</td>
      <td></td>
    </tr>
    <tr>
      <td>Sub/Spesialis</td>
      <td><?php echo $response->poli;?> </td>
      <td>Assesment Plyn</td>
      <td></td>
    </tr>
    <tr>
      <td>Dokter</td>
      <td><?php echo $response->dpjp->nmDPJP;?></td>
      <td>Poli Perujuk</td>
      <td>0</td>
    </tr>
    <tr>
      <td>Faskes Perujuk</td>
      <td></td>
      <td>Kelas Hak</td>
      <td><?php echo $response->peserta->hakKelas;?></td>
    </tr>
    <tr>
      <td>Diagnosa Awal</td>
      <td><?php echo $response->diagnosa;?> </td>
      <td>Kelas Rawat</td>
      <td><?php echo $response->klsRawat->klsRawatHak;?></td>
    </tr>

    <tr>
      <td></td>
      <td></td>
      <td>Penjamin</td>
      <td></td>
    </tr>
    <tr>
      <td>Catatan</td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td>Pasien/ Keluarga Pasien</td>
    </tr>
    <tr height="125px;">
    <td colspan="3">
    </td>
      <td>
      <?php echo $response->peserta->noKartu;?>
      </td>      
    </tr>

  </table>
</div>

<script type="text/javascript">

function print1(strid)
{
if(confirm("Do you want to print?"))
{
var values = document.getElementById(strid);
var printing =
window.open('','','left=0,top=0,width=550,height=400,toolbar=0,scrollbars=0,sta­?tus=0');
printing.document.write(values.innerHTML);
printing.document.close();
printing.focus();
printing.print();
printing.close();
}
}
</script>

<input type="button"  name="printbutton" value="Prin table" onclick="return print1('print2')"/>
