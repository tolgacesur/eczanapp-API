<?php  
require "simple_html_dom.php";
/**
* 	@author: Tolga CESUR
* 	@website: tolgacesur.com
*	@website : api.eczanapp.space
*
*/
class Eczane
{
	
	function __construct($city)
	{
		$this->city = $city;
		$this->baseUrl = "http://".$this->ConvertString($this->city).".eczaneleri.org/";
		$this->pharmacyList = [];
		$this->html = str_get_html($this->fetchData($this->baseUrl));

		if($this->html === FALSE) {
			exit("Lütfen Geçerli Bir İl Giriniz.");
		}

		$this->parse();
	}

	private function parse() {
 		$list = $this->html->find('div.active ul.media-list li');

		foreach ($list as $item) {
			$div = $item->children(0);

			$info = $div->children(0)->children(0)->plaintext;
			$info = explode("Eczanesi", $info);
			$name = rtrim(ltrim($info[0]));
			$district = rtrim(ltrim($info[1]));

			$address = $div->innertext;
			$address = explode("</a>", $address);
			$address = $address[1];
			$address = explode("<br />", $address);
			$address = rtrim(ltrim($address[0]));

			$address_url = $address.'+'.$district.'+'.$name.'+Eczanesi';
			$address_url = str_replace(' ', '%20', $address_url);

			$googleApiUrl = 'https://maps.googleapis.com/maps/api/geocode/json?address='.$address_url.'+Turkey&key=AIzaSyDAR3ctfLepWdXOgrHKobyfRlq7C87Nl4M';

			$google = $this->fetchData($googleApiUrl);
			$google = json_decode($google);

			$result['name'] = $name.' '.'Eczanesi';
			$resul['city'] = $this->city;
			$result['district'] = $district;
			$result['address'] = $address;

			if (!empty($google->results)) {
				$lat = $google->results[0]->geometry->location->lat;
				$lng = $google->results[0]->geometry->location->lng;

				$result['lat'] = $lat;
				$result['lng'] = $lng;
			}


			array_push($this->pharmacyList, $result);
		}

	}

	public function getPharmacy() {
		return json_encode($this->pharmacyList);
	}


	private function fetchData($url) {

		$curl_handle=curl_init();
		curl_setopt($curl_handle, CURLOPT_URL,$url);
		curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, false);
		$data = curl_exec($curl_handle);
		curl_close($curl_handle);

		return $data;
	}



	/**
	* 
	* @param String $s
	* 
	* @return $s
	*/
	private function ConvertString($s) {
	    $tr = array('ş','Ş','ı','İ','ğ','Ğ','ü','Ü','ö','Ö','Ç','ç');
	    $eng = array('s','s','i','i','g','g','u','u','o','o','c','c');
	    $s = str_replace($tr,$eng,$s);
	    $s = strtolower($s);
	    $s = preg_replace('/&.+?;/', '', $s);
	    $s = preg_replace('/[^%a-z0-9 _-]/', '', $s);
	    $s = preg_replace('/\s+/', '-', $s);
	    $s = preg_replace('|-+|', '-', $s);
	    $s = trim($s, '-');
 
	    return $s;
	}
}
?>