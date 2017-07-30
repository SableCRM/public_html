<?php

	namespace Commissions\plans;

	use Commissions\classes\CommissionBase;

	class PowerHome_W2 extends CommissionBase
	{
		protected $calcName = "COMM_W2_CALC";

		protected function setParams()
		{
			$contractTerm = explode(" ", $this->deal["Contract Term"]);

			$src = $this->deal['Lead Source'];

			if($src == "Self Generated"){
				$selfGen = "SELF";
			} else{
				$selfGen = "COMPANY";
			}

			$this->params = [
				$this->deal['Sales Person'],
				$this->deal['Contact Name'],
				$this->deal['Install Date and Time'],
				$this->deal['RMR'],
				$this->deal['Contact Credit Score'],
				$this->deal[''],
				$this->user['Commission Plan'],
				$this->user['Sub Plan'],
				(strtolower($this->deal['Easy Pay Method']) == 'ach') ? true : false,
				$this->deal['Activation Fee'],
				(strtolower($this->deal['Monitoring Level']) == 'landline') ? false : true,
				$selfGen,
				$this->deal['Account Type'],
				$this->deal[''],
				$this->deal['Total Points'],
				$this->deal['Amount'],
				$contractTerm[0],
			];
		}
	}