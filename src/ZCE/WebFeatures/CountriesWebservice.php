<?php

namespace ZCE\WebFeatures;

class CoutriesService {

  protected $lang_preference_code;

  public function __construct($lang_preference_code='EN')
  {
    $this->lang_preference_code = $lang_preference_code;
  }

  /**
   * IANA codes and the country name
   * example: http://www.iana.org/domains/root/db/de.html
   */
  private static $ianaHref = 'http://www.iana.org/domains/root/db/%s.html';

  /**
   * Country codes and how to write
   *
   * see: http://www.fao.org/countryprofiles/webservices/en/
   * example: http://www.fao.org/countryprofiles/geoinfo/ws/countryNames/MEX/FR
   **/
  private static $faoHref = 'http://www.fao.org/countryprofiles/geoinfo/ws/countryNames/%s/%s';

  protected function ianaRef($ianaCode)
  {
    return sprintf(self::$ianaHref, strtoupper($ianaCode));
  }

  protected function faoRef($ianaCode)
  {
    return sprintf(self::$faoHref, strtoupper($ianaCode), strtoupper($this->lang_preference_code));
  }

  /**
   * Countries list
   *
   * see: view-source:http://www.webservicex.net/country.asmx?WSDL
   **/
  private static $countries = array(
      'ac' => array('name'=>'Ascension Island'),
      'ca' => array('name'=>'Canada'),
      'af' => array('name'=>'Afghanistan'),
      'ao' => array('name'=>'Angola'),
      'at' => array('name'=>'Austria'),
      'br' => array('name'=>'Brasil'),
      'es' => array('name'=>'Spain'),
      'uk' => array('name'=>'United Kingdom'),
      'de' => array('name'=>'Germany'),
      'cz' => array('name'=>'Czech Republic'),
      'bo' => array('name'=>'Bolivia'),
      'cf' => array('name'=>'Central African Republic'),
      'dm' => array('name'=>'Dominica'),
      'pt' => array('name'=>'Portugal')
  );

  public function getCountryCodes()
  {
    return array_keys(self::$countries);
  }
}

$server = new \SoapServer(NULL, array('uri'=>'https://renoirboulanger.com/t.php'));
$server->setClass('CoutriesService');
$server->handle();