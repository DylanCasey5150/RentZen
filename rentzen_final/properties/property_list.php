<?php include '../view/header.php'?>
 <div class='container' >
    <div class='row' id="divrow">
        <?php foreach($searchedprop as $s): ?>
            <div class="col-md-4">
                <div class="img-thumnail">
                <a href='index.php?id=<?php echo $s['property_id']?>'>
                <?php echo ucwords($s['street']); ?><br>
                    <img class="img-fluid rounded" style="width: 100%" src="<?php echo $s['picture'];?>" alt="home">
                </a>
                </div>
            </div><br>
        <?php endforeach;?>
        
    </div>
</div>

<?php include '../view/footer.php'?>