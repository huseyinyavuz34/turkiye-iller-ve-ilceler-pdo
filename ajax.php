          <?php 
          include("db.php");
         if(isset($_POST['il'])){
               if($_POST['il']==0){          ?>
           <option value="0">Lütfen Önce İl Seçiniz</option>
               <?php }else{ ?>
          <option value="0">İlçe Seçiniz</option>
          <?php 
          $il_id=$_POST['il'];
          $ilcesor=$nesse->prepare("SELECT *FROM nesse_ilceler WHERE sehirid=?");
          $ilcesor->execute(array("$il_id"));
          while($ilcediz=$ilcesor->fetch(PDO:: FETCH_ASSOC)){ ?>
          <option value="<?php echo $ilcediz['id']; ?>"><?php echo $ilcediz['ilceadi']; ?></option>
          <?php }
               }
         }
         if(isset($_POST['ilce'])){
          $ilce=$_POST['ilce'];
          $ilcesor=$nesse->prepare("SELECT *FROM nesse_ilceler WHERE id=?");
          $ilcesor->execute(array("$ilce"));
          $ilcediz=$ilcesor->fetch(PDO:: FETCH_ASSOC);
          $ilid=$ilcediz['sehirid'];
          $ilsor=$nesse->prepare("SELECT *FROM nesse_iller WHERE id=?");
          $ilsor->execute(array("$ilid"));
          $ildiz=$ilsor->fetch(PDO:: FETCH_ASSOC);
          echo "Seçilen İl Plaka Kodu:".$ildiz['id']." Seçilen il:".$ildiz['sehiradi']." Seçilen ilçe:".$ilcediz['ilceadi'];
         }


           ?>