<?php
/*************************************************************************************************

Use the CIM JSON API to update a split tender transaction

SAMPLE REQUEST
--------------------------------------------------------------------------------------------------
{
   "updateSplitTenderGroupRequest":{
      "merchantAuthentication":{
         "name":"",
         "transactionKey":""
      },
      "splitTenderId":"123456",
      "splitTenderStatus":"voided"
   }
}

SAMPLE RESPONSE
--------------------------------------------------------------------------------------------------
{
   "messages":{
      "resultCode":"Ok",
      "message":[
         {
            "code":"I00001",
            "text":"Successful."
         }
      ]
   }
}

*************************************************************************************************/

    namespace JohnConde\Authnet;

    require '../../config.inc.php';

    $request  = AuthnetApiFactory::getJsonApiHandler(AUTHNET_LOGIN, AUTHNET_TRANSKEY, AuthnetApiFactory::USE_DEVELOPMENT_SERVER);
    $response = $request->updateSplitTenderGroupRequest([
        'splitTenderId' => '123456',
        'splitTenderStatus' => 'voided'
    ]);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
    <style type="text/css">
        table { border: 1px solid #cccccc; margin: auto; border-collapse: collapse; max-width: 90%; }
        table td { padding: 3px 5px; vertical-align: top; border-top: 1px solid #cccccc; }
        pre { white-space: pre-wrap; }
        table th { background: #e5e5e5; color: #666666; }
        h1, h2 { text-align: center; }
    </style>
    </head>
    <body>
        <h1>
            CIM :: Update Split Tender Group
        </h1>
        <h2>
            Results
        </h2>
        <table>
            <tr>
                <th>Response</th>
                <td><?php echo $response->messages->resultCode; ?></td>
            </tr>
            <tr>
                <th>code</th>
                <td><?php echo $response->messages->message[0]->code; ?></td>
            </tr>
            <tr>
                <th>Successful?</th>
                <td><?php echo $response->isSuccessful() ? 'yes' : 'no'; ?></td>
            </tr>
            <tr>
                <th>Error?</th>
                <td><?php echo $response->isError() ? 'yes' : 'no'; ?></td>
            </tr>
        </table>
        <h2>
            Raw Input/Output
        </h2>
<?php
    echo $request, $response;
?>
    </body>
</html>
