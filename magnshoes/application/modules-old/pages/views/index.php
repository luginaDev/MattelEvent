<script >
$(document).ready(function(){
  
  $('.content').tinymce({
      script_url : '<?php echo $this->template->get_js_path();?>tinymce/jscripts/tiny_mce/tiny_mce.js',            
      relative_urls : false,
      theme : "advanced",
      plugins : "jbimages,safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
      theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,cut,copy,paste,pastetext,pasteword,bullist,numlist,blockquote,|,undo,redo,|,link,unlink,anchor,jbimages,image,media,code",
      theme_advanced_buttons2 : "insertdate,inserttime,hr,|,sub,sup,|,charmap,emotions,|,fullscreen,pagebreak,|,fontsizeselect,formatselect,preview,cite",
      theme_advanced_buttons3 : "",
      theme_advanced_toolbar_location : "top",
      theme_advanced_toolbar_align : "left",
      theme_advanced_statusbar_location : "bottom"
  });

  $('#file_upload').uploadify({
    'uploader'  : '<?php echo $this->template->get_js_path();?>uploadify-v2.1.4/uploadify.swf',
    'script'    : '<?php echo $this->template->get_js_path();?>uploadify-v2.1.4/uploadify.php',
    'cancelImg' : '<?php echo $this->template->get_js_path();?>uploadify-v2.1.4/cancel.png',
    'folder'    : '<?php echo $this->config->item("path_upload_pages"); ?>pages',
    'auto'      : false,
    'onComplete'  : function(event, ID, fileObj, response, data) {
      var template = new Array();
      template[0] = " <div class='half margin-bottom-20' id=''> ";
        template[1] = "   <label class='normal-label fleft'>Title (Indonesia)</label> ";
        template[2] = "   <div class='fclear'></div>";
        template[3] = "   <input type='text' class='clear-focus normal' name='inptitle[]' id='inptitle[]' value=''/>";
        template[4] = "   <div class='fclear'></div>";
        template[5] = "   <label class='normal-label fleft'>Title (english)</label>";
        template[6] = "   <div class='fclear'></div>";
        template[7] = "   <input type='text' class='clear-focus normal' name='enptitle[]' id='enptitle[]' value=''/>";
        template[8] = "   <label class='normal-label fleft'>Description (Indonesia)</label>";
         template[9] = "  <div class='fclear'></div>";
        template[10] = "   <textarea name='inpdescription[]' id='inpdescription[]' class='normal' style='width: 414px; height: 76px;' >"+fileObj['name']+" </textarea>";
        template[11] = "    <div class='fclear'></div>";
        template[12] = "    <label class='normal-label fleft'>Description (Indonesia)</label>";
        template[13] = "   <div class='fclear'></div>";
        template[14] = "   <textarea name='enpdescription[]' id='enpdescription[]' class='normal' style='width: 414px; height: 76px;' >"+fileObj['name']+" </textarea>";
       template[15] = "  </div>";
        template[16] = " <div class='half margin-bottom-20' id=''>";
        template[17] = "   <img src='<?php echo $this->config->item("path_upload_pages"); ?>pages/thumbs/"+fileObj['name']+"' width='334px'  height='236px' />";
        template[18] = "   <input type='hidden' name='pimages[]' id='pimages[]' value='"+fileObj['name']+"'/>";
        template[19] = " </div>";
        template[20] = "<div class='fclear'></div> ";
      var body = "<div class='quarter'><div class='fclear'></div><br/><img src='<?php echo $this->config->item("path_upload_pages"); ?>pages/thumbs/"+fileObj['name']+"' width='195px'  height='150px' /><input type='hidden' name='pimages[]' id='pimages[]' value='"+fileObj['name']+"'/></div><div class='fclear'></div>";
      $("#display_picture").append(template.join(''));
      
    }
  });


$( '#BtnAddLocation' ).button().click(function() {
    $('#addlocation').dialog({
      autoOpen: false,
      show: 'fade',
      hide: 'fade',
      modal: 'true',
      buttons: {
        'Save': function() {
        $("#formLocation").submit();
        },
        Close: function() {
          $( this ).dialog('close');
        }
      }
    });
return false;
});

$("#form_edit").hide();
  $("#btn_overview").click(function(){
    $("#form_edit").hide(function(){
      $("#overview").show();  
    });
  });

  $("#btn_edit").click(function(){
    $("#overview").hide(function(){
      $("#form_edit").show();  
    });
  });

});
</script>

<div class="widget-shell tabbing">
  
  <div class="widget-header">
    <h2><?=$content_title?></h2>
    <a class="btn" id="btn_overview" >Overview</a>
    <a class="btn" id="btn_edit" >Edit <?=$data['row']->intitle?> </a>
  </div>
<!-- ################################################################################################### -->
    <div class="widget-body" id="overview">
      <h1><?=$data['row']->intitle?></h1>
      <p><?=$data['row']->incontent?></p>
      <div class="fclear"></div>
      <?php if($data['row']->intitle=="locations"){ ?>
      <input class="btn-theme" id="BtnAddLocation" type="button" value="Tambah Location" />
      <br/>
      <div class="fclear"></div>

      <div class="global-form">
        <table>
          <thead>
          <tr>
            <th>No</th>
            <th>Title</th>
            <th>Description</th>
            <th>Alamat</th>
            <th>Telp</th>
            <th>Lang</th>
            <th>Lat</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
          <?php foreach($data["loc"] as $index => $loc){ ?>
          <tr class="odd">
            <td><?=$index+1?></td>
            <td><?=$loc->intitle?></td>
            <td><?=$loc->indescription?></td>
            <td><?=$loc->address?></td>
            <td><?=$loc->telp?></td>
            <td><?=$loc->lang?></td>
            <td><?=$loc->lat?></td>
            <td> </th>
          </tr>
          <?php } ?>
          </tbody>
        </table>
        <div class="fclear"></div>
      </div>
      <?php } ?>
      
      <?php 
        if(count($data['img']) > 0){
          echo "<h2>Picture ".$data['row']->intitle."</h2>";
          echo "<ul class='gallery'>";
          foreach($data['img'] as $dd){
            echo " 
            <li>
             <img src='".$this->config->item("path_upload_pages")."pages/thumbs/".$dd->image."' width='170'  height='188' alt='".$dd->indescription."' />
               <div class='action'>
                <a href='".$this->config->item("path_upload_pages")."pages/".$dd->image."' class='zoom' title='".$dd->indescription."' width='370'  height='188' >View</a>
                <a href='#' class='delete'>Delete</a>
              </div>
            </li>
            ";
          }
          echo "</ul>";
        }
      ?>
    </div>
  </div>


  <div class="widget-body" id="form_edit">
<!-- ################################################################################################### -->
      <form action="<?=base_url()?>pages/create/<?=$data['row']->name?>" method="post">
      <div class="global-form">
        <div class="half margin-bottom-20">
          <label class="normal-label">Title (Indonesia)</label>
          <input type="text" class="clear-focus normal" name="intitle" id="intitle" value="<?=$data['row']->intitle?>" />
          <input type="hidden" name="category" id="category" value="static" />
          <input type="hidden" name="id" id="id" value="<?=$data['row']->id?>" />
        </div>
        <!-- <div class="half margin-bottom-20">
          <label class="normal-label">Title (English)</label>
          <input type="text" class="clear-focus normal" name="entitle" id="entitle" value="<?=$data['row']->entitle?>" />
          <input type="hidden" name="category" id="category" value="static" />
        </div> -->
        <div class="fclear"></div>
        <div class="margin-bottom-20">
          <label class="normal-label fleft">Content(Indonesia) </label>
          <div class="fclear"></div>
          <textarea name="incontent" id="incontent" class="content" style="width:90%;height:300px" ><?=$data['row']->incontent?></textarea>
        </div>
        <!-- <div class="fclear"></div>
        <div class="margin-bottom-20">
          <label class="normal-label fleft">Content(English)</label>
          <div class="fclear"></div>
          <textarea name="encontent" id="encontent" class="content" style="width:90%;height:300px"><?=$data['row']->encontent?></textarea>
        </div> -->
      </div>
      <div class="fclear"></div>
      <hr/>
      <?php if($data['row']->intitle=="locations"){ ?>
      <input class="btn-theme" id="BtnAddLocation" type="button" value="Tambah Location" />
      <br/>
      <div class="fclear"></div>
      <div class="global-form">
        <table>
          <thead>
          <tr>
            <th>No</th>
            <th>Title</th>
            <th>Description</th>
            <th>Alamat</th>
            <th>Telp</th>
            <th>Lang</th>
            <th>Lat</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
          <?php foreach($data["loc"] as $index => $loc){ ?>
          <tr class="odd">
            <td><?=$index+1?></td>
            <td><?=$loc->intitle?></td>
            <td><?=$loc->indescription?></td>
            <td><?=$loc->address?></td>
            <td><?=$loc->telp?></td>
            <td><?=$loc->lang?></td>
            <td><?=$loc->lat?></td>
            <td> </th>
          </tr>
          <?php } ?>
          </tbody>
        </table>
        <div class="fclear"></div>
      </div>
      <?php } ?>
      <div class="fclear"></div>
      <hr/>
      <h4> Gallery / Image <?=$data['row']->intitle?> pages </h4>
      <div class="fclear"></div>
      <div class="margin-bottom-20">
        <a href="#" class="opener">Upload Picture</a>
      </div>
      
      <div class="global-form">
        <div id='display_picture'>
        <?php 
          if(count($data['img']) > 0){
            foreach($data['img'] as $dd){
            echo "
            <div class='half margin-bottom-20' id=''>
             <label class='normal-label fleft'>Title (Indonesia)</label> 
             <div class='fclear'></div>
             <input type='text' class='clear-focus normal' name='inptitle[]' id='inptitle[]' value='".$dd->intitle."'/>
             <div class='fclear'></div>
             <label class='normal-label fleft'>Title (english)</label>
             <div class='fclear'></div>
             <input type='text' class='clear-focus normal' name='enptitle[]' id='enptitle[]' value='".$dd->entitle."'/>
             <label class='normal-label fleft'>Description (Indonesia)</label>
             <div class='fclear'></div>
             <textarea name='inpdescription[]' id='inpdescription[]' class='normal' style='width: 414px; height: 76px;' >".$dd->indescription." </textarea>
              <div class='fclear'></div>
              <label class='normal-label fleft'>Description (English)</label>
             <div class='fclear'></div>
             <textarea name='enpdescription[]' id='enpdescription[]' class='normal' style='width: 414px; height: 76px;' >".$dd->endescription." </textarea>
           </div>
           <div class='half margin-bottom-20' id=''>
             <img src='".$this->config->item("path_upload_pages")."pages/thumbs/".$dd->image."' width='334px'  height='236px' />
              <input type='hidden' name='pimages[]' id='pimages[]' value='".$dd->image."'/>
           </div>
            <a href='".base_url()."/pages/delete/".$dd->id."/".$data['row']->name."' class='btn-theme'> Hapus </a>
            <div class='fclear'></div>
            "; 
                   
            }
          }
        ?>
        </div>
      </div>
      <div class="fclear"></div>
      <div class="fclear"></div>
      <div class="global-form-footer">
        <input type="reset" value="Cancel" />
        <input class="btn-theme" id="submit" type="submit" value="Submit" />
      </div>
      </form>
  </div>
  <!-- 
<div id="dialog" title="Upload Picture">
  <label for="incontent"> </label>
    <input id="picture" type="hidden" name="picture" />
    <input id="thumb" type="hidden" name="thumb" />
    <input id="file_upload" type="file" name="file_upload" />
    <a href="javascript:$('#file_upload').uploadifyUpload();">Upload Files</a>
    <span id="loading-question"> </span>
  </span>
</div>

<div id="addlocation" title="Tambah Location" > 
  <form action="<?=base_url()?>pages/addlocation/<?=$data['row']->name?>" method="post" id="formLocation">
    <div class="global-form">
        <label class="normal-label">Title (Indonesia)</label> 
        <input type="text" class="clear-focus normal" name="intitle" id="intitle" value="" />
        <input type="hidden" name="pages_id" id="pages_id" value="<?=$data['row']->id?>" />
        <input type="hidden" name="id" id="idlocation" value="" />
        <div class="fclear"></div>
        <label class="normal-label">Title (English)</label>
        <input type="text" class="clear-focus normal" name="entitle" id="entitle" value="" />
        <div class="fclear"></div>
        <label class="normal-label">Deskripsi (indonesia)</label>
        <input type="text" class="clear-focus normal" name="indescription" id="indescription" value="" />
        <div class="fclear"></div>
        <label class="normal-label">Deskripsi (English)</label>
        <input type="text" class="clear-focus normal" name="endescription" id="endescription" value="" />
        <div class="fclear"></div>
        <label class="normal-label">Alamat</label>
        <input type="text" class="clear-focus normal" name="address" id="address" value="" />
        <div class="fclear"></div>
        <label class="normal-label">No Telp</label>
        <input type="text" class="clear-focus normal" name="telp" id="telp" value="" />
        <div class="fclear"></div>
        <label class="normal-label">long</label>
        <input type="text" class="clear-focus normal" name="lang" id="lang" value="" />
        <div class="fclear"></div>
        <label class="normal-label">Lat</label>
        <input type="text" class="clear-focus normal" name="lat" id="lat" value="" />
    </div>
  </form>
</div> -->