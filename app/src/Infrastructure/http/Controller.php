<?php
namespace Bank\Mace\Infrastructure\Http;

use Bank\Mace\Application\Domain\Account;
use Ramsey\Uuid\Uuid;
use Bank\Mace\Application\UseCase\UseCase;
use Bank\Mace\Application\UseCase\UseCaseInterface;

class Controller {

    private UseCaseInterface $usecase;

    public function __construct(UseCase $useCase){
        $this->usecase =  $useCase;
    }
    
    public static function instance (UseCase $useCase){

        return new Controller($useCase);
    }

    /**
     * @POST
     */
    public function createAccount($request,$response, $args)
    {

        $json= $request->getBody();
        $data = json_decode($json, true); 

        $this->usecase->createAccount($data['idCustomer']);

        $response->getBody()->write("Account Registered");

        return $response;
    } 

    /**
     * @POST
     */
    public function customerRegister($request,$response, $args){
        
        $json= $request->getBody();
        $data = json_decode($json, true); 

        $this->usecase->customerRegister($data['name'],$data['phone'], $data['address']);
    
        $response->getBody()->write("Customer Registered");
        
        return $response;
    }

     /**
     * @POST
     */
    public function withdraw($request,$response, $args){

        $json= $request->getBody();
        $data = json_decode($json, true); 

     
        $this->usecase->withdraw($data['idAccount'], $data['amount']);

        $response->getBody()->write("Sucessful withdraw");
        
        return $response;
    }

    /**
     * @POST
     */

    public function deposit($request,$response, $args){

        $json= $request->getBody();
        $data = json_decode($json, true); 

        $this->usecase->deposit($data['idAccount'],$data['amount']);

        $response->getBody()->write("Sucessful deposit");
        
        return $response;
    }

    /**
     * @GET
     */
    public function statement($request,$response, $args){

        $idAccount =  $request->getAttribute('idAccount');

        $history = $this->usecase->statement($idAccount);
        
        $response->getBody()->write(json_encode($history,true));

        return $response->withHeader('Content-type', 'application/json')->withStatus(200);
    }

     /**
     * @GET
     */
    public function balance($request,$response, $args){

        $idAccount = $args["idAccount"];
       
        $balance = $this->usecase->balance($idAccount);
        
        $response->getBody()->write(json_encode($balance,true));

        return $response->withHeader('Content-type', 'application/json')->withStatus(200);
    }

    /**
     * @POST
     */

     public function transaction($request,$response, $args){

        $json= $request->getBody();
        $data = json_decode($json, true); 

        $this->usecase->makeTransaction($data["account-sender"], $data["account-receiver"], $data["amount"]);
     
        $response->getBody()->write("Sucessful deposit");
        
        return $response;
    }

}