<?php
/*
 * PepipostAPIV10Lib
 *
 * This file was automatically generated by APIMATIC v2.0 on 04/08/2016
 */

namespace PepipostAPIV10Lib\Controllers;

use PepipostAPIV10Lib\APIException;
use PepipostAPIV10Lib\APIHelper;
use PepipostAPIV10Lib\Configuration;
use Unirest\Unirest;
class Email {
    /**
     * `Sending Mails` – This API is used for sending emails. Pepipost supports REST as well JSON formats for the input
     * @param  string          $apiKey           Required parameter: Your API Key
     * @param  string          $content          Required parameter: Email body in html (to use attributes to display dynamic values such as name, account number, etc. for ex. [% NAME %] for ATT_NAME , [% AGE %] for ATT_AGE etc.)
     * @param  string          $from             Required parameter: From email address
     * @param  string          $recipients       Required parameter: Email addresses for recipients (multiple values allowed)
     * @param  string          $subject          Required parameter: Subject of the Email
     * @param  string|null     $aTTNAME          Optional parameter: Specify attributes followed by ATT_ for recipient to personalized email for ex. ATT_NAME for name, ATT_AGE for age etc. (Multiple attributes are allowed)
     * @param  string|null     $attachmentid     Optional parameter: specify uploaded attachments id (Multiple attachments are allowed)
     * @param  string|null     $bcc              Optional parameter: Email address for bcc
     * @param  bool|null       $clicktrack       Optional parameter: set ‘0’ or ‘1’ in-order to disable or enable the click-track
     * @param  bool|null       $footer           Optional parameter: Set '0' or '1' in order to include footer or not
     * @param  string|null     $fromname         Optional parameter: Email Sender name
     * @param  bool|null       $opentrack        Optional parameter: set open-track value to ‘0’ or ‘1’ in-order to disable or enable
     * @param  string|null     $replytoid        Optional parameter: Reply to email address
     * @param  string|null     $tags             Optional parameter: To relate each message. Useful for reports.
     * @param  int|null        $template         Optional parameter: Email template ID
     * @param  string|null     $xAPIHEADER       Optional parameter: Your defined unique identifier
     * @return mixed response from the API call*/
    public function sendRest (
                $apiKey,
                $content,
                $from,
                $recipients,
                $subject,
                $aTTNAME = NULL,
                $attachmentid = NULL,
                $bcc = NULL,
                $clicktrack = NULL,
                $footer = NULL,
                $fromname = NULL,
                $opentrack = NULL,
                $replytoid = NULL,
                $tags = NULL,
                $template = NULL,
                $xAPIHEADER = NULL) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/api/web.send.rest';

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($queryBuilder, array (
            'api_key'      => $apiKey,
            'content'      => $content,
            'from'         => $from,
            'recipients'   => $recipients,
            'subject'      => $subject,
            'ATT_NAME'     => $aTTNAME,
            'attachmentid' => $attachmentid,
            'bcc'          => $bcc,
            'clicktrack'   => (null != $clicktrack) ? var_export($clicktrack, true) : true,
            'footer'       => (null != $footer) ? var_export($footer, true) : true,
            'fromname'     => $fromname,
            'opentrack'    => (null != $opentrack) ? var_export($opentrack, true) : true,
            'replytoid'    => $replytoid,
            'tags'         => $tags,
            'template'     => $template,
            'X-APIHEADER'  => $xAPIHEADER,
        ));

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = array (
            'user-agent'    => 'APIMATIC 2.0',
            'Accept'        => 'application/json'
        );

        //prepare API request
        $request = Unirest::get($queryUrl, $headers);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        return $response->body;
    }
        
    /**
     * `Sending Mails` – This API is used for sending emails. Pepipost supports REST as well JSON formats for the input. This is JSON API.
     * @param  Emailv1     $data     Required parameter: Data in JSON format
     * @return mixed response from the API call*/
    public function sendJson (
                $data) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/api/web.send.json';

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = array (
            'user-agent'    => 'APIMATIC 2.0',
            'Accept'        => 'application/json',
            'content-type'  => 'application/json; charset=utf-8'
        );

        //prepare API request
        $request = Unirest::post($queryUrl, $headers, json_encode($data));

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        return $response->body;
    }
        
}
