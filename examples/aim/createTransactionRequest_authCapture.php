<?php

/*
 * This file is part of the AuthnetJSON package.
 *
 * (c) John Conde <stymiee@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/*************************************************************************************************

Use the AIM JSON API to process an Authorization and Capture transaction (Sale)

SAMPLE REQUEST
--------------------------------------------------------------------------------------------------
{
   "createTransactionRequest":{
      "merchantAuthentication":{
         "name":"",
         "transactionKey":""
      },
      "refId":94564789,
      "transactionRequest":{
         "transactionType":"authCaptureTransaction",
         "amount":5,
         "payment":{
            "creditCard":{
               "cardNumber":"4111111111111111",
               "expirationDate":"122020",
               "cardCode":"999"
            }
         },
         "order":{
            "invoiceNumber":"1324567890",
            "description":"this is a test transaction"
         },
         "lineItems":{
            "lineItem":[
               {
                  "itemId":"1",
                  "name":"vase",
                  "description":"Cannes logo",
                  "quantity":"18",
                  "unitPrice":"45.00"
               },
               {
                  "itemId":"2",
                  "name":"desk",
                  "description":"Big Desk",
                  "quantity":"10",
                  "unitPrice":"85.00"
               }
            ]
         },
         "tax":{
            "amount":"4.26",
            "name":"level2 tax name",
            "description":"level2 tax"
         },
         "duty":{
            "amount":"8.55",
            "name":"duty name",
            "description":"duty description"
         },
         "shipping":{
            "amount":"4.26",
            "name":"level2 tax name",
            "description":"level2 tax"
         },
         "poNumber":"456654",
         "customer":{
            "id":"18",
            "email":"someone@blackhole.tv"
         },
         "billTo":{
            "firstName":"Ellen",
            "lastName":"Johnson",
            "company":"Souveniropolis",
            "address":"14 Main Street",
            "city":"Pecan Springs",
            "state":"TX",
            "zip":"44628",
            "country":"USA"
         },
         "shipTo":{
            "firstName":"China",
            "lastName":"Bayles",
            "company":"Thyme for Tea",
            "address":"12 Main Street",
            "city":"Pecan Springs",
            "state":"TX",
            "zip":"44628",
            "country":"USA"
         },
         "customerIP":"192.168.1.1",
         "transactionSettings":{
            "setting":[
               {
                  "settingName":"allowPartialAuth",
                  "settingValue":"false"
               },
               {
                  "settingName":"duplicateWindow",
                  "settingValue":"0"
               },
               {
                  "settingName":"emailCustomer",
                  "settingValue":"false"
               },
               {
                  "settingName":"recurringBilling",
                  "settingValue":"false"
               },
               {
                  "settingName":"testRequest",
                  "settingValue":"false"
               }
            ]
         },
         "userFields":{
            "userField":{
               "name":"favorite_color",
               "value":"blue"
            }
         }
      }
   }
}

SAMPLE RESPONSE
--------------------------------------------------------------------------------------------------
{
   "transactionResponse":{
      "responseCode":"1",
      "authCode":"QWX20S",
      "avsResultCode":"Y",
      "cvvResultCode":"P",
      "cavvResultCode":"2",
      "transId":"2228446239",
      "refTransID":"",
      "transHash":"56B2D50D73CAB8C6EDE7A92B9BB235BD",
      "testRequest":"0",
      "accountNumber":"XXXX1111",
      "accountType":"Visa",
      "messages":[
         {
            "code":"1",
            "description":"This transaction has been approved."
         }
      ],
      "userFields":[
         {
            "name":"favorite_color",
            "value":"blue"
         }
      ]
   },
   "refId":"94564789",
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
    $response = $request->createTransactionRequest([
        'refId' => rand(1000000, 100000000),
        'transactionRequest' => [
            'transactionType' => 'authCaptureTransaction',
            'amount' => 5,
            'payment' => [
                'creditCard' => [
                    'cardNumber' => '4111111111111111',
                    'expirationDate' => '122020',
                    'cardCode' => '999',
                ],
            ],
            'order' => [
                'invoiceNumber' => '1324567890',
                'description' => 'this is a test transaction',
            ],
            'lineItems' => [
                'lineItem' => [
                    0 => [
                        'itemId' => '1',
                        'name' => 'vase',
                        'description' => 'Cannes logo',
                        'quantity' => '18',
                        'unitPrice' => '45.00'
                    ],
                    1 => [
                        'itemId' => '2',
                        'name' => 'desk',
                        'description' => 'Big Desk',
                        'quantity' => '10',
                        'unitPrice' => '85.00'
                    ]
                ]
            ],
            'tax' => [
               'amount' => '4.26',
               'name' => 'level2 tax name',
               'description' => 'level2 tax',
            ],
            'duty' => [
               'amount' => '8.55',
               'name' => 'duty name',
               'description' => 'duty description',
            ],
            'shipping' => [
               'amount' => '4.26',
               'name' => 'level2 tax name',
               'description' => 'level2 tax',
            ],
            'poNumber' => '456654',
            'customer' => [
               'id' => '18',
               'email' => 'someone@blackhole.tv',
            ],
            'billTo' => [
               'firstName' => 'Ellen',
               'lastName' => 'Johnson',
               'company' => 'Souveniropolis',
               'address' => '14 Main Street',
               'city' => 'Pecan Springs',
               'state' => 'TX',
               'zip' => '44628',
               'country' => 'USA',
            ],
            'shipTo' => [
               'firstName' => 'China',
               'lastName' => 'Bayles',
               'company' => 'Thyme for Tea',
               'address' => '12 Main Street',
               'city' => 'Pecan Springs',
               'state' => 'TX',
               'zip' => '44628',
               'country' => 'USA',
            ],
            'customerIP' => '192.168.1.1',
            'transactionSettings' => [
                'setting' => [
                    0 => [
                        'settingName' =>'allowPartialAuth',
                        'settingValue' => 'false'
                    ],
                    1 => [
                        'settingName' => 'duplicateWindow',
                        'settingValue' => '0'
                    ],
                    2 => [
                        'settingName' => 'emailCustomer',
                        'settingValue' => 'false'
                    ],
                    3 => [
                        'settingName' => 'recurringBilling',
                        'settingValue' => 'false'
                    ],
                    4 => [
                        'settingName' => 'testRequest',
                        'settingValue' => 'false'
                    ]
                ]
            ],
            'userFields' => [
                'userField' => [
                    'name' => 'MerchantDefinedFieldName1',
                    'value' => 'MerchantDefinedFieldValue1',
                ],
                'userField' => [
                    'name' => 'favorite_color',
                    'value' => 'blue',
                ],
            ],
        ],
    ]);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>AIM :: Authorize and Capture</title>
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
            AIM :: Authorize and Capture
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
                <th>Successful?</th>
                <td><?php echo ($response->isSuccessful()) ? 'yes' : 'no'; ?></td>
            </tr>
            <tr>
                <th>Error?</th>
                <td><?php echo ($response->isError()) ? 'yes' : 'no'; ?></td>
            </tr>
            <?php if ($response->isSuccessful()) : ?>
            <tr>
                <th>Description</th>
                <td><?php echo $response->transactionResponse->messages[0]->description; ?></td>
            </tr>
            <tr>
                <th>authCode</th>
                <td><?php echo $response->transactionResponse->authCode; ?></td>
            </tr>
            <tr>
                <th>transId</th>
                <td><?php echo $response->transactionResponse->transId; ?></td>
            </tr>
            <?php elseif ($response->isError()) : ?>
            <tr>
                <th>Error Code</th>
                <td><?php echo $response->getErrorCode(); ?></td>
            </tr>
            <tr>
                <th>Error Message</th>
                <td><?php echo  $response->getErrorText(); ?></td>
            </tr>
            <?php endif; ?>
        </table>
        <h2>
            Raw Input/Output
        </h2>
<?php
    echo $request, $response;
?>
    </body>
</html>
