<a href="https://code.tutsplus.com/tutorials/design-patterns-the-strategy-pattern--cms-22796" target="_blank">Documentation</a>
<hr>
<?php 
	//Strategy
	//https://code.tutsplus.com/tutorials/design-patterns-the-strategy-pattern--cms-22796
	interface payStrategy{
		public function pay($amount);
	}

	class payCC implements payStrategy{
		public function pay($amount){
			echo "payCC, amount " . $amount;
		}
	}

	class payBB implements payStrategy{
		public function pay($amount){
			echo "payBB, amount " . $amount;
		}
	}

	class Cart{
		public $amount;

		public function payAmount(){
			if($this->amount < 50) $payment = new payCC();
			else $payment = new PayBB();
			
			$payment->pay($this->amount);
		}
	}

	$cart = new Cart();
	$cart->amount = 60;
	$cart->payAmount();
 ?>