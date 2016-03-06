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
        <link rel="stylesheet" href="assets/css/jquery.datetimepicker.css">
        <link rel="stylesheet" href="assets/css/style.css">

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
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                            <div class="form-top">
                                <div class="form-top-left">
                                    <h3>Find a Porter</h3>
                                    <p>Fill in the form below to find best matches:</p>
                                </div>
                                <div class="form-top-right">
                                    <i class="fa fa-truck"></i>
                                </div>
                            </div>
                            <div class="form-bottom contact-form">
                                <form role="form" action="api.php" method="post">
                                    <div class="form-group">
                                        <label class="form-element" for="autoField"><span class="fa fa-map-marker"></span>&nbsp;Location</label>
                                        <div>
                                            <input type="text" name="autoField" placeholder="Location..." class="location form-control" id="autoField">
                                            <span>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mapsModal" id="showMapBtn" name="showMapButton">
                                                  <span class="fa fa-map-marker"></span>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-element" for="arrivalTime"><span class='fa fa-calendar'></span>&nbsp;Arrival Time</label>
                                        <input type="text" name="arrivalTime" placeholder="Select Time..." class="contact-subject form-control" id="arrivalTime">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-element" for="porterPopulation"><span class='fa fa-calendar'></span>&nbsp;Porters Required</label>
                                        <input type="number" name="porterPopulation" placeholder="Select Time..." class="contact-subject form-control" id="porterPopulation">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-element" for="contact-message"><span class='fa fa-rupee'></span>&nbsp;Amount Offered</label>
                                        <input type="text" name="offeringAmount" placeholder="Amount in Rupees..." class="offering-amount form-control" id="offeringAmount">
                                    </div>
                                    <input type='hidden' name='action' id='action' value='saveRequest' />
                                    <input type='hidden' name='lonInput' id='lonInput' value='' />
                                    <input type='hidden' name='latInput' id='latInput' value='' />
                                    <input type="submit" value="Submit" class="btn">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

        <!-- Modal for google Maps -->
        <!-- Button trigger modal -->
        <!-- Modal -->
        <div class="modal fade" id="mapsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
<!--                         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
 -->                    </div>
                    <div class="modal-body">
                        <div id="map"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal for google maps ends here -->


        <!-- Javascript -->
        <script src="https://code.jquery.com/jquery-1.12.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/retina-1.1.0.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
        <script src="assets/js/jquery.datetimepicker.full.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        <script src="assets/js/controler.js"></script>

<!--        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyADe7CRljWV4ka1OmCcjIXFbzR9jF9jOso&callback=initMap"
        async defer></script> -->

        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>