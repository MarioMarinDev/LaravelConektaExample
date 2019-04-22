<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Conekta\Conekta;
use Conekta\Customer;
use Conekta\Order;

class PaymentController extends Controller {

  public function form(Request $request) {
    return view('conekta_example.form');
  }

  public function payment(Request $request) {

    Conekta::setApiKey("key_8oA5BXaKGqEoJaMYyzZinw");
    // setApiVersion();
    $data = (object) $request->all();

    $customer = $this->createCustomer($data);
    $data->customer = $customer;

    $order = $this->createOrder($data);
    $data->order = $order;

    return dd($data);
  }

  public function createCustomer($request) {
    try {
      $customer = Customer::create(array(
        "name" => $request->name,
        "email" => $request->email,
        "payment_sources" => array(array(
          "type" => "card",
          "token_id" => $request->conektaTokenId
        ))
      ));
    } catch(Conekta\ProcessingError $error) {
      return $error;
    } catch(Conekta\ParameterValidationError $error) {
      return $error;
    } catch(Conekta\Handler $error) {
      return $error;
    }
    return $customer;
  }

  public function createOrder($request) {
    $amount = 50;
    try {
      $order = Order::create(array(
        "amount" => $amount,
        "line_items" => array(array(
          "name" => "Prueba",
          "unit_price" => $amount * 100,
          "quantity" => 1
        )),
        "currency" => "MXN",
        "customer_info" => array(
          "customer_id" => $request->customer->id,
        ),
        "charges" => array(array(
          "payment_method" => array(
            "type" => "default"
          )
        ))
      ));
    } catch(Conekta\ProcessingError $error) {
      return $error;
    } catch(Conekta\ParameterValidationError $error) {
      return $error;
    } catch(Conekta\Handler $error) {
      return $error;
    }
    return $order;
  }

}
?>
