<?php
require __DIR__ . '/vendor/autoload.php';
require './FormResponse.php';

if (php_sapi_name() != 'cli') {
    throw new Exception('This application must be run on the command line.');
}

/**
 * Returns an authorized API client.
 * @return Google_Client the authorized client object
 */
function getClient()
{
    $client = new Google_Client();
    $client->setApplicationName('Google Sheets API PHP Quickstart');
    $client->setScopes(Google_Service_Sheets::SPREADSHEETS_READONLY);
    $client->setAuthConfig('credentials.json');
    $client->setAccessType('offline');
    $client->setPrompt('select_account consent');
    return $client;
}


// Get the API client and construct the service object.
$client = getClient();
$service = new Google_Service_Sheets($client);

$spreadsheetId = '1Jt-xBuuCWBLSfjsQC0dVZ0vYlqYGBqaHNzUCN-usV4E';
$range = 'Form Responses 1!A2:AI';
$response = $service->spreadsheets_values->get($spreadsheetId, $range);
$values = $response->getValues();

$formResponses = [];

if (empty($values)) {   
    print "No data found.\n";
} else {
    foreach ($values as $row) {
        $rowSize = count($row);
        if ($rowSize < 35) {
            $row = array_merge($row, array_fill($rowSize, 35-$rowSize, null));
        }
        array_push($formResponses, new FormResponse($row));
    }
}

var_dump($formResponses);

?>