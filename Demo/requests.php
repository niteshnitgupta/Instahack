<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>INSTAVANS</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/user-table.css">
        <style type="text/css">
            
            .inner-bg {
                /*! background: whitesmoke; */
            }
            .form-top p {
                text-align: center;
                color: #111;
                padding: 1em;
                font-weight: bolder;
            }
        
        </style>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>

            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <link rel="shortcut icon" href="assets/ico/fav.png">
    </head>
    <body>

        <!-- Top menu -->
        <nav class="navbar navbar-inverse navbar-no-bg" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html">INSTAVANS</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="top-navbar-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
<!--                             <span class="li-text">
                                Put some text or
                            </span> 
                            <a href="#"><strong>About Us</strong></a> 
                            <span class="li-text">
                                here, or some icons: 
                            </span> 
 -->                            <span class="li-social">
                                <a href="#"><i class="fa fa-facebook"></i></a> 
                                <a href="#"><i class="fa fa-twitter"></i></a> 
                                <a href="#"><i class="fa fa-envelope"></i></a> 
                                <a href="#"><i class="fa fa-skype"></i></a>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Top content -->
        <div class="top-content">
            
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="table-users">
                            <div class="header">Porter Requests</div>
                            <div id='appendable'>
                            </div>
                        </div>
                    </div><!-- row -->
                </div><!-- container -->
            </div><!-- inner bg -->
            
        </div>

        <!-- Javascript -->
        <script src="https://code.jquery.com/jquery-1.12.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
        <script src="assets/js/retina-1.1.0.min.js"></script>
        <script>
            $(document).ready(function() {
                $.getJSON('http://192.168.6.167:8888/Instahack/porter_server.php?action=getList',function(data) {
                var toAppend = '<table><tr><th>User Pic</th><th>Date</th><th>Job#</th><th>Location</th><th>Status</th><th>Porter ID</th><th>Porter Name</th><th>Arrival Time</th></tr>';
                    $.each(data, function (key, val) {
                        if(val.porterId == undefined) {
                            val.porterId = '-';
                        }
                        if(val.porterName == undefined) {
                            val.porterName = '-';
                        }
                        if(val.porterId == undefined) {
                            val.porterName = '-';
                        }

                        toAppend += '<tr><td><img src="assets/img/user.jpg" alt="user pic" /></td><td>'+val.date_time+'</td><td>'+val._id+'</td><td>'+val.loc_name+'</td><td>'+val.status+'</td><td>'+val.porterId+'</td><td>'+val.porterName+'</td><td>'+val.date_time+'</td></tr>';
                        console.log(toAppend);
                    });
                    toAppend +='</table>';
                    console.log(toAppend);
                    $('#appendable').html(toAppend);
                });
            });
        </script>
        <script src="assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>