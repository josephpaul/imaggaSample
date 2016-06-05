<?php


if(isset($_REQUEST['pic'])&&$_REQUEST['pic']!="")
{

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "http://api.imagga.com/v1/tagging?url=".$_REQUEST['pic']."&version=2",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "accept: application/json",
        "authorization:<You code here>" // Replace your code here. 
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
      $res['status']='failed';
      $response['msg']='Error occured';
    } else {
      // echo $response;
      $res['status']='success';
      $res['msg']=$response;
    }

echo json_encode($res);exit;

}

?>