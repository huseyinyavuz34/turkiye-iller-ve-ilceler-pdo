     <?php 
try {
     $nesse = new PDO("mysql:host=localhost;dbname=nesse_yeni", "root", "");
     $nesse->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch ( PDOException $e ){
     print $e->getMessage();
}
     $nesse->query("SET CHARACTER SET utf8"); 
      ?>