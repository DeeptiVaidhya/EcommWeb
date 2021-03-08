<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

   <!-- Search form (start) -->
   <form method='post' action="<?= base_url() ?>search/loadRecord">
     <input type='text' name='search' value='<?= $search ?>'><input type='submit' name='submit' value='Submit'>
   </form>
   <br/>

   <!-- Posts List -->
   <div class="">
    
    <?php 
   

    $sno = $row+1;
    foreach($result as $data){


      echo $data['name']; 
      echo $data['price']; 
   
      
      $sno++;

    }
    if(count($result) == 0){
      echo "<tr>";
      echo "<td colspan='3'>No record found.</td>";
      echo "</tr>";
    }
    ?>
   </table>


