<?PHP 

/**
 * A helper to print out skype links
 *
 * @author yisrael dov 
 *
 * @usage
 *  // create a link to call a user 
 * echo $this->Skype->call("05255555555",'call',array('country'=>'israel'));
 *
 */
class SkypeHelper extends AppHelper{

    /**
     * hash of country name to prefix
     * 
     * This might not be 100% accurate
     */
    public $countryPrefix =
        array(
//took this from wikipedia
//Country, Territory or Service	Code
            "Abkhazia"                                     =>"+7840",
            "Afghanistan"                                  =>"+93",
            "Albania"                                      =>"+355",
            "Algeria"                                      =>"+213",
            "American Samoa"                               =>"+1684",
            "Andorra"                                      =>"+376",
            "Angola"                                       =>"+244",
            "Anguilla"                                     =>"+1264",
            "Antigua and Barbuda"                          =>"+1268",
            "Argentina"                                    =>"+54",
            "Armenia"                                      =>"+374",
            "Aruba"                                        =>"+297",
            "Ascension"                                    =>"+247",
            "Australia"                                    =>"+61",
            "Australian External Territories"              =>"+672",
            "Austria"                                      =>"+43",
            "Azerbaijan"                                   =>"+994",
            "Bahamas"                                      =>"+1242",
            "Bahrain"                                      =>"+973",
            "Bangladesh"                                   =>"+880",
            "Barbados"                                     =>"+1246",
            "Barbuda"                                      =>"+1268",
            "Belarus"                                      =>"+375",
            "Belgium"                                      =>"+32",
            "Belize"                                       =>"+501",
            "Benin"                                        =>"+229",
            "Bermuda"                                      =>"+1441",
            "Bhutan"                                       =>"+975",
            "Bolivia"                                      =>"+591",
            "Bonaire"                                      =>"+5997",
            "Bosnia and Herzegovina"                       =>"+387",
            "Botswana"                                     =>"+267",
            "Brazil"                                       =>"+55",
            "British Indian Ocean Territory"               =>"+246",
            "British Virgin Islands"                       =>"+1284",
            "Brunei Darussalam"                            =>"+673",
            "Bulgaria"                                     =>"+359",
            "Burkina Faso"                                 =>"+226",
            "Burma"                                        =>"+95",
            "Burundi"                                      =>"+257",
            "Cambodia"                                     =>"+855",
            "Cameroon"                                     =>"+237",
            "Canada"                                       =>"+1",
            "Cape Verde"                                   =>"+238",
            "Caribbean Netherlands"                        =>"+5993",
            "Cayman Islands"                               =>"+1345",
            "Central African Republic"                     =>"+236",
            "Chad"                                         =>"+235",
            "Chatham Island, New Zealand"                  =>"+64",
            "Chile"                                        =>"+56",
            "China"                                        =>"+86",
            "Christmas Island"                             =>"+61",
            "Cocos (Keeling) Islands"                      =>"+61",
            "Colombia"                                     =>"+57",
            "Comoros"                                      =>"+269",
            "Congo"                                        =>"+242",
            "Congo, Democratic Republic of the (Zaire')"   =>"+243",
            "Cook Islands"                                 =>"+682",
            "Costa Rica"                                   =>"+506",
            "Croatia"                                      =>"+385",
            "Cuba"                                         =>"+53",
            "Curaçao"                                      =>"+5999",
            "Cyprus"                                       =>"+357",
            "Czech Republic"                               =>"+420",
            "Côte d'Ivoire"                                =>"+225",
            "Denmark"                                      =>"+45",
            "Diego Garcia"                                 =>"+246",
            "Djibouti"                                     =>"+253",
            "Dominica"                                     =>"+1767",
            "Dominican Republic"                           =>"+1809",
            "East Timor"                                   =>"+670",
            "Easter Island"                                =>"+56",
            "Ecuador"                                      =>"+593",
            "Egypt"                                        =>"+20",
            "El Salvador"                                  =>"+503",
            "Ellipso (Mobile Satellite service')"          =>"+8812",
            "EMSAT (Mobile Satellite service') "           =>"+88213",
            "Equatorial Guinea"                            =>"+240",
            "Eritrea"                                      =>"+291",
            "Estonia"                                      =>"+372",
            "Ethiopia"                                     =>"+251",
            "Falkland Islands"                             =>"+500",
            "Faroe Islands"                                =>"+298",
            "Fiji"                                         =>"+679",
            "Finland"                                      =>"+358",
            "France"                                       =>"+33",
            "French Antilles"                              =>"+596",
            "French Guiana"                                =>"+594",
            "French Polynesia"                             =>"+689",
            "Gabon"                                        =>"+241",
            "Gambia"                                       =>"+220",
            "Georgia"                                      =>"+995",
            "Germany"                                      =>"+49",
            "Ghana"                                        =>"+233",
            "Gibraltar"                                    =>"+350",
            "Global Mobile Satellite System (GMSS')"       =>"+881",
            "Globalstar (Mobile Satellite Service')"       =>"+8818",
            "Greece"                                       =>"+30",
            "Greenland"                                    =>"+299",
            "Grenada"                                      =>"+1473",
            "Guadeloupe"                                   =>"+590",
            "Guam"                                         =>"+1671",
            "Guantanamo Bay, Cuba"                         =>"+5399",
            "Guatemala"                                    =>"+502",
            "Guernsey"                                     =>"+44",
            "Guinea"                                       =>"+224",
            "Guinea-Bissau"                                =>"+245",
            "Guyana"                                       =>"+592",
            "Haiti"                                        =>"+509",
            "Honduras"                                     =>"+504",
            "Hong Kong"                                    =>"+852",
            "Hungary"                                      =>"+36",
            "Iceland"                                      =>"+354",
            "ICO Global (Mobile Satellite Service')"       =>"+8810",
            "India"                                        =>"+91",
            "Indonesia"                                    =>"+62",
            "Inmarsat SNAC"                                =>"+870",
            "International Freephone Service"              =>"+800",
            "International Shared Cost Service (ISCS')"    =>"+808",
            "Iran"                                         =>"+98",
            "Iraq"                                         =>"+964",
            "Ireland"                                      =>"+353",
            "Iridium (Mobile Satellite service')"          =>"+8816",
            "Isle of Man"                                  =>"+44",
            "Israel"                                       =>"+972",
            "Italy"                                        =>"+39",
            "Jamaica"                                      =>"+1876",
            "Japan"                                        =>"+81",
            "Jersey"                                       =>"+44",
            "Jordan"                                       =>"+962",
            "Kazakhstan"                                   =>"+76",
            "Kenya"                                        =>"+254",
            "Kiribati"                                     =>"+686",
            "Korea, North"                                 =>"+850",
            "Korea, South"                                 =>"+82",
            "Kuwait"                                       =>"+965",
            "Kyrgyzstan"                                   =>"+996",
            "Laos"                                         =>"+856",
            "Latvia"                                       =>"+371",
            "Lebanon"                                      =>"+961",
            "Lesotho"                                      =>"+266",
            "Liberia"                                      =>"+231",
            "Libya"                                        =>"+218",
            "Liechtenstein"                                =>"+423",
            "Lithuania"                                    =>"+370",
            "Luxembourg"                                   =>"+352",
            "Macau"                                        =>"+853",
            "Macedonia"                                    =>"+389",
            "Madagascar"                                   =>"+261",
            "Malawi"                                       =>"+265",
            "Malaysia"                                     =>"+60",
            "Maldives"                                     =>"+960",
            "Mali"                                         =>"+223",
            "Malta"                                        =>"+356",
            "Marshall Islands"                             =>"+692",
            "Martinique"                                   =>"+596",
            "Mauritania"                                   =>"+222",
            "Mauritius"                                    =>"+230",
            "Mayotte"                                      =>"+262",
            "Mexico"                                       =>"+52",
            "Micronesia, Federated States of"              =>"+691",
            "Midway Island, USA"                           =>"+1808",
            "Moldova"                                      =>"+373",
            "Monaco"                                       =>"+377",
            "Mongolia"                                     =>"+976",
            "Montenegro"                                   =>"+382",
            "Montserrat"                                   =>"+1664",
            "Morocco"                                      =>"+212",
            "Mozambique"                                   =>"+258",
            "Namibia"                                      =>"+264",
            "Nauru"                                        =>"+674",
            "Nepal"                                        =>"+977",
            "Netherlands"                                  =>"+31",
            "Nevis"                                        =>"+1869",
            "New Caledonia"                                =>"+687",
            "New Zealand"                                  =>"+64",
            "Nicaragua"                                    =>"+505",
            "Niger"                                        =>"+227",
            "Nigeria"                                      =>"+234",
            "Niue"                                         =>"+683",
            "Norfolk Island"                               =>"+672",
            "Northern Mariana Islands"                     =>"+1670",
            "Norway"                                       =>"+47",
            "Oman"                                         =>"+968",
            "Pakistan"                                     =>"+92",
            "Palau"                                        =>"+680",
            "Palestinian territories"                      =>"+970",
            "Panama"                                       =>"+507",
            "Papua New Guinea"                             =>"+675",
            "Paraguay"                                     =>"+595",
            "Peru"                                         =>"+51",
            "Philippines"                                  =>"+63",
            "Pitcairn Islands"                             =>"+64",
            "Poland"                                       =>"+48",
            "Portugal"                                     =>"+351",
            "Puerto Rico"                                  =>"+1787",
            "Qatar"                                        =>"+974",
            "Romania"                                      =>"+40",
            "Russia"                                       =>"+7",
            "Rwanda"                                       =>"+250",
            "Réunion"                                      =>"+262",
            "Saba"                                         =>"+5994",
            "Saint Barthélemy"                             =>"+590",
            "Saint Helena"                                 =>"+290",
            "Saint Kitts and Nevis"                        =>"+1869",
            "Saint Lucia"                                  =>"+1758",
            "Saint Martin (France')"                       =>"+590",
            "Saint Pierre and Miquelon"                    =>"+508",
            "Saint Vincent and the Grenadines"             =>"+1784",
            "Samoa"                                        =>"+685",
            "San Marino"                                   =>"+378",
            "Saudi Arabia"                                 =>"+966",
            "Senegal"                                      =>"+221",
            "Serbia"                                       =>"+381",
            "Seychelles"                                   =>"+248",
            "Sierra Leone"                                 =>"+232",
            "Singapore"                                    =>"+65",
            "Sint Eustatius"                               =>"+5993",
            "Sint Maarten (Netherlands')"                  =>"+1721",
            "Slovakia"                                     =>"+421",
            "Slovenia"                                     =>"+386",
            "Solomon Islands"                              =>"+677",
            "Somalia"                                      =>"+252",
            "South Africa"                                 =>"+27",
            "South Georgia and the South Sandwich Islands" =>"+500",
            "South Ossetia"                                =>"+99534",
            "South Sudan"                                  =>"+211",
            "Spain"                                        =>"+34",
            "Sri Lanka"                                    =>"+94",
            "Sudan"                                        =>"+249",
            "Suriname"                                     =>"+597",
            "Swaziland"                                    =>"+268",
            "Sweden"                                       =>"+46",
            "Switzerland"                                  =>"+41",
            "Syria"                                        =>"+963",
            "São Tomé and Príncipe"                        =>"+239",
            "Taiwan"                                       =>"+886",
            "Tajikistan"                                   =>"+992",
            "Tanzania"                                     =>"+255",
            "Thailand"                                     =>"+66",
            "Thuraya (Mobile Satellite service')"          =>"+88216",
            "Togo"                                         =>"+228",
            "Tokelau"                                      =>"+690",
            "Tonga"                                        =>"+676",
            "Trinidad and Tobago"                          =>"+1868",
            "Tristan da Cunha"                             =>"+2908",
            "Tunisia"                                      =>"+216",
            "Turkey"                                       =>"+90",
            "Turkmenistan"                                 =>"+993",
            "Turks and Caicos Islands"                     =>"+1649",
            "Tuvalu"                                       =>"+688",
            "Uganda"                                       =>"+256",
            "Ukraine"                                      =>"+380",
            "United Arab Emirates"                         =>"+971",
            "United Kingdom"                               =>"+44",
            "United States"                                =>"+1",
            "Universal Personal Telecommunications (UPT')" =>"+878",
            "Uruguay"                                      =>"+598",
            "US Virgin Islands"                            =>"+1340",
            "Uzbekistan"                                   =>"+998",
            "Vanuatu"                                      =>"+678",
            "Vatican City State (Holy See')"               =>"+39066, assigned +379",
            "Venezuela"                                    =>"+58",
            "Vietnam"                                      =>"+84",
            "Wake Island, USA"                             =>"+1808",
            "Wallis and Futuna"                            =>"+681",
            "Yemen"                                        =>"+967",
            "Zambia"                                       =>"+260",
            "Zanzibar"                                     =>"+255",
            "Zimbabwe"                                     =>"+263",
            "Åland Islands"                                =>"+358",           
            );

    /**
     * Returns phone with the country code added
     * 
     * @param string $number the phone number
     * @param string $country the name of the country
     *
     * @return string phone number with the country code if one was
     * found otherwise the number
     */
    public function phone($number,$country="United States"){
        if(array_key_exists($country,$this->countryPrefix)){
            return preg_replace('/^0*([0-9-]+)$/', $this->countryPrefix[$country].'\1', $number);
        }
        else{
            return $number;
        }
    }

    /**
     * creates a skype link
     *
     * @param string $id skypeid or phone
     * @param string|null $action call,sms,chat ...
     * @param string|null $title The title to use for the link defaults to the $id
     *
     * @param array|null $options any attributes that you want to
     * apply to the link with some additional special options:
     *
     *    country: the name of the country to add country code,
     *    defaults to 'United states
     *
     * @return string the html for the skype link
     *
     * @author Yisraeldov
     */
    public function link($id,$action=null,$title=null,$options=array('class'=>'skype')){
        if(empty($title)){
            $title = $id;
        }
        $url = 'skype:' . $this->phone($id,$options['country']);
        if(!empty($action)){
            $url.='?'.$action;
        }
        return sprintf('<a href="%s"%s>%s</a>', $url, $this->_parseAttributes($options), $title);
    }

    /**
     * call,sms,chat methods
     *
     * creates a link for the method called
     *
     * @param string $id: the skype id or phone number
     * @param string|null $title the title for the link
     * @param array|null $options
     * @return string html of the skype link 
     *
     * @see link
     * @author yisraeldov
     */
    public function __call($method,$params){
        if(!in_array($method,array('call','sms','chat'))){
            throw new exception("$method is an invalid skpe action");
        }
        return $this->link($params[0],$method,$params[1],$params[2]);
    }

}