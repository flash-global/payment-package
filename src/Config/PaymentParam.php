<?php

namespace Fei\Service\Payment\Package\Config;

use Fei\ApiClient\Transport\SyncTransportInterface;
use ObjectivePHP\Config\SingleDirective;

/**
 * Class PaymentParam
 *
 * @package Fei\Service\Payment\Package\Config
 */
class PaymentParam extends SingleDirective
{
    /** @var  string */
    protected $baseUrl;

    /** @var SyncTransportInterface $transport  */
    protected $transport;
    
    /**
     * Get BaseUrl
     *
     * @return string
     */
    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    /**
     * Set BaseUrl
     *
     * @param string $baseUrl
     *
     * @return PaymentParam
     */
    public function setBaseUrl(string $baseUrl): self
    {
        $this->baseUrl = $baseUrl;

        return $this;
    }

    /**
     * Get Transport
     *
     * @return SyncTransportInterface
     */
    public function getTransport(): SyncTransportInterface
    {
        return $this->transport;
    }

    /**
     * Set Transport
     *
     * @param SyncTransportInterface $transport
     *
     * @return PaymentParam
     */
    public function setTransport(SyncTransportInterface $transport): self
    {
        $this->transport = $transport;

        return $this;
    }
}
