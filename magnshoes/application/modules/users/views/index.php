<script>
  $(document).ready(function(){
    $("#form-validate").validate({
      rules: {
        password: "required",
        confirm: {
          equalTo: "#frm-password"
        }
      }
    });

    $(".curd_edit").click(function(){
      
      var id = $(this).attr("id");
      var username = $("#username-"+id).val();
      var email = $("#email-"+id).val();
      var group_id = $("#group_id-"+id).val();
      var status = $("#status-"+id).val();
      $("#frm-id").val(id);
      $("#frm-username").val(username);
      $("#frm-email").val(email);
      $("#frm-group_id").val(group_id);
      $("#frm-status").val(status);
      $('#myModal').modal('show');
    });
  });
</script>
    <h2><?=$title_form?></h2>   
    <br/>&nbsp;&nbsp;&nbsp;&nbsp;
    <a class="btn btn-primary" data-toggle="modal" href="#myModal" > 
     <i class="icon-plus-sign icon-white"></i> <?=$title_form?>
    </a> 
    <br/>
    <div id="demo">
    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
      <thead>
      <tr>
        <th>No</th>
        <th>Username</th>
        <th>Email</th>
        <th>Group</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($data[0] as $i => $d): ?>
      <tr>
        <td><?=($i+1)?></td>
        <td><?=$d->username?> <input type="hidden" id="username-<?=$d->id?>" value="<?=$d->username?>"/></td>
        <td><?=$d->email?> <input type="hidden" id="email-<?=$d->id?>" value="<?=$d->email?>"/></td>
        <td><?=$d->nama?><input type="hidden" id="group_id-<?=$d->id?>" value="<?=$d->username?>"/></td>
        <td><?=$d->status?><input type="hidden" id="status-<?=$d->id?>" value="<?=$d->username?>"/></td>
        <td>
          <a href="#" class="curd_edit" id="<?=$d->id?>" > Edit</a>
        </td>
      </tr>
    <?php endforeach;?>
    </tbody>
  </table>
</div>

<form id="form-validate" class="form-horizontal" method="post" action="<?=base_url("users/save")?>">
<div class="modal" id="myModal">
  <div class="modal-header">
  <a class="close" data-dismiss="modal">×</a>
  <h3>Form <?=$title_form?></h3>
  </div>
  <div class="modal-body">
  <p>
    
      <div class="control-group">
      <label class="control-label" for="nama">Username </label>
      <div class="controls">
        <input type="text" class="input-xlarge required" id="frm-username" name="username">
        <input type="hidden" class="" id="frm-id" name="id">
        <p class="help-block">Masukan nama username</p>
      </div>
      </div>
      <div class="control-group">
      <label class="control-label" for="frm-email">Email </label>
      <div class="controls">
        <input type="text" class="input-xlarge required" id="frm-email" name="email">
        <p class="help-block">Masukan Email</p>
      </div>
      </div>
      <div class="control-group">
      <label class="control-label" for="nama">Password </label>
      <div class="controls">
        <input type="password" class="input-xlarge required" id="frm-password" name="password">
        <p class="help-block">Masukan nama password</p>
      </div>
      </div>
      <div class="control-group">
      <label class="control-label" for="nama">Confirm Password </label>
      <div class="controls">
        <input type="password" class="input-xlarge required" id="confirm">
        <p class="help-block">Masukan Confirm Password</p>
      </div>
      </div>
      <div class="control-group">
      <label class="control-label" for="group">Group</label>
      <div class="controls">
        <select name="group_id" id="group" class="required">
          <?php foreach($groups[0] as $g){ ?>
            <option value="<?=$g->id?>"><?=$g->nama?> </option>
          <?php } ?>
        </select>
        <p class="help-block">Masukan group</p>
      </div>
      </div>
      <div class="control-group">
      <label class="control-label" for="group">Status</label>
      <div class="controls">
        <select name="status" id="group" class="required">
          
              <option value="aktif">aktif </option>
              <option value="nonaktif">nonaktif</option>
        </select>
        <p class="help-block">Masukan group</p>
      </div>
      </div>
  </p>
  </div>
  <div class="modal-footer">
  <a href="#" class="btn close-modal">Close</a>
  <input type="submit" value="Save changes" class="btn btn-primary"> 
  </div>
</div>
</form>