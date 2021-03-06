<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="stylesheet" href="./style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script><script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script>
            //method get using Jquery to extract de data
            $.get( "./includes/script.php?api=data", function( data ) {
                //sort array per position and use only "575"
                var dataSort = data.toplists["575"].sort(function(a,b){
                    return a.position < b.position ? -1 :1
                })
                //for loop to duplicate the row, as many times as necessary
                for (var index = 0; index < dataSort.length; index++) {
                    
                     $("#json_response").append( 
                    "<tr>"+
                            "<th class=column>"+
                                "<a href=./brand_id>"+
                                "<img src="+ dataSort[index].logo + ">"+
                                "Review</a>"+
                            "</th>"+
                        "<td>"+
                        "<p class=rating"+dataSort[index].info.rating+" data-default-value="+dataSort[index].info.rating+">"+
                            "<img src=./img/star.png data-value=1 class=img-responsive>"+
                            "<img src=./img/star.png data-value=2 class=img-responsive>"+
                            "<img src=./img/star.png data-value=3 class=img-responsive>"+
                            "<img src=./img/star.png data-value=4 class=img-responsive>"+
                            "<img src=./img/star.png data-value=5 class=img-responsive>"+
                        "</p>"+
                            "<p>"+dataSort[index].info.bonus +"</p>"+
                            "</td>"+
                        "<td class=listItem id=list"+dataSort[index].brand_id+"></td>"+
                        "<td>"+
                            "<button type=button onclick=window.location.href='"+dataSort[index].play_url+"'>PLAY NOW</button>"+
                            "<p>"+dataSort[index].terms_and_conditions +"</p>"+
                        "</td>"+
                    "</tr>"

                    );
                    //for the rating stars I make a loop to add the stars
                    var count = $(".rating"+dataSort[index].info.rating+"").data('defaultValue');
                    for(var i = 1; i <= count; i++){
                        $('.rating'+count+' > img[data-value=' + i + ']').attr("src","./img/star-fill.png");
                    }
                    //for the list of features use split to separate it by commas
                    var string = dataSort[index].info.features.toString().split(',');
                    for(var i = 0; i < string.length; i++){
                        $("#list"+dataSort[index].brand_id+"").append("<li>"+string[i]+"</li>");
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