
  <label>Tanggal </label>
  <input type="text" name="start_date" class="span3 tanggal" placeholder="Masukan Tanggal awal " data-date-format="yyyy-mm-dd" value="<?=$start_date?>">
  S/D
  <input type="text" name="end_date" class="span3 tanggal" placeholder="Masukan Tanggal awal "  data-date-format="yyyy-mm-dd" value="<?=$end_date?>">
  <br/>
  <?php
   if(($this->uri->segment(2)!="stok_reports")  and ($this->uri->segment(2) !="return_reports")  ){

 ?>
   <label>Status Pembayaran</label>
   <select name="status_pembayaran">
     <option value="" <?=(empty($status_pembayaran)? '' :'selected')?> >all </option>
     <option value="blom" <?=($status_pembayaran != "blom"? '' :'selected')?>> Belum </option>
     <option value="sudah" <?=($type_pembayaran != "sudah"? '' :'selected')?> > Lunas/Sudah </option>
   </select>
 <?php
  }

 if( ($this->uri->segment(2)!="stok_reports") and ($this->uri->segment(2) !="deliver_reports")  and ($this->uri->segment(2) !="return_reports")  ){

 ?>
 <label>Type Pembayaran</label>
 <select name="type_pembayaran">
   <option value="" <?=(empty($type_pembayaran)? '' :'selected')?>> all </option>
   <option value="transfer" <?=($type_pembayaran != "transfer"? '' :'selected')?> > Transfer </option>
   <option value="paypall" <?=($type_pembayaran != "paypall"? '' :'selected')?> > Paypal </option>
   <option value="cod" <?=($type_pembayaran != "cod"? '' :'selected')?> > COD </option>
 </select>
 <?php
  }
 ?>
  <button type="submit" class="btn">Submit</button>
