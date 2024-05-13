<?php
namespace Bank\Mace\Infrastructure;

use Bank\Mace\Application\Domain\Account;
use Ramsey\Uuid\Uuid;
use Bank\Mace\Application\UseCase\UseCase;
use Bank\Mace\Application\UseCase\UseCaseInterface;

class Controller {

    private UseCaseInterface $usecase;

    public function __construct(){
        $this->usecase =  new UseCase();
    }
    
    public static function instance (){

        return new Controller();
    }

    /**
     * @POST
     */
    public function createAccount($request,$response, $args)
    {

        $json= $request->getBody();
        $data = json_decode($json, true); 



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

     
        $this->usecase->withdraw($data['idAccount'],$data['amount']);

        $response->getBody()->write("Sucessful withdraw");
        
        return $response;
    }

    /**
     * @POST
     */

    public function deposit($request,$response, $args){

        $json= $request->getBody();
        $data = json_decode($json, true); 

        // GET ACCOUNT BY REPOSITORY
        // CALL FUNCTION TO deposit
        // SAVE IN DATABASE
        

        $this->usecase->deposit($data['idAccount'],$data['amount']);

        $response->getBody()->write("Sucessful deposit");
        
        return $response;
    }

    /**
     * @GET
     */
    public function statement($request,$response, $args){

        $idAccount = $args["idAccount"];

        // GET ACCOUNT BY REPOSITORY
        // CALL FUNCTION GET ALL STATEMENT
        // SAVE IN DATABASE
        
        $this->usecase->statement($idAccount);


        $response->getBody()->write("Sucessful deposit");
        
        return $response;
    }

     /**
     * @GET
     */
    public function balance($request,$response, $args){

        $customerId = $args["idAccount"];

        // GET ACCOUNT BY REPOSITORY
        // CALL FUNCTION TO SHOW BALANCEs
        // SAVE IN DATABASE
        


        $response->getBody()->write("Sucessful deposit");
        
        return $response;
    }

    /**
     * @POST
     */

     public function transaction($request,$response, $args){

        $json= $request->getBody();
        $data = json_decode($json, true); 

        // GET ACCOUNT A AND B BY REPOSITORY
        // INSTANCE TRANSACTION
        // SAVE IN DATABASE
        


        $response->getBody()->write("Sucessful deposit");
        
        return $response;
    }

     /**
     * @GET
     */
    public function bankTransactonalHistory($request,$response, $args){


        // GET transactions from the bank
        // CALL FUNCTION TO SHOW transactions
        // SAVE IN DATABASE
        


        $response->getBody()->write("Sucessful deposit");
        
        return $response;
    }
}