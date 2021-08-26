<?php  
  $subtotal = 0;
  $diskon = 0;
  if(count($cart)>0){ 
       foreach ($cart as $items): 
        $jml = $items->qty * $items->harga; 
        $subtotal = $jml + $subtotal;
        if($items->min_quantity <= $items->qty){
            $disk = (($items->diskon / 100) * $items->qty * $items->harga);
          }else{
            $disk = 0;    
          }
        $diskon = $disk + $diskon ;
  ?>
  <table class="cart">
  <tbody>
    <tr class="item-cart-<?=$items->session_rowid?>">
      <td class="image">
        <a href="#">
        <img src="<?=base_url("assets/uploads/products/".$items->gambar)?>" alt="<?=$items->gambar?>" title="<?=$items->gambar?>" height="40" width="40"/>
        </a>
      </td>
      <td class="name">
        <a href="#"><?=$items->name?></a>
        <div/>
        <span class="quantity">x <?=$items->qty?></span>
        <span class="total">Rp <?=number_format($items->harga)?></span>
      </td>
      <td class="remove">
        <span >
        <a href="<?=base_url("frontend/remove_wish/".$items->rowid."/".$items->session_rowid."/".$items->qty."/".$items->detail_produk_id)?>" id="<?=$items->session_rowid?>" class="remove_wish_list"> X </a>
        </span>
      </td>
    </tr>
  </tbody>
  </table>
  <?php endforeach;?>
  <table class="cart">
  <tbody>
  <tr>
    <td align="right" style="text-align: right; padding-right: 0px; ">
      <b>Sub-Total</b>
    </td>
    <td align="right" style="padding-right: 18px; ">
      <span class="t-price">Rp. <?=$this->cart->format_number($subtotal)?></span>
    </td>
  </tr>
  <tr>
    <td align="right" style="text-align: right; padding-right: 0px; ">
      <b>Diskon</b>
    </td>
    <td align="right" style="padding-right: 18px; ">
      <span class="t-price">Rp <?=$this->cart->format_number($diskon)?></span>
    </td>
  </tr>
  <tr>
    <td align="right" style="text-align: right; padding-right: 0px; ">
      <b>Total</b>
    </td>
    <td align="right" style="padding-right: 18px; ">
      <span class="t-price">Rp. <?=$this->cart->format_number($subtotal - $diskon)?></span>
    </td>
  </tr>
 <tr>
    <td align="right" style="text-align: right; padding-right: 0px; ">&nbsp;
      
    </td>
    <td align="right" style="padding-right: 18px; ">
      <a href="<?=base_url("frontend/checkout")?>" class="button">
        <span>Checkout</span></a>

    </td>
  </tr>
  </tbody>
</table> 
<?php }else{ ?>
  Keranjang Belanja Anda Masih Kosong
<?php } ?>