<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script>
            $.get( "./includes/script.php?api=data", function( data ) {
                for (var index = 0; index < data.toplists["575"].length; index++) {
                     $("#json_response").append( 
                        "<tr>"+
                            "<th>"+
                                "<img src="+ data.toplists["575"][index].logo + ">"+
                                "<a href=./brand_id>Review</a>"+
                            "</th>"+
                        "<td>"+
                            "<span class=fa fa-star checked></span>"+
                            "<span class=fa fa-star checked></span>"+
                            "<span class=fa fa-star checked></span>"+
                            "<span class=fa fa-star></span>"+
                            "<span class=fa fa-star></span>"+
                            "<p>"+data.toplists["575"][index].info.rating +"</p>"+
                            "<p>"+data.toplists["575"][index].info.bonus +"</p>"+
                            "</td>"+
                        "<td>"+data.toplists["575"][index].info.features +"</td>"+
                        "<td>"+data.toplists["575"][index].play_url +"</td></tr>"
                    );
                }
                });
                
        </script>
    </head>
    <body>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Casino</th>
      <th scope="col">Bonus</th>
      <th scope="col">Features</th>
      <th scope="col">Play</th>
    </tr>
  </thead>
  <tbody id="json_response">
    
    
  </tbody>
</table>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    
</html>