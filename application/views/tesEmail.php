<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <h1>Hello, world!</h1>
    <button type="buttonn" class="btn btn-success" id="btn-send-email">Send Email</button>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">First</th>
          <th scope="col">Last</th>
          <th scope="col">Email</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><input type="checkbox" class="checkBoxClass" name="record"></td>
          <td>Mark</td>
          <td>Otto</td>
          <td id="email">ramadhan071thea@gmail.com</td>
        </tr>
        <tr>
          <td><input type="checkbox" class="checkBoxClass" name="record"></td>
          <td>Jacob</td>
          <td>Thornton</td>
          <td id="email">ramadhan070thea@gmail.com</td>
        </tr>
        <tr>
          <td><input type="checkbox" class="checkBoxClass" name="record"></td>
          <td>Larry</td>
          <td>the Bird</td>
          <td id="email">muhamadramadhan3199@gmail.com</td>
        </tr>
      </tbody>
    </table>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript">
      $("#btn-send-email").click(function(){
        let chkboxes = $('.checkBoxClass');
        let obj = [];
        for(let i = 0; i < chkboxes.length; i++) {
          if (chkboxes[i].checked) {
            let parentTr = chkboxes[i].parentNode.parentNode; 
            
            let email = $(parentTr)[0].children[3].innerHTML;
            
            let objTemp = {
              'chk': true,
              email
            }
            obj.push(objTemp)
          }
        }
        console.log(obj);

        $.ajax({
          url: '<?= base_url('TesEmail/sendEmail') ?>',
          type: 'post',
          dataType: 'json',
          data: {
            'data': JSON.stringify(obj),
          },
          success: function(result) {
            console.log(result);
          },  

        });
      });
    </script>
  </body>
</html>