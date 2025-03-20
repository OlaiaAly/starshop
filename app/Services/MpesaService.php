<?php
namespace App\Services;

use App\Http\Controllers\Test\Mpesa;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response as HttpResponse;

class MpesaService{

    private string $apiKey;

    private string $publicKey;

    private bool $ssl;

    private int $agentId;

    private mixed $mpesa;

    public function __construct(){
        set_time_limit(60);
        $this->apiKey       = env('M_PESA_API_KEY');
        $this->publicKey    = env('M_PESA_PUBLIC_KEY');
        $this->ssl          = env('M_PESA_SSL');
        $this->agentId      = env('M_PESA_AGENT_ID');
        $this->mpesa        =  Mpesa::init($this->apiKey, $this->publicKey, $this->ssl);
    }

    /**
     * Method responsable to send money to the consumer to
     * the the compony
     * @param string  $telephone
     * @param string $aumount
     * @return HttpResponse
     */
    public function C2B($parameters){
        $data = [
            "value"         =>  $parameters['amount'],
            "agent_id"      => $this->agentId,
            "client_number" => "258{$parameters['telephone']}",
        ];

        try{
            return  $this->mpesa->c2b($data);
        } catch (\Exception $e) {
            throw new HttpResponseException(response()->json(['error' => $e->getMessage()], 500));
        }                                                                                             

    }

    public function B2C(string $telephone, string $aumount){
        $data = [
            "value" => $aumount,
            "agent_id" => $this->agentId,
            "client_number" => "258{$telephone}",
        ];

        try{
            return $this->mpesa->b2c($data);
        }catch(\Exception $e){
            throw new HttpResponseException(response()->json(['error' => $e->getMessage()], 500));
        }      
    }
}
