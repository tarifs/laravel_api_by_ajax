<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

</head>
<body>
    <div class="container">
        <h2>File Uploading System</h2>
        <br>
        <div class="alert" id="message" style="display: none"></div>
        <form method="post" id="upload_form" enctype="multipart/form-data">
            @csrf
            <div>
                <label>Name :</label>
                <input type="text" name="name" id="name">
            </div><br>
            <div>
                <label>Email :</label>
                <input type="text" name="email" id="email">
            </div><br>
            <div>
                <label>File :</label>
                <input type="file" name="image" id="image">
            </div><br>
            <span id="success_message"></span>
            <input type="submit" name="upload" id="upload" class="btn btn-primary" value="Upload">
        </form>
        <br />
    <span id="uploaded_image"></span>
    </div>
</body>
</html>
<script>
    $(document).ready(function(){

       $('#upload_form').on('submit', function(event){
          event.preventDefault();
          $.ajax({
             url:"http://127.0.0.1:8000/api/post",
             method:"POST",
             data:new FormData(this),
             dataType:'JSON',
             contentType: false,
             cache: false,
             processData: false,
             success:function(data)
             {
                $('#message').css('display', 'block');
                $('#message').html(data.message);
                $('#uploaded_image').html(data.uploaded_image);

            }

        })
      });
   });
</script>
