	<?php 
    include("db.php");
    
    	 ?>
    	 <!DOCTYPE html>
    	 <html>
    	 <head>
    	 	<meta charset="utf-8">
    	 	<meta name="viewport" content="width=device-width, initial-scale=1">
    	 	<meta charset="utf-8">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    	 	<title>Güncel Türkiye İller ve İlçeler - Hüseyin YAVUZ</title>
    	 </head>
    	 <body>

            <br>
            <select id="il" name="il" class="form-select">
                <option value="0">Lütfen İl Seçiniz</option>
                <?php 
                $ilsor=$nesse->prepare("SELECT *FROM nesse_iller ORDER BY id ASC");
                $ilsor->execute();
                while($ildiz=$ilsor->fetch(PDO:: FETCH_ASSOC)){
                    if($ildiz['id']<10){
                $plaka="0".$ildiz['id'];
                    }else{
                $plaka=$ildiz['id'];
                    }

                 ?>
                <option value="<?php echo $ildiz['id']; ?>"><?php echo $plaka." ". $ildiz['sehiradi']; ?></option>
            <?php } ?>
            </select>  
            <br>
            <select id="ilce" name="ilce" class="form-select">
                <option>Lütfen Önce İl Seçiniz</option>
            </select>
            <br>
                <div id="sonuc"></div>
                    <br>
                    <b>Son Güncelleme:</b> 20 Kasım 2022 16:58

    	       <script type="text/javascript">
                 document.getElementById("ilce").disabled = true;
                 
                $('#il').on('change', function() {  
                 $("#sonuc").hide();   
               var il = $(this).val();
               if(il==0){
              document.getElementById("ilce").disabled = true;
               }else{
              document.getElementById("ilce").disabled = false;
               }
              $.ajax({
               type:'POST',
               url:'ajax.php',
               data:"il="+il,
               success:function(ilcecevap){
                        $('select[name="ilce"]').html(ilcecevap)
               }
       });           
                    }); 

                 $('#ilce').on('change', function() {  
                  $("#sonuc").show();    
                 var ilce=$(this).val();
                $.ajax({
               type:'POST',
               url:'ajax.php',
               data:"ilce="+ilce,
               success:function(sonuc){
                        $('#sonuc').html(sonuc)
               }
                });  
                 });  
               </script>
  
    	 </body>
    	 </html>