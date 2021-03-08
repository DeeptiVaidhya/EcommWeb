<?php

class Csv_model extends CI_Model

{

    function __construct()

    {

        parent::__construct();

    }

    function uploadData()

    {

       define('DIRECTORY', 'assets/images/product_image/');

            $count=0;

            

            $fp = fopen($_FILES['userfile']['tmp_name'],'r') or die("can't open file");

            while($csv_line = fgetcsv($fp,1024))

            {

                $count++;

                if($count == 1)

                {

                    continue;

                }//keep this if condition if you want to remove the first row

                for($i = 0, $j = count($csv_line); $i < $j; $i++)

                {   

                    $content = file_get_contents($csv_line[11]);

            

                    file_put_contents(DIRECTORY . '/'. $csv_line[0].'.png', $content);

        

                    $insert_csv = array();

                    $insert_csv['product_sku'] = $csv_line[0];

                    $insert_csv['product_name'] = $csv_line[1];

                    



                     $insert_csv['product_brand'] = $csv_line[2];

                     $insert_csv['product_category'] = $csv_line[3];

                     $insert_csv['product_subcategory'] = $csv_line[4];

                     $insert_csv['product_color'] = $csv_line[6];

                     $insert_csv['product_size'] = $csv_line[7];

                     $insert_csv['product_qty'] = $csv_line[8];

                     $insert_csv['product_price'] = $csv_line[9];

                    $insert_csv['product_description'] = $csv_line[10];

                    $insert_csv['product_image'] =  'assets/images/product_image/'.$csv_line[11];

                    $insert_csv['product_thum'] = $csv_line[12];

                    

                    

                    

                    

                }





                // echo '<pre>';

                // print_r($csv_line);exit;

                $i++;



$category = $insert_csv['product_category'];

$category_array = explode("," , $category);

                   // print_r($category_array);

                    foreach ($category_array as $value) {



                    $q = $this->db->query("select id  from `categories`  WHERE name ='$value'");

                    $cat_array = $q->result();



                    $cat[] = $cat_array[0]->id; 

                 

                    }


$color = $insert_csv['product_color'];

$color_array = explode("," , $color);

                   // print_r($category_array);

                    foreach ($color_array as $value) {



                    $q = $this->db->query("select id  from `attribute_value`  WHERE value ='$value' and attribute_parent_id=5");

                    $col_array = $q->result();



                    $col[] = $col_array[0]->id; 

                 

                    }



                    $size = $insert_csv['product_size'];

$size_array = explode("," , $size);

                   // print_r($category_array);

                    foreach ($size_array as $value) {



                    $q = $this->db->query("select id  from `attribute_value`  WHERE value ='$value' and attribute_parent_id=4");

                    $col_array = $q->result();



                    $col[] = $col_array[0]->id; 

                 

                    }


$subcategory =$insert_csv['product_subcategory'];

                    $subcategory_array = explode(",", $subcategory);

                    foreach ($subcategory_array as $value) {

                       

                        $q_su = $this->db->query("select id  from `subcategory`  WHERE name ='$value'");



                    $cats_array = $q_su->result();

                    $cat_sub[] = $cats_array[0]->id;

                    }

$brand =$insert_csv['product_brand'];

                    $brand_array = explode(",", $brand);

                    foreach ($brand_array as $value) {

                       

                        $q_su = $this->db->query("select id  from `brands`  WHERE name ='$value'");



                    $cats_array = $q_su->result();

                    $cat_cbrand[] = $cats_array[0]->id;

                    }






                $data = array(

                    'sku' => $insert_csv['product_sku'] ,

                    'name' => $insert_csv['product_name'],

                    'description' => $insert_csv['product_description'],

                    'image' => $insert_csv['product_image'],

                    'qty' => $insert_csv['product_qty'],

                    'price' => $insert_csv['product_price'],

                    

                    'thumbnails_image' => $insert_csv['product_thum'],

                    'category_id'=> json_encode($cat),

                    'sub_category_id'=> json_encode($cat_sub),

                    'brand_id' => json_encode($cat_cbrand),

                    'attribute_value_id'=>json_encode($col),

                    // 'unit_value' => $insert_csv['unit_value'],

                    // 'unit' => $insert_csv['unit'],

                    // 'increament' => $insert_csv['increament'],

                    // 'rewards' => $insert_csv['rewards']

                    );

         

                $data['crane_features']=$this->db->insert('products', $data);

            }

            $col[] = array();

            fclose($fp) or die("can't close file");

            $data['success']="Product upload success";

            return $data;


    }

    

    

    

    

    // public function getData($content)

    // {

    //     $this->db->select('*')

    // }

}