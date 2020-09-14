<?php include 'header.php';?>
<?php include 'bodycontent.php';?>
  <div class="row">
    <div class="col s12 m4">
      <div class="card">
        <div class="card-image">
          <?php
         echo'
         <img  src="images/'.$data['image'].'" alt="" class="circle responsive-img" height="" width="">';
         ?>
          <span class="card-small"><?php echo $data['doctor_first_name']."&nbsp&nbsp". $data['doctor_last_name'] ;?></span>
        </div>
        <div class="card-small">
          <p><?php echo $data['specialist_name']."-".$data['description'];?></p>
        </div>
        <div class="card-action">
          <a href="doctor.php?doctor=<?php echo $data['doctor_id']; ?>" class="btn teal darken-4">View More</a>
        </div>
      </div>
    </div>
     <?php }} ?>
