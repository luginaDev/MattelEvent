<center>Pengirim </center>
<br/>
<h2>Magnshoes.com</h2>
<h3>Jalan dipatiukur 70 bandung Jawabarat</h3>
<h3>08562016206 (info@magnshoes.com)</h3>

<hr/>

<center>Penerima </center>
<table>
  <tr>
    <td> Nama </td>
    <td> : </td>
    <td> <?=$row->nama?> </td>
  </tr>
  <tr>
    <td> Alamat </td>
    <td> : </td>
    <td> <?=$row->alamat?> </td>
  </tr>
  <tr>
    <td>Kota / Propinsi  </td>
    <td> : </td>
    <td>  <?=$city->kota?> / <?=$city->propinsi?> </td>
  </tr>
  <tr>
    <td>Kelurahan / Kecamatan  </td>
    <td> : </td>
    <td>  <?=$city->kelurahan?> / <?=$city->kecamatan?> </td>
  </tr>
  <tr>
    <td> No Telp </td>
    <td> : </td>
    <td> <?=$row->no_telp?> </td>
  </tr>
  <tr>
    <td>Jasa Pengiriman</td>
    <td> : </td>
    <td><?=$vendor->nama?></td>
  </tr>
</table>
