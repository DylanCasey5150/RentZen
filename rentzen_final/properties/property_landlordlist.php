<?php
//include all database configuration and functions
include '../view/header.php';
?>
 
   
<div class ="container">
    <div class ='row'>    
        <div class="col-md-1"></div>
        <div class="col-md-4">
        <div class="text-center">
         <h5>Location</h5>
         </div>
        </div>
        <div class="col-md-3">
            <div class="text-center">
            
         <h5>Occupancy</h5>
            </div>
        </div>
        <div class="col-md-3">
            <div class="text-center">
            <h5>Action</h5>
            </div>
        </div>
        
    </div>
  <?php foreach($landproperties as $l):?>
    
    <div class ='row'>
        <div class="col-md-1"></div>
        <div class="col-md-4">
            <div class="text-center">
            <a href ='index.php?lid=<?php echo $l['property_id'];?>'><p><?php $prstreet = $l['street'];
                    echo ucwords($prstreet);?></p></a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="text-center">
        <p><?php  $proccu = $l['propertystat'];
        echo ucfirst($proccu)?></p>
            </div>
        </div>
        <div class="col-md-3">
         <form action='../properties/index.php' method='post'> 
             <?php $propid = $l['property_id']?>
            <input type ='hidden' name='propid' id='propid' value='<?php echo $propid;?>'>
            <?php if ($proccu != "listed"){
            echo "<button name='list' id='list' class='btn btn-info'>List Property</button>"
                ;}
            else if ($proccu = "listed"){
                echo "<button name='remove' id='remove' class='btn btn-danger'>Remove Listing</button>";}
            ?>
            <button name='edit' id='list' class='btn btn-primary'>Edit</button>
         </form>
        </div>
        <div class="col-md-1"></div>
    </div>
    
          <?php endforeach; ?>
   <div class ='row'> 
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <a href="<?php echo $base_path;?>/properties/index.php?prop_add" id="manage" name="manage" class="btn btn-info btn-block">Add a property</a>
        </div>
        </div>
        <div class="col-md-1"></div>
    
    </div>
<?php include '../view/footer.php'?>

