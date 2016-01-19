<script type="text/javascript">

  document.addEventListener("DOMContentLoaded", function() {

    // JavaScript form validation

    var checkPassword = function(str)
    {
      var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/;
      return re.test(str);
    };

    var checkForm = function(e)
    {
      if(this.username.value == "") {
        alert("Error: Username cannot be blank!");
        this.username.focus();
        e.preventDefault(); // equivalent to return false
        return;
      }
      re = /^\w+$/;
      if(!re.test(this.username.value)) {
        alert("Error: Username must contain only letters, numbers and underscores!");
        this.username.focus();
        e.preventDefault();
        return;
      }
      if(this.pwd1.value != "" && this.pwd1.value == this.pwd2.value) {
        if(!checkPassword(this.pwd1.value)) {
          alert("The password you have entered is not valid!");
          this.pwd1.focus();
          e.preventDefault();
          return;
        }
      } else {
        alert("Error: Please check that you've entered and confirmed your password!");
        this.pwd1.focus();
        e.preventDefault();
        return;
      }
      alert("Both username and password are VALID!");
    };

    var myForm = document.getElementById("myForm");
    myForm.addEventListener("submit", checkForm, true);

    // HTML5 form validation

    var supports_input_validity = function()
    {
      var i = document.createElement("input");
      return "setCustomValidity" in i;
    }

    if(supports_input_validity()) {
      var usernameInput = document.getElementById("field_username");
      usernameInput.setCustomValidity(usernameInput.title);

      var pwd1Input = document.getElementById("field_pwd1");
      pwd1Input.setCustomValidity(pwd1Input.title);

      var pwd2Input = document.getElementById("field_pwd2");

      // input key handlers

      usernameInput.addEventListener("keyup", function() {
        usernameInput.setCustomValidity(this.validity.patternMismatch ? usernameInput.title : "");
      }, false);

      pwd1Input.addEventListener("keyup", function() {
        this.setCustomValidity(this.validity.patternMismatch ? pwd1Input.title : "");
        if(this.checkValidity()) {
          pwd2Input.pattern = this.value;
          pwd2Input.setCustomValidity(pwd2Input.title);
        } else {
          pwd2Input.pattern = this.pattern;
          pwd2Input.setCustomValidity("");
        }
      }, false);

      pwd2Input.addEventListener("keyup", function() {
        this.setCustomValidity(this.validity.patternMismatch ? pwd2Input.title : "");
      }, false);

    }

  }, false);

</script>
    
<!-- Welcome Page and Registration Form -->

	<!-- Welcome Page Heading -->
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">
			Welcome! 
			</h1>
		</div>
        <!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->

	<!-- Welome Page paragraph and Registration Form -->
	<div class="row">
		
        <!-- Welome Page paragraph -->
        <div class="col-lg-6">
    		<p>
            weclome
        	</p>
    	</div>
        <!-- /.col-lg-6 -->
    	
        <!-- Registration Form -->
    	<div class="col-lg-6">
                   
    		<div class="panel panel-default">
        		
                <!-- Registration Heading -->
                <div class="panel-heading">
            		<h3><i class="fa fa-user fa-fw"></i> Νέος Χρήστης;</h3>
                	<p>Δημιουργήστε λογαριασμό συμπληρώνοντας τα στοιχεία σας στην παρακάτω φόρμα.</p>
            	</div>
                <!-- /.panel-heading -->
            
            	<!-- Registration Form -->
                <div class="panel-body">    	
                    
					<form  action="newuser.php" data-toggle="validator" id="myForm" method="post" >
               	
                		<div class="form-group">
                    		<label class="sr-only" for="exampleInputName">Name</label>
                    		<input type="text" name="onoma" class="form-control" id="exampleInputName" placeholder="Όνομα" required>
                    	</div>
                    	<div class="form-group">
                    		<label class="sr-only" for="exampleInputSurname">Surame</label>
                    		<input type="text" name="epitheto" class="form-control" id="exampleInputSurname" placeholder="Επώνυμο" required>
                    	</div>
                    	<div class="form-group">
                    		<label class="sr-only" for="exampleInputEmail1">Email address</label>
                    		<input type="email" name="email"class="form-control" id="exampleInputEmail1" placeholder="Email"required>
                    	</div>
                    	<div class="form-group">
                    		<label class="sr-only" for="exampleInputUsername">Username</label>
                    		<input  class="form-control" name="username" input id="field_username" 
                                   title="Το όνομα χρήστη δεν πρέπει να είναι κενό και πρέπει να περιέχει μόνο γράμματα και αριθμούς."                                              type="text" required pattern="\w+" name="username" placeholder="Όνομα Χρήστη">
                    	</div>
                    	<div class="form-group">
                    		<label class="sr-only" for="exampleInputPassword1">Password</label>
                    		<input type="password" name="kwdikos" class="form-control" id="field_pwd1" 
                                   title="Ο κωδικός πρέπει να περιέχει τουλάχιστον 6 χαρακτήρες και να περιλαμβάνει Κεφαλαία, μικρά και αριθμούς." type="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" name="pwd1" placeholder="Κωδικός" required>
                    	</div>
                        <div class="form-group">
                    		<label class="sr-only" for="exampleInputPassword1">Password</label>
                    		<input type="password" class="form-control" id="field_pwd2" title="Οι δύο κωδικοί δεν ταιριάζουν" type="password"                                  required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" name="pwd2" placeholder="Κωδικός" required>
                        </div>
                    	
                    	</div>
                      
                    	<button type="submit" class="btn btn-default">Εγγραφή</button>
                        <?php
                    	if (isset($_GET["msg"]) && $_GET["msg"] == 'failed') 
						{
                        	echo "You have registered successfully! You can now log in";
						}
                                    ?>
				
				</div>
                <!-- /.panel-body -->
			</div>
            <!-- ./panel panel-default -->                
		</div>
        <!-- /.col-lg-6 -->
	</div>
	<!-- /.row -->
