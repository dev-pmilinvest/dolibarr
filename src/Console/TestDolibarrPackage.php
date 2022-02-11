<?php
namespace Pmilinvest\Dolibarr\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Pmilinvest\Dolibarr\Dolibarr;

class TestDolibarrPackage extends Command
{
    protected $signature = 'dolibarr:test';

    protected $description = 'Test the Dolibarr Package';

    public function showMenu(){
        $this->output->title('MENU DES FONCTIONS API Dolibarr');
        $this->choix = $this->choice(
            'Choisir la fonction API',
            [
                'getTiers' => 'getTiers()',
                'getContacts' =>  'getContacts()',
                'configuration' =>  'Voir la configuration',
                'quitter' =>  'QUITTER',
            ]);
    }

    public function handle()
    {
        $this->output->title('PMIL Invest Laravel Dolibarr Package');

        $this->dolibarr = new Dolibarr();


        $this->showMenu();
        while ($this->choix != 'quitter'){

            switch ($this->choix){

                case 'configuration':

                    $headers = ['Nom','Valeur'];

                    $data = [
                        [
                            "Nom" => "API Url",
                            "Valeur" => config('dolibarr.dolibarr_server')."/api/index.php",

                        ],

                        [
                            "Nom" => "Utilisateur",
                            "Valeur" => config('dolibarr.dolibarr_api_user'),

                        ],                        [
                            "Nom" => "Password",
                            "Valeur" => config('dolibarr.dolibarr_api_password'),

                        ],                        [
                            "Nom" => "Token",
                            "Valeur" => $this->dolibarr->token,

                        ],

                    ];


                    $this->table($headers, $data);
                    $this->output->newLine(2);
                    break;

                case'getTiers':
                    $clients = $this->dolibarr->getTiers('BBI',);

                    $this->info( 'Trouvé: ' . count($clients));

                    foreach($clients as $client) {
                         dump($client);
//            dump([
//            'name' => $client['name'],
//            'address' => $client['address'],
//            'zip' => $client['zip'],
//            'town' => $client['town'],
//        ]);
                    }

                    break;

                case'getContacts':
                    $contacts = $this->dolibarr->getContacts('BBI');
                    dump($contacts);

                    break;
                default:
                    dump($this->choix);
            }
            $this->showMenu();
        }


        return 0;
    }
}
