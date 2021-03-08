

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Update Sub Categories
      
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="<?php echo base_url('attributes/') ?>">subcategories</a></li>
      <li class="active">Update Sub Categories</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
    	<div class="col-md-1"></div>
      <div class="col-md-10 col-xs-12">
      <form role="form" action="<?php echo base_url('subcategory/update') ?>" method="post" id="createForm">

        <div class="modal-body">
          <div class="form-group">
            <select class="form-control" id="cat" name="cat_id">
              <option value="1">Please Select Category</option>
              <?php foreach($categoryData as $cat_data){ ?>
              <option  <?= ($cat_data['id']==$update_data->cat_id)?'selected':'' ?> value="<?php echo $cat_data['id'];?>"><?php echo $cat_data['name'];?></option>
            <?php }?>
            </select>
          </div>
          <div class="form-group">
            <label for="brand_name">SubCategory Name</label>
            <input type="text" class="form-control" id="name" value="<?= empty($update_data->name)?'':$update_data->name ?>" name="name" placeholder="Enter category name" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="active">Status</label>
            <select class="form-control" id="active" name="active">
              <option value="1" <?= ($cat_data['active']==$update_data->active)?'':'selected' ?>>Active</option>
              <option value="0" <?= ($cat_data['active']==$update_data->active)?'':'selected' ?>>Inactive</option>
            </select>
          </div>
          <input type="hidden" name="update_id" value="<?= empty($update_data->id)?'':$update_data->id ?>" >
        </div>

        <div class="modal-footer">
          
          <button type="submit" class="btn btn-primary ">Save changes</button>
        </div>

      </form>
        
       


       
        <!-- /.box -->
      </div>
      <div class="col-sm-1"></div>
      <!-- col-md-12 -->
    </div>
    <!-- /.row -->
    

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->







