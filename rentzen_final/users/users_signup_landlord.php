<?php include '../common/configuration.php'?>
<?php include '../view/header.php'?>
    <br>
    <script>
                "use strict";
                
		var validate = function(event){
                    
                    var username = $('#username').val();
                    var password = $('#password').val();
                    var error_message = '';
                    
                    $('#message').html('');
                    
                    if (username === "" || username.length < 2)
                            {
                            error_message += "<li>You must provide a user name.</li>";
                            }
                    if (password === "" || password.length < 2)
                            {
                            error_message += "<li>You must provide a password.</li>";
                            }
                            
                    if (error_message !== ''){
                        event.preventDefault();
                        $('#message').append("<div class='alert alert-danger'><ul>" + error_message + "</ul></div>");
                        }        
                            
		};

                //tell the browser what to do when the document gets loaded
                
                $(document).ready(function() {

                    $("#form1").submit(function(event){
                        validate(event);
                       }
                    ); //end submit 

                }); // end ready
	</script>
    <h2 class="text-center"> Landlord Sign up</h2>

<div class="container-fluid">
    <div class="row justify-content-md-center"> <!--Variable width content BS4-->
        
        <div class="col col-md-3"></div>
        <div class="col-md-6"> <!--variable width content-->
        <form action="index.php" method="post" id="form1">

        <div id="data">
            <div class="form-group">
                <label for="username">Email</label>
                <input type="email" class="form-control" placeholder="Email" name="usernameL" id="username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="Password" name="passwordL" id="password">
            </div>
        </div>

        <div id="buttons" class="text-center">
            <input class="btn btn-primary" type="submit" value="Sign up" name="confirmationL"><br>
        </div>

            <div id="message">
                <?php echo $message;?>
            </div> 
        </form>    
        </div>
        
        <div class="col col-md-3"></div>


    </div>    
</div>
<?php include '../view/footer.php'?>