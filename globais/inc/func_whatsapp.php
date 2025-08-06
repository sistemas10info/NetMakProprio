<?php
function verificar_numero_conectado($Xid_key,$Xnumero_celular) 
{

// API URL
// $Xnumero_celular="554799800801";

// echo $Xid_key." - ".$Xnumero_celular;

if (strlen($Xnumero_celular)==13 and substr($Xnumero_celular,0,2)=="55")
{
    $Xnumero_celular=trim(substr($Xnumero_celular,0,4).substr($Xnumero_celular,5,8));
    // echo "----".$Xnumero_celular;
}
$ser3=executeQuery("select * from servidores_whatsapp where id_key='".$Xid_key."' limit 1");

$url = $ser3['ip_url'].":".$ser3['porta_api']."/auth";

// Create a new cURL resource
$ch = curl_init($url);

// Setup request to send json via POST
$data =array('hash' => $Xnumero_celular);

$data2 = 'hash='.$Xnumero_celular;

$app_key=array('app_key' => $ser3['app_key']);

// print_r($data);

$payload = json_encode(array('hash' => $Xnumero_celular)); // json_encode($data); // json_encode(array("user" => $data));

// Xprint_r("Payload",$payload,false);

// $payload =('"hash" : ' . $Xnumero_celular);

/*
echo "Payload...";
print_r($payload);
*/

// Attach encoded JSON string to the POST fields
// curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true); 
curl_setopt($ch, CURLINFO_HEADER_OUT, true);

curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

// curl_setopt($ch, CURLOPT_POSTFIELDS, $data2);
// curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

// Set the content type to application/json

// curl_setopt($ch, CURLOPT_HTTPHEADER,array('authorization: '.$ser3['app_key']));

// Return response instead of outputting
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the POST request
$result = curl_exec($ch);

// Close cURL resource
curl_close($ch);

$json = json_decode($result, true);

// print_r($json);

// print_r($result);
/*
echo "Auth:".substr($json['message']['base64img'],0,10)." - ".strlen($json['message']['base64img'])."<BR><HR>";
echo $result;
*/

$Xreturn=[];

/*
if ($json['auth']===true) echo "sim";
else								echo "Não" ;
*/

// echo "Auth..... - ".$json['auth'];

if ($json['auth']===true) 
{
    $Xreturn['conectado']=true;
    $Xreturn['qrcode']="";
}
else
{
    $Xreturn['conectado']=false;
    $Xreturn['qrcode']=$json['base64img'];
}

// Xprint_r("Return",$Xreturn,false);

return $Xreturn;

}

function base64_to_file( $base64_string, $output_file ) 
{
    $Xoutput=QRCODE."IM_".$output_file.".png";
    $Xoutput2=QRCODE_SITE."IM_".$output_file.".png";
    $Xbase64_string=explode(',',$base64_string);
    $ifp = fopen( $Xoutput, "wb" ); 
    fwrite( $ifp, base64_decode( $Xbase64_string[1]) ); 
    fclose( $ifp ); 
    return( $Xoutput2 ); 
}

function logout_whatsapp($Xid_key,$Xnumero_celular)
{

// API URL
// $Xnumero_celular="554799800801";

if (strlen($Xnumero_celular)==13 and substr($Xnumero_celular,0,2)=="55")
{
    $Xnumero_celular=trim(substr($Xnumero_celular,0,4).substr($Xnumero_celular,5,8));
    // echo "----".$Xnumero_celular;
}

$ser3=executeQuery("select * from servidores_whatsapp where id_key='".$Xid_key."' limit 1");

////


$url = $ser3['ip_url'].":".$ser3['porta_api']."/logout";

// Create a new cURL resource
$ch = curl_init($url);

// Setup request to send json via POST
$data =array('hash' => $Xnumero_celular);

$data2 = 'hash='.$Xnumero_celular;

$app_key=array('app_key' => $ser3['app_key']);

// print_r($data);

$payload = json_encode(array('hash' => $Xnumero_celular)); // json_encode($data); // json_encode(array("user" => $data));

/////

// Attach encoded JSON string to the POST fields
// curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true); 
curl_setopt($ch, CURLINFO_HEADER_OUT, true);

// curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

curl_setopt($ch, CURLOPT_POSTFIELDS, $data2);

// Set the content type to application/json


curl_setopt($ch, CURLOPT_HTTPHEADER,array('authorization: '.$ser3['app_key']));

// Return response instead of outputting
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the POST request
$result = curl_exec($ch);

// Close cURL resource
curl_close($ch);

$json = json_decode($result, true);

print_r($json);

// echo "Auth:".substr($json['message']['base64img'],0,10)." - ".strlen($json['message']['base64img'])."<BR><HR>";

// print_r($result);

$Xreturn=[];

if ($json['auth']===true) echo "sim";
else								echo "Não" ;

// echo " - ".$json['auth'];

// print_r($json);

if ($json['auth']===false) 
{
    $Xreturn['conectado']=false;
    $Xreturn['qrcode']=$json['base64img'];
}
else
{
    $Xreturn['conectado']=true;
    $Xreturn['qrcode']="";
}

// Xprint_r("Return",$Xreturn,false);

return $Xreturn;

}

function envia_whatsapp($Xid_key_servidor,$Xnumero_celular,$Xdestinatario,$Xmensagem)
{

// API URL
$ser3=executeQuery("select * from servidores_whatsapp where id_key='".$Xid_key_servidor."' limit 1");

/*
$ser3['ip_url']="http://143.198.23.125";
$ser3['porta_api']="3000";
$ser3['app_key']="abc123@4";
*/

$url = $ser3['ip_url'].":".$ser3['porta_api']."/sendMessage";

// Create a new cURL resource
$ch = curl_init($url);

// Setup request to send json via POST
// $data =array('number' => $Xnumero_celular, 'bodyMessage' => $Xmensagem, 'sender' => $Xdestinatario);
// $data =array('hash' => $Xnumero_celular, 'bodyMessage' => $Xmensagem, 'sender' => $Xdestinatario);

$data =array('hash' => $Xnumero_celular, 'number' => $Xnumero_celular,'bodyMessage' => $Xmensagem, 'sender' => $Xdestinatario);

/*
echo "Data...";
print_r($data);
*/

$data2 = 'number='.$Xnumero_celular;

$app_key=array('app_key' => $ser3['app_key']);

$data2=http_build_query($data); // carlos aqui

// print_r($data);

$payload = json_encode($data); // json_encode(array("user" => $data));

// Attach encoded JSON string to the POST fields
// curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true); 
curl_setopt($ch, CURLINFO_HEADER_OUT, true);

// curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

curl_setopt($ch, CURLOPT_POSTFIELDS, $data2);

// Set the content type to application/json

curl_setopt($ch, CURLOPT_HTTPHEADER,array('authorization: '.$ser3['app_key']));

// Return response instead of outputting
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the POST request
$result = curl_exec($ch);

// Close cURL resource
curl_close($ch);

$json = json_decode($result, true);


/*
echo "Json....";
print_r($json);
echo "<HR>";
*/

// echo "Auth:".substr($json['message']['base64img'],0,10)." - ".strlen($json['message']['base64img'])."<BR><HR>";

// print_r($result);

$Xreturn=[];

if (@$json['auth']===false) 
{
    $Xreturn['conectado']=false;    
    $Xreturn['qrcode']=$json['base64img'];
    $Xreturn['status']=$json['status'];
}
else
{
    $Xreturn['conectado']=true;
    $Xreturn['status']=$json['status'];
    $Xreturn['qrcode']=".";
}

// Xprint_r("Return",$Xreturn,false);

return $Xreturn;

}

?>

