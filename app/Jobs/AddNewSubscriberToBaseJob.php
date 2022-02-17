<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class AddNewSubscriberToBaseJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $new_subscriber;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($new_subscriber)
    {
        $this->new_subscriber = $new_subscriber;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        require_once('/var/www/html/materials/app/Sendinblue/Configuration.php');

        $config = \SendinBlue\Client\Configuration::getDefaultConfiguration()
            ->setApiKey('api-key', env('MAIL_SENDINBLUE_API_KEY'));

        $apiInstance = new \SendinBlue\Client\Api\ContactsApi(
            new \GuzzleHttp\Client(),
            $config
        );
        $createContact = new \SendinBlue\Client\Model\CreateDoiContact(); // Values to create a contact
        $createContact['email'] = $this->new_subscriber;
        $createContact['includeListIds'] = array((int)env('MAIL_SENDINBLUE_LIST_ID'));
        $createContact['templateId'] = 1;
        $createContact['redirectionUrl'] = 'https://plazma-russia.store';

        $apiInstance->createDoiContact($createContact);
    }
}
