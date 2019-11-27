<?php

interface Payable
{
    public function pay($amount):bool;
}

interface CanCalculate
{
    public function calculate():int;
}

class Payme implements Payable, CanCalculate
{

    public function pay($amount): bool
    {
        if ($amount < 500) {
            echo "Kamida 500 sum to'lanishi kerak Paymeda";
            return false;
        } else {
            echo "Pay me orqali to'landi";
            return true;
        }

    }

    public function calculate(): int
    {
        return 100;
    }
}

class Click implements Payable, CanCalculate
{

    public function pay($amount): bool
    {
        echo "Click orqali to'landi";
        return true;
    }

    public function calculate(): int
    {
        return 200;
    }
}

class Paynet implements Payable, CanCalculate
{

    public function pay($amount): bool
    {
        if ($amount < 2000) {
            echo "Kamida 2000 to'lash kerak paynetda";
            return false;
        }
        echo "Paynet orqali to'landi";
        return true;
    }

    public function calculate(): int
    {
        return 300;
    }
}

class Paypal implements Payable, CanCalculate {

    public function pay($amount): bool
    {
        echo "Paypal orqali to'landi";
        return true;
    }

    public function calculate(): int
    {
        return 400;
    }
}



$type = $_GET['type']??'';
$paymentMethod= new Payme();
if ($type == 'paynet') {
    $paymentMethod = new Paynet();
}
if ($type == 'click') {
    $paymentMethod = new Click();
}

makePayment(new Paypal(),1000);
calculateTotal(new Paynet());





function makePayment(Payable $paymentMethod, $amount)
{
    $paymentMethod->pay($amount *1.05);
    echo "<br/>";
}
function calculateTotal(CanCalculate $paymentMethod)
{
    echo  $paymentMethod->calculate()*1.05;
    echo "<br/>";
}
die();