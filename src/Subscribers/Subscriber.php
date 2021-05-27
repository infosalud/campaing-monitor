<?php
namespace InfoSalud\CampaingMonitor\Subscribers;

use CS_REST_Subscribers;

abstract class Subscriber
{
    /**
     * The CM api key.
     *
     * @var string
     */
    protected $apiKey;
    /**
     * Create a new WelcomeEmail instance.
     *
     * @param string|null $apiKey
     */
    public function __construct($apiKey = null)
    {
        $this->apiKey = $apiKey ?: config('campaing-monitor.key');
    }

    /**
     * Add subscriber to list.
     *
     * @param  $user
     * @return \CS_REST_Wrapper_Result
     */
    public function add($user)
    { 
        $mailer = $this->newTransaction();
        return $mailer->add([
            'EmailAddress' => $user['email'],
            'Name' => $user['name'],
            'Resubscribe' => true,
            'ConsentToTrack' => 'yes',
        ]);
    }

    /**
     * Create a new CM smart email instance.
     *
     * @return CS_REST_Subscribers
     */
    protected function newTransaction()
    {
        return new CS_REST_Subscribers(
            $this->getListId(), $this->apiKey
        );
    }

    /**
     * Get the list id.
     *
     * @return string
     */
    protected abstract function getListId();
}
