<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Font Icon -->
    <link rel="stylesheet" >

    <!-- Main css -->
    <link rel="stylesheet" >
</head>

<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>


<table style="width:50%">
  <tr>
    <th>Id</th>
    <th>Name</th> 
    <th>Price</th>
  </tr>
  <?php foreach($data as $key => $value): ?> 
    <tr>    
      <td><?=$value->id;?></td>
      <td><?=$value->name;?></td>
      <td><?=$value->price;?></td>                   
    </tr>
<?php endforeach; ?>
</table>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
                        <h2 class="form-title\">Add sevices</h2>
                        <hr>
                        <form action = "#" method="POST" class="register-form" id="register-form">
                        @if(Session::has('success'))
                        <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif
                        @if(Session::has('fail'))
                        <div class="alert alert-danger">{{Session::get('fail')}}</div>
                        @endif
                        @csrf 
                            <div class="form-group">
								<label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
								<input type="text" class="form-control" name="name" id="name" value="{{old('name')}}" placeholder="Ниаменование услуги"/>
                                <span class="text-danger">@error('name'){{$message}}@enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="price"><i class="zmdi zmdi-email"></i></label>
                                <input type="text" class="form-control" name="price" id="price" value="{{old('price')}}" placeholder="Стоимость услуги"/>
                                <span class="text-danger">@error('price'){{$message}}@enderror</span>
                            </div><br>
                           
                            <div class="form-group">
                                <button class="btn btn-block btn-primary" type="submit" value="Register">Отправить</button> 
                            </div>
                        </form>
                    </div>
                   
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="js/jquery.min.js"></script>
    <script> 
$(document).ready(function() {
  // Handle form submission
  $('#myForm').submit(function(event) {
    event.preventDefault(); // Prevent the default form submission

    // Get the form values
    var name = $('#name').val();
    var email = $('#price').val();

    // Create an object with the form data
    var formData = {
      name: name,
      price: price
    };

    // Send a POST request to the server
    $.ajax({
      url: '/api/services', // Replace with your actual API endpoint
      type: 'POST',
      data: formData,
      success: function(response) {
        // Update the table with the new item
        var newRow = '<tr><td>' + response.name + '</td><td>' + response.price + '</td></tr>';
        $('#myTable tbody').append(newRow);

        // Reset the form
        $('#myForm')[0].reset();
      },
      error: function() {
        alert('Error occurred while submitting the form.');
      }
    });
  });
});

</script>
    <script src="js/main.js"></script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</html>