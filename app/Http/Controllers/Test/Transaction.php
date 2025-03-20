<?php

namespace  App\Http\Controllers\Test;

use App\Http\Controllers\Test\Request;
use App\Http\Controllers\Test\Cryptor;

class Transaction {

	public function c2b($data) {
		$url = "https://api.sandbox.vm.co.mz:18352/ipg/v1x/c2bPayment/singleStage/";

		$params = [
			"input_TransactionReference" => "T12344C",
			"input_CustomerMSISDN" => $data["client_number"],
			"input_Amount" => $data["value"],
			"input_ThirdPartyReference" => (isset($data["transaction_id"]) ? $data["transaction_id"] : Cryptor::getId()),
			"input_ServiceProviderCode" => $data["agent_id"],
		];
		$params = json_encode($params);
		$request = new Request();

        return json_decode($request->post($url, $params));
	}

	public function b2c($data, $callback) {
		$url = "https://api.sandbox.vm.co.mz:18345/ipg/v1x/b2cPayment/";
		$params = [
			"input_TransactionReference" => "T12344C",
			"input_CustomerMSISDN" => $data["client_number"],
			"input_Amount" => $data["value"],
			"input_ThirdPartyReference" => (isset($data["transaction_id"]) ? $data["transaction_id"] : Cryptor::getId()),
			"input_ServiceProviderCode" => $data["agent_id"],
		];
		$params = json_encode($params);
		$request = new Request();

        return json_decode($request->post($url, $params));
	}

	public function b2b($data) {
		$url = "https://api.sandbox.vm.co.mz:18349/ipg/v1x/b2bPayment/";
		$params = [
			"input_TransactionReference" => "T12344C",
			"input_ReceiverPartyCode" => $data["agent_receiver_id"],
			"input_Amount" => $data["value"],
			"input_ThirdPartyReference" => (isset($data["transaction_id"]) ? $data["transaction_id"] : Cryptor::getId()),
			"input_PrimaryPartyCode" => $data["agent_id"],
		];
		$params = json_encode($params);
		$request = new Request();
		return json_decode($request->post($url, $params));
	}
}
