<div class="content-wrapper">
  <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          Manage
          <small>Products</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Products</li>
        </ol>
    </section>
    <section class="content">
        <div class="container-fluid">
            <?php  if(isset($error)){ echo $error; }
                if(!empty($success)) { echo $success; }
            ?>
            <div class="row">
                <form action="<?php echo site_url();?>products/uploadData" method="post" enctype="multipart/form-data" name="form1" id="form1" class="form-horizontal" >
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header card-header-icon" data-background-color="rose">
                            <i class="material-icons">contacts</i>
                        </div>
                        <div class="card-content">
                            <h4 class="card-title">Add Product</h4>
                                <div class="row">
                                    <label class="col-md-3 label-on-left">Choose your .CSV file:</label>
                                    <div class="col-md-9">
                                        <legend></legend>
                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail">
                                            <img src="" alt="">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                        <div>
                                            <span class="btn btn-rose btn-round btn-file">
                                                <span class="fileinput-new">Select .csv File</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type="file" name="userfile" required="" />
                                            <div class="ripple-container"></div></span>
                                            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-3"></label>
                                    <div class="col-md-9">
                                        <div class="form-group form-button">
                                            <button  type="submit" class="btn btn-fill btn-rose" name="submit">Save</button>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </section>
</div>