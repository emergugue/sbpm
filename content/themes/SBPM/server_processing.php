<?php

$data={
  "data": [
    
    [
      "Jonas Alexander",
      "Developer",
      "San Francisco",
      "8196",
      "2010/07/14",
      "$86,500"
    ],
    [
      "Shad Decker",
      "Regional Director",
      "Edinburgh",
      "6373",
      "2008/11/13",
      "$183,000"
    ],
    [
      "Michael Bruce",
      "Javascript Developer",
      "Singapore",
      "5384",
      "2011/06/27",
      "$183,000"
    ],
    [
      "Donna Snider",
      "Customer Support",
      "New York",
      "4226",
      "2011/01/25",
      "$112,000"
    ]
  ]
};

$json_data = array(
                "draw"            => 4,
                "recordsTotal"    => 4,
                "recordsFiltered" => 4,
                "data"            => $data
            );
echo json_encode($json_data);

?>
