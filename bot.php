<?php
require 'vendor/autoload.php';
use PhpSlackBot\Bot;



// Custom command
/*
 *  "Montag Name" -> Speichere namen in montag. Andere Tage genauso
 *  "Dienst" => Alle Tage mit dem Namen
 *  "Dienst Montag" => gibt namen von dem der Montag Küchendienst hat.
 *
 * */
class KuechenDienst extends \PhpSlackBot\Command\BaseCommand {

    private $service = array(
            "monday" => "Sebastian",
            "tuesday" => "phil",
            "wednesday"=>"stephan",
            "thursday"=>"chris",
            "friday"=>"keli"
        );



    protected function configure() {
        // We don't have to configure a command name in this case
    }

    protected function execute($data, $context) {
        if ($data['type'] == 'message') {

            $input = explode(" ", $data['text'], 2);


            switch($input[0]){
                case '!kuechendienst':
                    //$channel = $this->getChannelNameFromChannelId($data['hi']);
                    //$username = $this->getUserNameFromUserId($data['user']);
                    //$mymessage = "today is " . $data['text'];
                    //$mymessage = $this->getService("Monday");
                    // $this->setService("monday", "phil");

                    $mymessage = $this->getService();
                    $this->send($this->getCurrentChannel(), null, $mymessage);
                    break;

                case 'monday':
                    //$channel = $this->getChannelNameFromChannelId($data['hi']);
                    //$username = $this->getUserNameFromUserId($data['user']);
                    //$mymessage = "input0: " . $input[0] . " und input1: " . $input[1];
                    $this->setService($input[0],$input[1]);
                     $this->send($this->getCurrentChannel(), null, "Ok. I set ".$input[1]." for monday");
                    //$this->send($this->getCurrentChannel(), null, $mymessage);
                break;

                case 'tuesday':
                    //$channel = $this->getChannelNameFromChannelId($data['hi']);
                    //$username = $this->getUserNameFromUserId($data['user']);
                    //$mymessage = "input0: " . $input[0] . " und input1: " . $input[1];
                    $this->setService($input[0],$input[1]);
                     $this->send($this->getCurrentChannel(), null, "Ok. I set ".$input[1]." for tuesday");
                    //$this->send($this->getCurrentChannel(), null, $mymessage);
                    break;

                case 'wednesday':
                    //$channel = $this->getChannelNameFromChannelId($data['hi']);
                    //$username = $this->getUserNameFromUserId($data['user']);
                    //$mymessage = "input0: " . $input[0] . " und input1: " . $input[1];
                    $this->setService($input[0],$input[1]);
                     $this->send($this->getCurrentChannel(), null, "Ok. I set ".$input[1]." for wednesday");
                    //$this->send($this->getCurrentChannel(), null, $mymessage);
                    break;

                case 'thursday':
                    //$channel = $this->getChannelNameFromChannelId($data['hi']);
                    //$username = $this->getUserNameFromUserId($data['user']);
                    //$mymessage = "input0: " . $input[0] . " und input1: " . $input[1];
                    $this->setService($input[0],$input[1]);
                     $this->send($this->getCurrentChannel(), null, "Ok. I set ".$input[1]." for thursday");
                    //$this->send($this->getCurrentChannel(), null, $mymessage);
                    break;

                case 'friday':
                    //$channel = $this->getChannelNameFromChannelId($data['hi']);
                    //$username = $this->getUserNameFromUserId($data['user']);
                    //$mymessage = "input0: " . $input[0] . " und input1: " . $input[1];
                    $this->setService($input[0],$input[1]);
                    $this->send($this->getCurrentChannel(), null, "Ok. I set ".$input[1]." for friday");
                 
                    //$this->send($this->getCurrentChannel(), null, $mymessage);
                    break;
                default:$this->send($this->getCurrentChannel(), null, "Sorry i don't understand. U have to write anything like 'monday vanessa' :)");

            }

            }





        }

    public function getService() {
        //IF day is empty then return all days : "Day: Name, Day2: Name2..."
        $result = "";
        foreach($this->service as $key => $value) {
            $result = $result .  $key ."->". " $value ". ".";
        }
        return $result;
    }

    public function setService($day, $name) {
        $this->service[$day] = $name;
    }
}




$bot = new Bot();
$bot->setToken('xoxb-465136225858-464489647936-DrXOXVU2Q3XRNoZbAgFq2eL5'); // Get your token here https://my.slack.com/services/new/bot
$bot->loadCommand(new KuechenDienst());
$bot->loadInternalCommands(); // This loads example commands
$bot->enableWebserver(8080, 'secret');
$bot->run();
?>
