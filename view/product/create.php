<!DOCTYPE html>
    <html>
    <head>
        <title>Product add</title>
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="style.css">
    </head>
    <body class="bg-light text-dark">
      <div class="container">
        <form action="<?= $insert_url ?>" method="post">  
        <div class="d-flex justify-content-between mt-5">
          <h2>Product Add</h2>
          <div >
            <input type="submit" class="btn btn-outline-primary" value="Save">
            <a href="<?=$canceled_url?>" class="btn btn-outline-warning">Cancel</a>
          </div>
        </div>
        <hr class="mb-5">
        <div class="container p-3">
            
            <div class="form-group mb-3 mt-3">
                <label for="SKU">SKU:</label>
                <input type="text" id="formbox" name="sku" class="form-control" required>
            </div>
            <div class="form-group mb-3">    
                <label for="Name">Name:</label>
                <input type="text" id="formbox" name="name" class="form-control" required>
                
            </div>
            <div class="form-group mb-3">
                <label for="Price">Price:</label>
                <input type="number" id="formbox" name="price" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label>Type Switcher:</label>
                <select id="type" name="productType" onChange="prodType(this.value);" class="form-control" required>
                    <option value="" >Choose Switcher</option>
                    <option value="Disc">Disc</option>
                    <option value="Book">Book</option>
                    <option value="Furniture">Furniture</option>
                </select>
            </div>    
                <div class="fieldbox" id="disc_attributes">
                  <div class="form-group">
                    <label>Size</label>
                    <input type="text" name="size" value="" class="form-control" placeholder="size">
                  </div>  
                  <p >
                    <?= "Pleace provide size in MB for DVD-disc";?>
                  </p>
                </div>
                
                <div class="fieldbox" id="book_attributes">
                  <div class="form-group">
                    <label>Weight</label>
                    <input type="text" name="weight" value="" class="form-control" placeholder="weight">
                  </div>  
                  <p >
                    <?= "Pleace provide weight in Kg";?>
                  </p>
                </div>
                
                <div class="fieldbox" id="furniture_attributes">
                <div class="form-group">
                    <label>Height</label>
                    <input type="text" name="height" class="form-control">
                  </div>
                  <div class="form-group">  
                    <label >Width</label>
                    <input type="text" name="width" class="form-control">
                  </div>  
                  <div class="form-group">
                    <label>Length</label>
                    <input type="text" name="length" class="form-control" >
                  </div>
                  <p >
                    <?= "Pleace provide dimensions in HxWxL format";?>
                  </p>
                </div>
            </form>
        </div>
        <hr class="mt-5">
        <?php
          include_once("view/partials/footer.php");
        ?>
      </div>
      
        <script>
          function prodType(prod){
                var discAttributes = document.getElementById("disc_attributes");
                var bookAttributes = document.getElementById("book_attributes");
                var furnitureAttributes = document.getElementById("furniture_attributes");
                
                discAttributes.style.display="none";
                
                bookAttributes.style.display="none";
                furnitureAttributes.style.display="none";
                
                if(prod=="Disc"){
                  discAttributes.style.display="block";
                  discAttributes.setAttribute("required", "required");
                  
                }else if(prod=="Book"){
                  bookAttributes.style.display="block";
                  discAttributes.setAttribute("required", "required");
                }else if(prod=="Furniture"){
                  furnitureAttributes.style.display="block";
                  discAttributes.setAttribute("required", "required");
                }
              }
        </script>
        <style type="text/css">
          .fieldbox{
                display:none;
                }
        </style>
    </body>
    </html>
