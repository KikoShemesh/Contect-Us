<?php
  $errorMsg = "";
if($_POST)
{
  
    if(!$_POST["emailId"])
    {
        $errorMsg .= "your email address is not valid";

    }
    if(!$_POST["subjectId"])
    {
        $errorMsg .= "<p>subjet is required<br>";

    }
    if(!$_POST["textAreaId"])
    {
        $errorMsg .= "<p>text is required<br>";

    }

    if (filter_var($_POST["emailId"], FILTER_VALIDATE_EMAIL) == false) {
        
        $errorMsg .= "your email address is not valid";
      }

      
      
      if($errorMsg != "")
      {
      $errorMsg = '<div class="alert alert-danger" role="alert"><p><strong>there some error(s) in the form: </strong></p>'.$errorMsg.'</div>';
      //echo $errorMsg."bla bla";
    }
        else{
        $emailTo = "kiko.shemesh@gmail.com";
        $subject = $_POST["subjectId"];
        $body = $_POST["textAreaId"];
        $header = "from: ".$_POST["emailId"];

        if (mail($emailTo,$subject,$body,$header)){

            echo "the email sent successfully!";
        }
        else{
            echo "the email failed!";
        }
        
         }

    

    }


//print_r($_POST);

?>


<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  
</head>
  <body>
  <div class="container">
      <h1>Contect us!</h1>
      <div id="errorDiv"> <?php echo $errorMsg; ?> </div>
      <form method="POST">
  <div class="form-group">
    <label for="emailId">Email address</label>
    <input type="email" name="emailId" class="form-control" id="emailId" placeholder="name@example.com">
  </div>
  <div class="form-group">
    <label for="subjectId">Subject</label>
    <input type="text" name="subjectId" class="form-control" id="subjectId">
  </div>

  <div class="form-group">
    <label for="textAreaId">What would you want to ask?</label>
    <textarea class="form-control" name="textAreaId" id="textAreaId" rows="6"></textarea>
  </div>
  <button type="submit"  id="submitBtn" class="btn btn-primary">Submit</button>

    </form>
</div>
<script>
   

/* 
Client Side validation - 
make our script a little nicer to use, the user not need to wait for 
the form to submit and the page to reload
*/
 $("#submitBtn").click(function() {
    event.preventDefault();
    var error = "";
    function isEmail(email) {
                    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                    return regex.test(email);
                }
    if($("#subjectId").val()==""){
        error += "<p>subjet is required<br>";
    }

if($("#textAreaId").val()==""){
        error += "Contect is required<br>";
    }
    if (isEmail($("#emailId").val()) == false) {

error += "your email address is not valid";

}
if(error != "")
{
$("#errorDiv").html('<div class="alert alert-danger" role="alert"><p><strong>there some error(s) in the form: </strong></p>'+error+'</div>'
);
}
else{
    $("form").unbind("submnit").submit();
}






        });



</script>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>