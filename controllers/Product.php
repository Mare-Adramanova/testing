<?php

 class Product     
 {
  

    function getAllProducts(){ 
        $productmodel = new ProductModel();
        $products = $productmodel->index();
        $delete_url = ROOT_URL . 'product/delete/';
        include('view/product/Product.php');
     }
  

   function create(){
      $insert_url= ROOT_URL . 'product/insert/';
      $canceled_url= ROOT_URL . 'product/cancel/';

      include("view/product/create.php");
      
  }
  function cancel(){
   header('Location: ' . ROOT_URL);

  }
  function insert(){
   
      $productmodel = new ProductModel;
      $sku = $productmodel->setSku($_POST['sku']);
      $name = $productmodel->setName($_POST['name']);
      $price = $productmodel->setPrice($_POST['price']);
      $productType = $productmodel->setproductType($_POST['productType']);
      $size = $productmodel->setproductType($_POST['size']);
      $weight = $productmodel->setproductType($_POST['weight']);
      $height = $productmodel->setproductType($_POST['height']);
      $width = $productmodel->setproductType($_POST['width']);
      $length = $productmodel->setproductType($_POST['length']);
      $result = $productmodel->createNewProduct($sku, $name, $price, $productType, $size, $weight, $height, $width, $length);
      
      header('Location: ' . ROOT_URL);  
      
  }

   function delete(){
      
      $productmodel = new ProductModel;
      $product = $productmodel->delete();
      header('Location: ' . ROOT_URL);
      
      
   }

 }