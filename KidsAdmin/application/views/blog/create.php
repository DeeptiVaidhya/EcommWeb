

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Create Blog</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">AboutUs</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
   
         <div class="dashboard-wrapper">
   <div class="dashboard-ecommerce">
      <div class="container-fluid dashboard-content ">
        <div class="ecommerce-widget">           
            <div class="row">
              <div class="col-md-12 col-lg-12 col-md-6 col-sm-12">
                  <div class="card">
                     <h5 class="card-header">Recent Orders</h5>
                     <div class="card-body p-0">
                      <div class="container-fluid">
                     <div class="row justify-content-center">
                        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                  <div class="table-responsive">
                    <div class="form-validation">
                        <form class="form-valide" action="<?php echo base_url('pages/blog_post')?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        <div class="form-group row">
                           <label class="col-md-3 col-form-label" for="val-username">Title Of Announcement <span class="text-danger">*</span>
                           </label>
                           <div class="col-md-9">
                              <input type="text" class="form-control" id="title" name="title" placeholder="Enter a title..">
                           </div>
                        </div>
                   
                           <div class="form-group row">
                              <label class="col-md-3 col-form-label" for="val-password">Brief Desciption <span class="text-danger">*</span>
                              </label>
                                 <div class="col-md-9">                         
                                <textarea type="text" class="form-control" name="description" id="description" value="description"></textarea>

                              </div>
                           </div>
                          
                           <div class="form-group row">
                              <div class="col-lg-9 ml-auto">
                                 <button type="submit" class="btn btn-primary">Submit</button>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
            </div>
                    </div>
                     </div>
                     </div>
                  </div>
              </div>
          </div>
      </div>
   </div>
   </div>
 </div>
      <!-- col-md-12 -->
    
    <!-- /.row -->
    

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
  $(document).ready(function() {
    $("#description").wysihtml5();
  })    
</script>