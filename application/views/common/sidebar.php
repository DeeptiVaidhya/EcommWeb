<section>
   <div class="container">
      <div class="row">
         <div class="col-md-3 col-sm-6 fashion-bg">
            <div class="left_side_bar_home">

               <nav class='animated bounceInDown'>
                  <h2 class="filter-title blue-bg-with-shadow">Filter Option
                  </h2>
                     <?php if(!empty($categories)){ foreach($categories as $row){ ?>
                  <ul>
                     <li><a href="<?php echo base_url('products/searchBycategory/'.$row['id']); ?>"><?php echo $row['name']; ?></a>
                     </li>            
                  </ul>
                    <?php } }else{ ?>
                                    <p>Product(s) not found...</p>
                                    <?php } ?>
               </nav>
               
            </div>
         </div>          
        </div>         
         <!-- / Filter & All Fashion 1 Ends -->
      </div>
</section>
 