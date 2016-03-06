<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');

    // Show PHP errors (during development only)
    error_reporting(E_ALL | E_STRICT);
    ini_set("display_errors", 2);

    // Create a Mongo conenction
    $mongo = new MongoClient("mongodb://localhost");

    // Choose the database and collection
    $db = $mongo->Instahack;
    function getNextSequenceValue($name) {
        $mongo = new MongoClient("mongodb://localhost");
        $db = $mongo->Instahack;
        $coll = $db->counters;
        $s = $coll->findAndModify(
          array("_id"=> $name),
          array('$inc'=>array("sequence_value"=>1))
        );
        return $s["sequence_value"];
    }

if ($_REQUEST['action'] == "findPorters") {
  $coll = $db->porters;
  $cursor = $coll->find(
      array('location' =>
          array( '$near' =>
             array(
               '$geometry' => array(
                  'type' => "Point" ,
                  'coordinates' => array(40, 70) ),
               '$maxDistance'=> 2000
             )
          )
       )
    	);

    	$resultset = $cursor;
      foreach ($resultset as $key => $value) {
        echo $key . " - " . json_encode($value);
      }
} else if ($_REQUEST['action'] == "saveRequest") {
    $arrivalTime = $_REQUEST['arrivalTime'];
    $locationName = $_REQUEST['autoField'];
    $lat = $_REQUEST['latInput'];
    $lon = $_REQUEST['lonInput'];
    $price = $_REQUEST['offeringAmount'];
    $numberOfPorters = $_REQUEST['porterPopulation'];

    $mongo = new MongoClient("mongodb://localhost");

    // Choose the database and collection
    $coll = $db->jobs;


    // Same a document to the collection
    $coll->save(array(
        "_id"=>getNextSequenceValue("job_id"),
        "loc_name" => $locationName,
        "location" => array((float)lat, (float)los),
        "date_time" => $arrivalTime,
        "price" => $price,
        "numberOfPorters" => $numberOfPorters,
        "status" => "open",
        "distance" => 1000
    ));

/*
    set_time_limit(60);
    $distance = 1000;
    for ($i = 0; $i < 10; ++$i) {
      echo "hello" . $i . "<br />";
        //checkPorter($lat, $lon, $distance+=1000);
        sleep(60);
    }
*/
} else if ($_REQUEST['action'] == "getList") {
  $coll = $db->jobs;
  $cursor = $coll->find();
  $resultset = $cursor;
  echo json_encode(iterator_to_array($resultset));
} else if ($_REQUEST['action'] == "getListPorter") {
  $coll = $db->jobs;
  $cursor = $coll->find(
      array('location' =>
          array( '$near' =>
             array(
               '$geometry' => array(
                  'type' => "Point" ,
                  'coordinates' => array((float)$_REQUEST['lat'], (float)$_REQUEST['lon']) ),
               '$maxDistance'=> 1000
             )
          )
       )
    	)->sort(array('date_time'=> -1, 'price'=>-1));

    	$resultset = $cursor;

        echo json_encode(iterator_to_array($resultset));

}else if ($_REQUEST['action'] == "getPorterList") {
  $coll = $db->porters;
  $cursor = $coll->find(
      array('location' =>
          array( '$near' =>
             array(
               '$geometry' => array(
                  'type' => "Point" ,
                  'coordinates' => array((float)$_REQUEST['lat'], (float)$_REQUEST['lon']) ),
               '$maxDistance'=> 1000
             )
          )
       )
    	);

    	$resultset = $cursor;

        echo json_encode(iterator_to_array($resultset));

}

    //var_dump($result);


    //var_dump($a);

?>
