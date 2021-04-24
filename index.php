<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="stylesheet" href="./style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script><script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script>
            $.get( "./includes/script.php?api=data", function( data ) {
                for (var index = 0; index < data.toplists["575"].length; index++) {
                    var string = data.toplists["575"][index].info.features.toString().split(',');
                    
                     $("#json_response").append( 
                    "<tr>"+
                            "<th class=column>"+
                                "<img src="+ data.toplists["575"][index].logo + ">"+
                                "<a href=./brand_id>Review</a>"+
                            "</th>"+
                        "<td>"+
                        "<p class=rating"+data.toplists["575"][index].info.rating+" data-default-value="+data.toplists["575"][index].info.rating+">"+
                            "<img src=./img/star.png data-value=1 class=img-responsive>"+
                            "<img src=./img/star.png data-value=2 class=img-responsive>"+
                            "<img src=./img/star.png data-value=3 class=img-responsive>"+
                            "<img src=./img/star.png data-value=4 class=img-responsive>"+
                            "<img src=./img/star.png data-value=5 class=img-responsive>"+
                        "</p>"+
                            "<p>"+data.toplists["575"][index].info.bonus +"</p>"+
                            "</td>"+
                        "<td id=list"+data.toplists["575"][index].brand_id+"></td>"+
                        "<td>"+
                            "<button type=button onclick=window.location.href='"+data.toplists["575"][index].play_url+"'>PLAY NOW</button>"+
                            "<p>"+data.toplists["575"][index].terms_and_conditions +"</p>"+
                        "</td>"+
                    "</tr>"

                    );

                    var count = $(".rating"+data.toplists["575"][index].info.rating+"").data('defaultValue');
                    for(var i = 1; i <= count; i++){
                        $('.rating'+count+' > img[data-value=' + i + ']').attr("src","./img/star-fill.png");
                    }
                    for(var i = 0; i < string.length; i++){
                        $("#list"+data.toplists["575"][index].brand_id+"").append("<li>"+string[i]+"</li>");
                    }
                }
                });
                
                
                
        </script>
    </head>
    <body>
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Casino</th>
                    <th scope="col">Bonus</th>
                    <th scope="col">Features</th>
                    <th scope="col">Play</th>
                    </tr>
                </thead>
                <tbody id="json_response"></tbody>
            </table>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    
</html>