<?php


 class ProductModel 
{

    protected $table_name = 'products';
    
    public $sku;
    public $name;
    public $price;
    public $productType;
    public $size;
    public $weight;
    public $height;
    public $width;
    public $length;

    

    public function getSku(){
       return $this->sku;
    }
    public function setSku($sku){
        return $this->sku = $sku;
     }

     public function getName(){
        return $this->name;
     }
     public function setName($name){
        return $this->name = $name;
      }
    public function getPrice(){
        return $this->price;
    }
    public function setPrice($price){
         return $this->price = $price;
    }  
    public function getproductType(){
        return $this->productType;
    }
    public function setproductType($productType){
         return $this->productType = $productType;
    } 
    public function getSize(){
        return $this->size;
    }
    public function setSize($size){
         return $this->size = $size;
    } 
    public function getWeight(){
        return $this->weight;
    }
    public function setWeight($weight){
         return $this->weight = $weight;
    } 
    public function getHeight(){
        return $this->height;
    }
    
    public function setHeight($height){
        return $this->height = $height;
    } 
    public function getWidth(){
        return $this->width;
    }
    
    public function setWidth($width){
        return $this->width = $width;
   } 
   public function getLength(){
    return $this->length;
    }

    public function setLength($length){
        return $this->length = $length;
    } 
   function index(){
    
        global $db;
        
        $sql = " SELECT * FROM $this->table_name ";
       
        $query = $db->prepare($sql);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        
        return $result;
    
        
    }
    function createNewProduct($sku, $name, $price, $productType, $size, $weight, $height, $width, $length)
    {
       
        global $db;
        
        if(!empty($sku) && 
        !empty($name) && 
        !empty($price) &&
        !empty($productType)
        
        ){
          
            $sql = '
                INSERT INTO products ( sku, name, price, productType, size, weight, height, width, length)
                VALUES ( :sku, :name, :price, :product, :size, :weight, :height, :width, :length)
            ';
            
            $query = $db->prepare($sql);
            $query->bindValue(':sku', $sku, PDO::PARAM_STR);
            $query->bindValue(':name', $name, PDO::PARAM_STR);
            $query->bindValue(':price', $price, PDO::PARAM_STR);
            $query->bindValue(':product', $productType, PDO::PARAM_STR);
            $query->bindValue(':size', $size, PDO::PARAM_STR);
            $query->bindValue(':weight', $weight, PDO::PARAM_STR);
            $query->bindValue(':height', $height, PDO::PARAM_STR);
            $query->bindValue(':width', $width, PDO::PARAM_STR);
            $query->bindValue(':length',$length, PDO::PARAM_STR);
            
           
           


            return $query->execute(); 
        } else {
            
            return false;
            }

    
    }
    
    
    
    

    function delete(){
        global $db;
        
        if(isset($_POST['delete'])){
            $delete = false;
            $sku = array();
            foreach($_POST['checkbox'] as $val){
                
                $sku[] =  $val;
            }
            
            $sku = implode("','", $sku);
            
            $sql = "
            DELETE FROM products WHERE sku IN ('".$sku."')
            ";
            $query = $db->prepare($sql);
            return $query->execute();
            

        }

    }


}