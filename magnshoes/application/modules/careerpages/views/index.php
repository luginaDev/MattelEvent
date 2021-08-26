<div class="widget-shell tabbing">
  <div class="widget-header">
    <h2><?=$content_title?></h2>
    <ul class="tabs">
        <li><a href="#tab1a">Overview </a></li>
        <li><a href="#tab2a">Add </a></li>
      </ul>
  </div>
  <div class="widget-body" id="tab1a">
  <?=$this->session->flashdata('success');?>
    <table class="data-table"><!-- Table Conversion: See Section E in custom.js -->
      <thead>
      <tr>
        <th>No</th>
        <th>Title</th>
        <th>Location</th>
        <th>Requirement</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th> Action </th>
      </tr>
      </thead>
      <tbody>
      <?php foreach($rows as $key => $data){ ?>
      <tr class="gradeX">
        <td><?=$key+1?></td>
        <td><?=$data->title?></td>
        <td><?=$data->location?></td>
        <td><?=$data->requirement?></td>
        <td><?=$data->start_date?></td>
        <td><?=$data->end_date?></td>
        <td class="center">
          <a href="<?=base_url()?>careerpages/edit/<?=$data->id?>" >Edit</a>
          <a href="<?=base_url()?>careerpages/delete/<?=$data->id?>" >Delete</a>
          <!--<a href="<?=base_url()?>careerpages/detail/<?=$data->id?>" >Detail</a>-->
        </td>
      </tr>
      <?php }?>
      </tbody>
    </table>
    <div class="fclear"></div>
  </div>
  <div class="widget-body" id="tab2a">
  <!-- <form action="<?=base_url()?>careerpages/create" method="post"> -->
  <?=form_open('careerpages/create')?>
    <div class="global-form">
        <div class="quarter margin-bottom-20">
          <label class="normal-label">Title</label>
          <input type="text" id="title" name="title" class="clear-focus normal" value="Default Title " />
        </div>
        <div class="quarter margin-bottom-20">
          <label class="normal-label">Location</label>
          <input type="text" id="location" name="location" class="clear-focus normal" value="Default Location" />
        </div>
        <div class="quarter margin-bottom-20">
          <label class="normal-label">Start </label>
          <input type="text" id="start_date" name="start_date" class=" datepicker normal" />
        </div>
        <div class="quarter margin-bottom-20 ">
          <label class="normal-label">End</label>
          <input type="text" id="end_date" name="end_date" class="datepicker normal" />
        </div>
        <div class="fclear"></div>
        <div class="margin-bottom-20">
          <label class="normal-label fleft">Requirement</label>
          <div class="textarea-switcher">
            <p>
              <a href="#" class="radio-link-selected">HTML EDITOR</a>
            </p>
          </div>
          <div class="fclear"></div>
          <textarea id="requirement" name="requirement" class="normal textareaMark " rows="5" cols="20"></textarea>
        </div>
      <div class="global-form-footer">
        <input type="reset" value="Cancel" />
        <input class="btn-theme" id="submit" type="submit" value="Submit" />
      </div>
    </div>
    <?=form_close()?>
  </div>
</div>
