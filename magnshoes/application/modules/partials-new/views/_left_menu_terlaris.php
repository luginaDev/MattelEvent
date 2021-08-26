<?php
$this->load->model("sells/sell_model","sell");
$data = $this
        ->sell
        ->find_by_sql("SELECT a.detail_produk_id ,sum(a.quantity) ,b.nama , b.gambar
                        FROM detail_pembelian a 
                        join detail_produk b on b.id = a.detail_produk_id
                        group by detail_produk_id 
                        order by quantity desc
                        limit 5");
?>                       
<div class="box " id="bestsellers" style="width: 296px;">
<div class="box-head">Terlaris</div>
  <div class="box-body">
    <div id="bestsellersContent" class="sideBoxContent">
      <div class="wrapper">
        <ol>
          <?php
          if(count($data)>0){
          foreach($data as $d){
          ?>
          <li>
            <a class="prod_detail screenshot" href="#">
              <img src="<?=base_url("assets/uploads/products/".$d->gambar)?>" alt="$d->gambar"  title="<?=$d->gambar?>" width="65" height="65"/>
              <?=$d->nama?>
            </a>
          </li>
          <?php } }?>
        </ol>
      </div>
    </div>                      
  </div> 
</div>