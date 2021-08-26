 <?php
 $this->load->model("sells/sell_model","c");
  $this->load->model("members/member_model","mm");
  $this->load->model("discounts/discount_model","dc");
  $this->load->model("delivers/deliver_model","dv");
  $this->load->model("rekening/rekening_model","rek");
  $data["jual"] = $this->c->find_entity_by_id($id); 
  $data["member"] = $this->mm->find_entity_by("no_ktp",$data["jual"]->member_no_ktp);
  $data["detail"] = $this->ds->find(array("pembelian_id"=>$id),0,-1);
  $data["rek"] = $this->rek->find_entity_by_id($data["jual"]->rekening_id);
  $kirim = $this->dv->find(array("pembelian_id"=>$id),0,1); 
 ?>
<div>
  <table cellspacing="0" cellpadding="0" width="540" align="center" border="0">
    <tbody>
      <tr>
        <td bgcolor="#90311B" width="20" rowspan="3"></td>
        <td align="left" width="125" height="45" bgcolor="#90311B">
          <div>
            <a href='' target='_blank'><img src='http://s8.postimage.org/kofnhmrip/LOGO_MAGNSHOES_PUTIH.png' border='0' alt="LOGO MAGNSHOES" /></a>
          </div>
        </td>
        <td valign="middle" align="right" bgcolor="#90311B">

          <table cellspacing="0" cellpadding="0" border="0">
            <tbody>
              <tr>
                <td valign="bottom" align="center">
                  <div>
                    <a href="#" style="font-family:Georgia, Tahoma, Arial; font-size:10pt; color:white">Data akun anda  </a>
                  </div>
                </td>
                <td valign="bottom" align="center" width="10"></td>
                <td style="font-family:Georgia, Tahoma, Arial; font-size:10pt; color:white">|</td>
                <td valign="bottom" align="center" width="10"></td>
                <td valign="bottom" align="center">
                  <div>
                    <a href="#" style="font-family:Georgia, Tahoma, Arial; font-size:10pt;color:white">Bantuan</a>
                  </div>
                </td>
                <td width="5"></td>
               </tr>
            </tbody>
          </table>
        </td>
        <td bgcolor="#90311B" width="20" rowspan="3"></td>
      </tr>
      <tr>
        <td bgcolor="#ffffff" colspan="2">
          <table cellspacing="0" cellpadding="0" width="500" align="center">
            <tbody>
              <tr>
                <td>
                  <table cellpadding="0" cellspacing="0" width="100%">
                    <tbody>
                      <tr>
                        <td height="10" colspan="3"></td>
                      </tr>
                      <tr>
                        <td width="10"></td>
                        <td>
                        <!-- BODY  -->
                         <h2>Informasi Invoices </h2>
                          <br/>
                         <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-condensed" >
                            <thead>
                            <tr>
                              <th style="font-family: Tahoma; color: #4A4947; font-size: 12px;">Invoice </th>
                              <th style="font-family: Tahoma; color: #4A4947; font-size: 12px;"><?=$data["jual"]->invoice?></th>
                              <th style="width:50%">&nbsp;</th>
                              <th style="font-family: Tahoma; color: #4A4947; font-size: 12px;" >Nama Penerima </th>
                              <th style="font-family: Tahoma; color: #4A4947; font-size: 12px;"><?=$kirim[0]->nama?></th>
                            </tr>
                            <tr>
                              <th style="font-family: Tahoma; color: #4A4947; font-size: 12px;"> &nbsp;</th>
                              <th style="font-family: Tahoma; color: #4A4947; font-size: 12px;">&nbsp;</th>
                              <th style="width:50%">&nbsp;</th>
                              <th style="font-family: Tahoma; color: #4A4947; font-size: 12px;" >Alamat Penerima</th>
                              <th style="font-family: Tahoma; color: #4A4947; font-size: 12px;"><?=$kirim[0]->alamat?></th>
                            </tr>
                            <tr>
                              <th style="font-family: Tahoma; color: #4A4947; font-size: 12px;">No Ktp</th>
                              <th style="font-family: Tahoma; color: #4A4947; font-size: 12px;"><?=$data["jual"]->member_no_ktp?></th>
                              <th style="width:50%">&nbsp;</th>
                              <th style="font-family: Tahoma; color: #4A4947; font-size: 12px;">Tanggal</th>
                              <th style="font-family: Tahoma; color: #4A4947; font-size: 12px;"><?=date("d-m-Y",strtotime($data["jual"]->tanggal))?></th>
                            </tr>
                            <tr>
                              <th style="font-family: Tahoma; color: #4A4947; font-size: 12px;">Nama </th>
                              <th style="font-family: Tahoma; color: #4A4947; font-size: 12px;"><?=$data["member"]->nama?></th>
                              <th style="width:50%">&nbsp;</th>
                              <th style="font-family: Tahoma; color: #4A4947; font-size: 12px;">Status Pembayaran</th>
                              <th style="font-family: Tahoma; color: #4A4947; font-size: 12px;"><?=($data["jual"]->status_pembayaran == "blom")? "Belum" : $data["jual"]->status_pembayaran ?></th>
                            </tr>
                            <tr>
                              <th style="font-family: Tahoma; color: #4A4947; font-size: 12px;">Telp </th>
                              <th style="font-family: Tahoma; color: #4A4947; font-size: 12px;"><?=$data["member"]->telp?></th>
                              <th style="width:50%">&nbsp;</th>
                              <th style="font-family: Tahoma; color: #4A4947; font-size: 12px;">Type Pembayaran</th>
                              <th style="font-family: Tahoma; color: #4A4947; font-size: 12px;"><?=$data["jual"]->type_pembayaran?></th>
                            </tr>
                            <tr>
                              <th style="font-family: Tahoma; color: #4A4947; font-size: 12px;">Bank </th>
                              <th style="font-family: Tahoma; color: #4A4947; font-size: 12px;"><?=(empty($data["rek"]->bank) ? "-" : $data["rek"]->bank)?></th>
                              <th style="width:50%">&nbsp;</th>
                              <th style="font-family: Tahoma; color: #4A4947; font-size: 12px;">Rekening</th>
                              <th style="font-family: Tahoma; color: #4A4947; font-size: 12px;"><?=(empty($data["rek"]->rekening)? "-" : $data["rek"]->rekening)?></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td colspan="5">
                                <br/>
                                <table class="table" width="100%" style="border-collapse: separate; border-spacing: 0; padding-top: 20px;"> 
                                  <thead>
                                    <tr>
                                      <td>#</td>
                                      <td>Kode</td>
                                      <td>Nama</td>
                                      <td>Harga</td>
                                      <td>Qty</td>
                                      <td>Diskon</td>
                                      <td>Subtotal</td>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php $qty=0; ?>
                                    <?php foreach($data["detail"] as $i => $val):?>
                                    <?php 
                                    $detail = $this->dp->find_entity_by_id($val->detail_produk_id);  
                                    $harga = $this->dh->find_entity_by_id($val->daftar_harga_id); 
                                    

                                    if(!empty($val->diskon_id)){
                                      $diskon = $this->dc->find_entity_by_id($val->diskon_id)->diskon; 
                                    }else{
                                      $diskon = 0;
                                    }
                                    $qty += $val->quantity;
                                    $sub =  $harga->harga * $val->quantity;
                                    $subtotal =$sub - (($diskon * $sub )/100) ;
                                    ?>
                                      <tr>
                                        <td><?=($i+1)?></td>
                                        <td><?=$detail->id?></td>
                                        <td><?=$detail->nama?></td>
                                        <td align="right">Rp.<?=number_format($harga->harga)?></td>
                                        <td><?=$val->quantity?></td>
                                        <td><?=$diskon?></td>
                                        <td align="right">Rp.<?=number_format($subtotal)?></td>
                                      </tr>
                                    <?php endforeach;?>
                                  </tbody>
                                  <tfoot>
                                    <form method="post" name="form" id="form-validate" action="<?=base_url("sells/save_payment")?>" >
                                     <tr>
                                      <td colspan="5">&nbsp;</td>
                                      <td>SubTotal</td>
                                      <td>Rp.<?=number_format($data["jual"]->subtotal)?></td>
                                    </tr>
                                    <tr>
                                      <td colspan="5">&nbsp;</td>
                                      <td>Biaya Tambahan</td>
                                      <td>Rp.<?=number_format(($kirim[0]->total_biaya))?></td>
                                    </tr>
                                    <tr>
                                      <td colspan="5">&nbsp;</td>
                                      <td>Total</td>
                                      <td>Rp.<?=number_format($data["jual"]->total)?></td>
                                    </tr>
                                  </form>
                                  </tfoot>
                                </table>
                                <br/>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <!-- END BODY  -->
                        
                        </td>    

                        <td width="10"></td>
                      </tr>
                      <tr>
                        <td height="10" colspan="3"></td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
      <tr>
        <td bgcolor="#90311B" colspan="2" height="20"></td>
      </tr>
    </tbody>
  </table>
  <table cellpadding="0" cellspacing="0" align="center" width="540">
    <tbody>
      <tr>
        <td height="10"></td>
      </tr>
      <tr>
        <td>
          <p style="text-align:left;font-size:10px;margin-bottom:12px;font-family:Tahoma, Arial; margin-top:0px">This message was mailed to [<a href="#">magnshoes+1@gmail.com</a>] by Magnshoes.
          <br>
          SRC: 08562016206<br>
          Use of the magnshoes service and website constitutes acceptance of our <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a>.
          <br>
          (c) 2012 magnshoes, Inc. 7foundation, bandung , Jawa Barat, Indonesia.</p>
        </td>
      </tr>
    </tbody>
  </table>
</div>