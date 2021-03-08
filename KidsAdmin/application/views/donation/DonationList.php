
<style>
  img {
    width:50px;
    height:50px;
  }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Manage
      <small>Donation</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Attributes</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-12 col-xs-12">

        <div id="messages"></div>

        <?php if($this->session->flashdata('success')): ?>
          <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('success'); ?>
          </div>
        <?php elseif($this->session->flashdata('error')): ?>
          <div class="alert alert-error alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('error'); ?>
          </div>
        <?php endif; ?>

        <?php //if(in_array('createGroup', $user_permission)): ?>
         <!--  <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">Add Attribute</button> -->
          <br /> <br />
        <?php //endif; ?>
        
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Manage Attributes</h3>
          </div>
          <!-- /.box-header -->
          
          <div class="box-body">
            <table id="manageTable" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>phone number</th>
                <th>Images</th>
                <th>Status</th>
                <th>Action</th>
              
              </tr>
              </thead>

              <tbody>
                <?php foreach($donation as $d): ?>
                <tr>
                  <td><?= empty($d['first_name'])?'':$d['first_name']?> <?= empty($d['last_name'])?'':$d['last_name']?></td>
                  <td><?= $d['email'] ?></td>
                  <td><?= $d['phone_number'] ?></td>
                  <td><?php 
                  $var = explode(',',$d['images']);
                  $url = $this->config->item('font_url');
                  foreach($var as $image):?>
                    <?php if(!empty($image)): ?>
                    <img src="<?= $url ?>uploads/Donate/<?= $image ?>" >
                  <?php endif ?>
                  <?php endforeach ?>
                  </td>
                  <td><button type="button" class="btn btn-pill btn-<?= empty($d['donation_status'])?'danger':'success' ?>"><?= empty($d['donation_status'])?'Inactive':'active' ?></button></td>

                  <td><button class="btn btn-secondary" onclick="getStatus(<?= $d['id'] ?>)" data-toggle="modal" data-target="#exampleModal">Donate</button></td>
                </tr>
              <?php endforeach; ?>
              </tbody>

            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- col-md-12 -->
    </div>
    <!-- /.row -->
    

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Approve Donation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div>
        <div class="row">
          <div class="col-sm-1"></div>
          <div class="col-sm-10">
            <div class="col-sm-12">
              <div class="form-group">
                <input type="text" id="amount" class="form-control" >
                <input type="hidden" id="donate_id" class="form-control" >
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <select id="status" class="form-control">
                  <option value="1" id="active">Active</option>
                  <option value="0" id="inactive">InActive</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-sm-1"></div>
      </div>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="setStatus()">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- create brand modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="addModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add Attribute</h4>
      </div>

      <form role="form" action="<?php echo base_url('attributes/create') ?>" method="post" id="createForm">

        <div class="modal-body">

          <div class="form-group">
            <label for="brand_name">Attribute Name</label>
            <input type="text" class="form-control" id="attribute_name" name="attribute_name" placeholder="Enter attribute name" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="active">Status</label>
            <select class="form-control" id="active" name="active">
              <option value="1">Active</option>
              <option value="2">Inactive</option>
            </select>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>

      </form>


    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- edit brand modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="editModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Store</h4>
      </div>

      <form role="form" action="<?php echo base_url('attributes/update') ?>" method="post" id="updateForm">

        <div class="modal-body">
          <div id="messages"></div>

          <!-- <div class="form-group">
            <label for="edit_brand_name">Attribute Name</label>
            <input type="text" class="form-control" id="edit_attribute_name" name="edit_attribute_name" placeholder="Enter attribute name" autocomplete="off">
          </div> -->
          <div class="form-group">
            <label for="edit_active">Status</label>
            <select class="form-control" id="edit_active" name="edit_active">
              <option value="1">Active</option>
              <option value="2">Inactive</option>
            </select>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>

      </form>


    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- remove brand modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Remove Attribute</h4>
      </div>

      <form role="form" action="<?php echo base_url('attributes/remove') ?>" method="post" id="removeForm">
        <div class="modal-body">
          <p>Do you really want to remove?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>


    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<script>
  function getStatus(id){
    
    $.post("<?= base_url() ?>Donation/getDonationById", {id: id}, function(result){
      var parsed = $.parseJSON(result);
     
    $('#amount').val(parsed.donation_amount);
    $('#donate_id').val(parsed.id);
    
    if(parsed.donation_status == 1){
      $('#active').attr('selected','selected');
    }
    if(parsed.donation_status == 0){
      $('#inactive').attr('selected','selected');
    }
  });
  }


  function setStatus(){
   var amount = document.getElementById('amount').value;
   var e = document.getElementById("status");
   var strUser = e.options[e.selectedIndex].value;
   console.log(amount+' '+strUser);
   var id = $('#donate_id').val();
    var update_data = {
      donation_status:strUser,
      donation_amount:amount,
      id:id
    }
    $.post("<?= base_url() ?>Donation/updateDonation",update_data, function(result){
     $("#exampleModal").modal("hide");
     location.reload();
    });
  }


  </script>




