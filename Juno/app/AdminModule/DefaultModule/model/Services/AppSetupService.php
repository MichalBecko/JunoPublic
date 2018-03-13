<?php

namespace DefaultModule\Services;

use Nette;

/**
 * Description of AppSetup
 *
 * @author Vladino
 */
class AppSetupService extends Nette\Object {
    
    /**
     * Name of information system
     * @var string 
     */
    public $informationSystemName = "Juno";
    
    /**
     * Project name
     * @var string
     */
    public $projectName = "Testing tool";
    
    public $version = "v0.9";
    
    public $countModuls = "14";
    
    /**
     * Developer information
     * @var array
     */
    public $developer = array(
	"name" => "DENEVY Slovakia, s.r.o.",
        "ceo" => "Andrej Hyben",
        "phone" => "+420 773 473 360",
        "phonedev" => "+421 911 355 123",
        "eMail" => "ahyben@denevy.eu",
	"street" => "Prievozská 4D, Blok E",
	"city" => "Bratislava",
	"psc" => "821 09",
        "state" => "Slovenská republika",
	"webLink" => "http://www.denevy.eu",
	"facebookLink" => "https://www.facebook.com/denevy",
        "billingAddress" => array(
            "name" => "DENEVY Slovakia, s.r.o.",
            "street" => "Prievozská 4D, Blok E",
            "city" => "Bratislava",
            "psc" => "821 09",
            "state" => "Slovenská republika",
            "ic" => "51191849",
            "dic" => "2120624451",
            "icdph" => "SK2120624451"
        ) 
    );
    
}
