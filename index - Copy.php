<?php
  
  // http Important settings
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Headers: *");
  header("Access-Control-Allow-Methods: *");

  
  // Database connect Class 

  class Dbh {
    public $servername = "localhost";
    public $username = "id20576781_yehia";
    public $password = "upg26!NgAZMHXmu-";
    public $dbName ="id20576781_test_project";

    //private and protected was
    public function connect(){
      
      $dsn = 'mysql:host=' . $this->servername . ';dbname=' . $this->dbName;
      $conn = new PDO($dsn, $this->username, $this->password ); 
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     
      return $conn;
    }
   
  } 


  // Products Class Extending Database connect() Class 

  class Product extends Dbh {


  
    // get all products Function, and also after update and delete happen, we don't need to set much but get the changes happened from the DB directly

    public function getData(){
      
    //   try {
        
    //     $stmt = $this->connect()->prepare("SELECT * FROM products");

    //     $stmt->execute();

    //     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        
    //     $resultv = $stmt->fetchAll();
       
    //     return json_encode($resultv);
        
    //   } catch(PDOException $e) {
    //     return "Error: " . $e->getMessage();
    //   }
    //   $conn = null;
    // }

    // // Add a product Function

    // public function insertData($data){

    //     $this->data = json_decode(file_get_contents('php://input'), true);
      
    //     $name = $this->data['name'];
    //     $sku = $this->data['sku'];
    //     $price = $this->data['price'];
    //     $typeswitcher = $this->data['typeswitcher'];
    //     $size = $this->data['size'];
    //     $height = $this->data['height'];
    //     $width = $this->data['width'];
    //     $length = $this->data['length'];
    //     $weight = $this->data['weight'];

      
    //     try {


    //       $sql = "INSERT INTO products (name,sku,price,typeswitcher,size,height,width,length,weight)
    //       VALUES ('$name','$sku','$price','$typeswitcher','$size','$height','$width','$length','$weight')";

    //       $this->connect()->exec($sql); 
      
    //       return "New Product created successfully";
          
    //     } catch(PDOException $e) {
    //       echo $sql . "<br>" . $e->getMessage();
    //     }
        
    //     $conn = null;
      
      
    // }

     // Delete a product Function

    public function deleteProduct($datae){

      try {
      
        $this->datae = json_decode(file_get_contents('php://input'), true);

        $this->connect();
 
       foreach ($this->datae as $value) {
        // echo "$value";
        $sql = "DELETE FROM products WHERE id = '$value' ";
    
        // to perform the operation
        $this->connect()->exec($sql);
        
         }
    
       return "Product deleted successfully";
      
       
      } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
      }
      
      $conn = null;
    
    }
   
  }

  }



  // Class
  $productOne = new Product ();


  // // GET REQUEST
  // if ($_SERVER["REQUEST_METHOD"] == "GET") { 

  //   echo $productOne->getData(); 
  // }

  // // POST REQUEST
  // if ($_SERVER["REQUEST_METHOD"] == "POST") { 

  //   $data = json_decode(file_get_contents('php://input'), true);

  //   $productOne->insertData($data);
    
  // }

  

  // USING POST REQUEST NOT DELETE REQUEST BECAUSE IN Deployment 000webhost doesn't allow delete request
  //  DELETE REQUEST V2
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $datae = json_decode(file_get_contents('php://input'), true);

    $productOne->deleteProduct($datae);

    
  }

  
 




?>