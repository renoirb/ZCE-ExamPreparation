<?php

/**
 * This file is part of the ZCE - Exam Preparation package.
 *
 * (c) Daniel Gomes <me@danielcsgomes.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace ZCE\WebFeatures;

/**
 * SOAP example
 *
 * @author Daniel Gomes <me@danielcsgomes.com>
 */
class SOAP
{
    static $URL_SOCCER      = 'https://footballpool.dataaccess.eu/data/info.wso?WSDL';
    static $URL_COUNTRIES   = 'https://renoirboulanger.com/t.php';
    private $client         = array();
    private $countries      = array();

    public function GetPortugalGoalkeepersName()
    {
        $this->client['soccer'] = new \SoapClient(self::$URL_SOCCER);
        print_r($this->client['soccer']->AllGoalKeepers(array('sCountryName' => 'Portugal')));
    }

    public function GetAllCountries()
    {
        /*
         * Creating a local webservice
         *   - use local development webserver from php 5.4
         *   - finish CountriesWebservice
         *
        $config = array(
            'location'=>self::$URL_COUNTRIES,
            'uri'=> self::$URL_COUNTRIES,
            'trace'=>1,
            'exceptions' => true,
            'cache_wsdl' => WSDL_CACHE_NONE,
            'features' => SOAP_SINGLE_ELEMENT_ARRAYS
        );
        $client = new \SoapClient(null,$config);
        $result = $client->getCountryCodes();
        */
        $result = array(
            array('pt','Portugal'),
            array('br','Brasil'),
            array('mx','Mexico'),
            array('es','Spain')
        );
        foreach($result as $value)
        {
            $this->countries[$value[0]] = $value[1];
        }
    }

    public function GetCountryInfo($ianaCode = null)
    {
        if(!is_array($this->client['countries']))
            $this->GetAllCountries();

        if(!is_null($ianaCode) && array_key_exists($ianaCode, $this->countries))
        {
            return $this->countries[$ianaCode];
        }
        else
        {
            return sprintf('The country %s is either not a valid IANA code, nor available in our records at the moment', $ianaCode);
        }
    }
}

$client = new SOAP();
//$client->GetPortugalGoalkeepersName();
$client->GetAllCountries();
print_r($client->GetCountryInfo('pt'));
//print_r($client->GetCountryInfo('en'));
//print_r($client->GetCountryInfo('uk'));

