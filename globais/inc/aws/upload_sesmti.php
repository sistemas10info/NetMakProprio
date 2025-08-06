<?php 

require __DIR__.'/vendor/autoload.php';

use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

// $bucket  = 'digitalizadorpro';
// $bucket  = 'telip';
$bucket  = 'sesmti';

$keyname = 'image.jpg';

$filepath = 'image.jpg';

/*
$s3 = S3Client::factory(array(
  'version' => 'latest',
  'region'  => 'us-west-2',
  'credentials' => array(
    'key'     => 'AKIAJH2CNFJD7XTLX55A',
    'secret'  => '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'
  )
));
*/

/*
$s3 = Aws\S3\S3Client::factory(array(
          'version' => 'latest',
          'region'  => 'us-west-2',
          'credentials' => array(
              'key'     => 'AKIAIS5YEETDVEJGTJWA',
              'secret'  => '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'
          )
        ));
*/

       $s3 = Aws\S3\S3Client::factory(array(
          'version' => 'latest',
          'region'  => 'us-west-2',
          'credentials' => array(
              'key'     => 'AKIAI77IJJQFGKJN6RCQ',
              'secret'  => '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'
          )
        ));


try {
    $result = $s3->putObject(array(
        'Bucket' 		=> $bucket,
        'Key'    		=> $keyname,
        'SourceFile'   	=> $filepath,
        'ACL'    		=> 'public-read'
    ));

    echo $result['@metadata']['statusCode'].'<br>';
    echo $result['ObjectURL'] . "<br>";
    
    echo '<pre>';
    print_r($result);
    
} catch (S3Exception $e) {
    echo $e->getMessage() . "\n";
}

/*
header('Access-Control-Allow-Origin: *');
$new_image_name = urldecode($_FILES["file"]["name"]);
move_uploaded_file($_FILES["file"]["tmp_name"], $new_image_name);
exit("fim");
*/

?>