<style type="text/css">
#reports{
  border:1px solid black;
}
#header_pdf{

}
#header_pdf .title_right{
  text-align: right;
  font-weight: bold;
}

#header_pdf .title_left{
  text-align: left;
  font-size: 10px;
}
#header_pdf .title_center{
  text-align: center;
  font-weight: bold;
  text-transform: uppercase;
  margin-bottom: 20px;
}
.data_content td{
  font-size: 13px;
  color: #333;
  padding-left: 10px;
}
thead tr th {
  font-size: 13px !important;
}
</style>
<table width="100%" id="header_pdf">
  <tr>
    <td colspan="3"><img src="<?=$this->template->get_images_path();?>logo.png" alt="" height="50" width="150"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2" class="title_right"><?=$title?></td>
  </tr>
  <tr>
    <td  class="title_left">magnshoes.com<br/>DIPATIUKUR # 70 BANDUNG</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"  class="title_center"><?=$title_header?></td>
  </tr>
 </table>