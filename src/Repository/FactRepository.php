<?php

namespace App\Repository;

use Psr\Http\Client\ClientInterface;
use App\Model\Fact;
use App\Model\FactCollection;
use Psr\Http\Client\RequestExceptionInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\RequestInterface;
use App\Exception\InvalidResponseBodyException;
use App\Exception\HttpResponseException;
use App\Exception\InvalidCollectionObjectException;
use App\Exception\InvalidFactTypeException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Client;
use DateTimeImmutable;
use App\Model\Status;
use App\Model\User;
use stdClass;


/**
 * Description of FactRepository
 *
 * @author vasil
 */
class FactRepository 
{
    
    /**
     * 
     * @var string
     */
    protected string $baseUrl;
    
    /**
     * 
     * @var ClientInterface
     */
    protected ClientInterface $httpClient;
    
    /**
     * Creates fact repository object
     * 
     * @param ClientInterface $httpClient
     * @param string $baseUrl
     * @return mixed
     */
    public function __construct(ClientInterface $httpClient, string $baseUrl)
    {
        $this->httpClient = $httpClient;
        $this->baseUrl = $baseUrl;
    }
    
    /**
     * Generates a single fact
     * 
     * @param string $id
     * @return Fact
     */
    public function getFact(string $id): Fact
    {
        $request = $this->createRequest(
            $this->baseUrl . '/facts/' . $id
        );
        $response = $this->httpClient->sendRequest($request);
        $this->ensureHttpResponseOK($response);
        $body = $response->getBody();
        
            
            $decoded = $this->decodeResponceBody($body);
            $fact = $this->createFact($decoded);
        
        return $fact;
        
    }
    
    /**
     *  Generates the random list
     * 
     * @param int $amount
     * @param string $animalType
     * @return FactCollection
     */
   public function getRandomList(int $amount = 1, 
           string $animalType = Fact::CAT): FactCollection {
       
       $request = $this->createRequest(
            $this->baseUrl . '/facts/random', [
                'amount' => $amount,
                'animal_type' => $animalType,
               ]);
       
       
        $response = $this->httpClient->sendRequest($request);
        $this->ensureHttpResponseOK($response);
        $body = $this->decodeResponseBody($response->getBody());
        
        
        $factCollenction = new FactCollection();
        
            foreach ($body as $object) {
                $factCollenction->append($this->createFact($object));
            }
        
        return $factCollenction;
    }
   
    /**
     * Creates the fact object
     * 
     * @param stdClass $object
     * @return \App\Model\Fact
     */
    protected function createFact(stdClass $object) : Fact
    {

        $fact = new Fact();
        $fact->setId($object->_id)
            ->setText($object->text)
            ->setType($object->type);
        $fact->setCreatedAt(
            DateTimeImmutable::createFromFormat(
                'Y-m-d\TH:i:s\.v\Z', $object->createdAt)
        );
        $fact->setUpdatedAt(
            DateTimeImmutable::createFromFormat(
                   'Y-m-d\TH:i:s\.v\Z', $object->updatedAt)
        );
        
        $status = new Status($object->status->verified, 
                $object->status->sentCount);
        $fact->setStatus($status);
        
        
        $user = new User($object->user->_id, $object->user->photo,
                [
                    'first' => $object->user->name->first, 
                    'last' => $object->user->name->last
                ]
            );
            
        $fact->setAuthor($user);
        

        return $fact;
    }
       
    
        
    /**
     * Creating the HTTP request
     * 
     * @param string $endPoint
     * @param array $params
     * @return RequestInterface
     */
    protected function createRequest(
        string $endPoint,
        array $params = []
    ): RequestInterface {
        
        $adress = sprintf('%s?%s', $endPoint, http_build_query($params));
        
        $request = new Request('GET', $adress);
        return $request;
    }
    
    
    /**
     * Decoding the body of the response
     * 
     * @param StreamInterface $body
     * @throws InvalidResponseBodyException
     */
    protected function decodeResponseBody(StreamInterface $body)
    {
        try {
            return json_decode($body);
        } catch (Exception $ex) {
            throw new InvalidResponseBodyException($ex);
        }
 
    }
    
    
    /**
     * Ensuring that the status is OK
     * 
     * @param ResponseInterface $response
     * @return void
     * @throws HttpResponseException
     */
    protected function ensureHttpResponseOk(ResponseInterface $response) : void
    {
         if ($response->getStatusCode() !== 200) {
            
            throw new HttpResponseException(
            sprintf($response->getStatusCode())
            );
        }
    }
    
}

