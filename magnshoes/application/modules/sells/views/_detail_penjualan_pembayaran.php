<tr>
  <td>No Rekening</td>
  <td colspan="2">:
    <input type="text" class="input-xlarge" id="frm-nama" name="no_rekening">
    <input type="hidden" class="input-xlarge" id="frm-id" name="pembelian_id" value="<?=$data["jual"]->id?>"></td>
  <td colspan="2">&nbsp;</td>
  <td>SubTotal</td>
  <td>Rp.<?=number_format($data["jual"]->subtotal)?></td>
</tr>
<tr>
  <td>No Rek Tujuan</td>
  <td colspan="2">:
    <input type="text" class="input-xlarge" id="frm-nama" name="no_rek_tujuan">
    </td>
  <td colspan="2">&nbsp;</td>
  <td>Biaya Tambahan</td>
  <td>Rp.<?=number_format(($kirim[0]->total_biaya))?></td>
</tr>
<tr>
  <td>Total</td>
  <td colspan="2">:
    <input type="text" class="input-xlarge" id="frm-nama" name="total">
    </td>
  <td colspan="2">&nbsp;</td>
  <td>Total</td>
  <td>Rp.<?=number_format($data["jual"]->total)?></td>
</tr>
<tr>
  <td>Tanggal</td>
  <td colspan="2">:
    <input type="text" class="input-xlarge tanggal" id="frm-tanggal" name="tanggal"  data-date-format="dd-mm-yyyy" value="<?=date("d-m-Y")?>">
    </td>
  <td colspan="2">&nbsp;</td>
  <td></td>
  <td><input type="submit" value="Simpan" class="btn btn-primary"> </td>
</tr>