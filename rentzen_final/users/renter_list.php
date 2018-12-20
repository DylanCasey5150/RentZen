<?php include '../view/header_renter.php'?>

<div>
    <h2>Renter Dashboard</h2>
    

<div class="row justify-content-md-center"> <!--Variable width content BS4-->
    
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Pending Rental Applications</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Your Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="pending-app-tab">...

              </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <form>
                <div class="form-group row">
                  <label for="credit_score" class="col-sm-2 col-form-label">Your name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="credit_score" placeholder="Credit Score">
                  </div>
                </div>    
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                    </div>
                </div>
                    
                <div class="form-group row">
                  <label for="credit_score" class="col-sm-2 col-form-label">Credit Score</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="credit_score" placeholder="Credit Score">
                  </div>
                </div>
                
                <div class="form-group row">
                  <label for="credit_score" class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="credit_score" placeholder="Credit Score">
                  </div>
                </div>    
            
                your name: 
            Your phone:
            Your email:
                </form>
            </div>
              <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
            </div>

    </div>
    <div class="col-md-1"></div>
</div>
    </div>
     
<?php include '../view/footer.php'?>