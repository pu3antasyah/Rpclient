<?php


namespace Afiqiqmal\Rpclient\RPay;


use Afiqiqmal\Rpclient\HttpClient\ApiRequest;

class RPDirectPay
{
    /**
     * @var ApiRequest
     */
    protected $client;

    protected $path = "collections";

    protected $collectionId = null;

    public function __construct(RaudhahClient $request)
    {
        $this->client = $request->getClient();
    }

    /**
     * @param string $collection_code
     * @return RPDPPayee
     */
    public function payee(string $collection_code) {
        $this->collectionId = $collection_code;
        return new RPDPPayee($this);
    }

    public function payer(string $collection_code) {
        $this->collectionId = $collection_code;
        return new RPDPPayer($this);
    }

    /**
     * @return null
     */
    public function getCollectionId()
    {
        if (!$this->collectionId) {
            throw new \RuntimeException("Collection Code cant be empty");
        }

        return $this->collectionId;
    }

    /**
     * @return ApiRequest
     */
    public function getClient(): ApiRequest
    {
        return $this->client;
    }

}
