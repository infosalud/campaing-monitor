<?php
namespace InfoSalud\CampaingMonitor\Emails;

use CS_REST_Transactional_SmartEmail;

abstract class Email
{
    /**
     * The CM api key.
     *
     * @var string
     */
    protected $apiKey;
    /**
     * Any applicable data for the email.
     *
     * @var array
     */
    protected $data = [];


    protected $attachment = [];


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
     * Set the email data.
     *
     * @param  array $data
     * @return $this
     */
    public function withData($data)
    {
        $this->data = $data;
        return $this;
    }
    /**
     * Send an transactional email.
     *
     * @param  $user
     * @return \CS_REST_Wrapper_Result
     */
    public function sendTo($user)
    {
        $mailer = $this->newTransaction();
        return $mailer->send([
            'To'   => $user['email'],
            'Data' => $this->getData($user),
            'Attachments' => $this->getAttachment($user)
        ], 'yes');
    }
    /**
     * Get the data for the email.
     *
     * @param  $user
     * @return array
     */
    public function getData($user)
    {
        if (method_exists($this, 'variables')) {
            return call_user_func_array(
                [$this, 'variables'],
                array_merge(compact('user'), $this->data)
            );
        }
        return $this->data;
    }


    public function getAttachment($user)
    {
        if (method_exists($this, 'attachment')) {
            return call_user_func_array(
                [$this, 'attachment'],
                array_merge(compact('user'), $this->attachment)
            );
        }

        return $this->attachment;
    }
    /**
     * Create a new CM smart email instance.
     *
     * @return CS_REST_Transactional_SmartEmail
     */
    protected function newTransaction()
    {
        return new CS_REST_Transactional_SmartEmail(
            $this->getEmailId(), ['api_key' => $this->apiKey]
        );
    }

    protected function get()
    {
        return new CS_REST_Transactional_SmartEmail(
            $this->getEmailId(), ['api_key' => $this->apiKey]
        );
    }

    /**
     * Get the email id.
     *
     * @return string
     */
    protected abstract function getEmailId();
}
