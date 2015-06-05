#!/usr/bin/php

<?php
    /**
     * data-updater.php <-- This is your data updater
     * run this using cron or something similar daily to update JSON database
     *
     * @license MIT Licence - http://opensource.org/licenses/MIT
     * @copyright (c) 2015 by Ankush Menat
     *
     */

    /**
     * Find your affId here - https://www.flipkart.com/affiliate/edit
     * Get access token from here - http://www.flipkart.com/affiliate/apiaccess
     */
    $affId = '<your-affId>';
    $affToken = '<your-api-access-token>';

    /**
     * setting headers
     * reference - http://www.flipkart.com/affiliate/apifaq ( FAQ:6 How can I access API? )
    **/
    function parse($queryurl, $file)
    {
        // Initiate cURL
        $cURL = curl_init();

        /**
         * setting headers
         * reference - http://www.flipkart.com/affiliate/apifaq ( FAQ:6 How can I access API? )
        **/
        $headers = array('Fk-Affiliate-Id: '.$GLOBALS['affId'], 'Fk-Affiliate-Token: '.$GLOBALS['affToken']);

        // Add headers
        curl_setopt($cURL, CURLOPT_HTTPHEADER, $headers);

        // set the URL
        curl_setopt($cURL, CURLOPT_URL, $queryurl);

        // raw output
        curl_setopt($cURL, CURLOPT_RETURNTRANSFER, TRUE);

        // curl query timeout
        curl_setopt($cURL, CURLOPT_TIMEOUT, 30);

        // Disable SSL verification
        curl_setopt($cURL, CURLOPT_SSL_VERIFYPEER, false);

        // execute and store result to var
        $result = curl_exec($cURL);
        curl_close($cURL);

        // write raw json data to file
        $fp = fopen($file, "w") or die("Unable to create file!");;
        fwrite($fp, $result);
        fclose($fp);
    }



    /**
     * Reference  - http://www.flipkart.com/affiliate/apifaq
    **/
    $topofferurl = "https://affiliate-api.flipkart.net/affiliate/offers/v1/top/json";
    $topofferfile = "../public/data/topoffers.json";
    $dotdurl = "https://affiliate-api.flipkart.net/affiliate/offers/v1/dotd/json";
    $dotdfile = "../public/data/dotd.json";

    // Lets execute stuff!
    parse($topofferurl, $topofferfile);
    parse($dotdurl, $dotdfile)
?>
