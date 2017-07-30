<?php

	namespace Commissions\plans;

	use Commissions\classes\CommissionBase;

	class A1_COMM_CALC extends CommissionBase
	{
		protected $calcName = "A1_COMM_CALC";

		protected function setParams()
		{
			$this->params = [
				$this->user["Commission Plan"],
				$this->deal["Package Type"],
				$this->deal["Plan Name"],
				$this->deal["Sales Person"],
				$this->deal["Total Points"],
				$this->deal["RMR"],
				$this->deal["Amount"],
				$this->deal["Activation Fee"],
			];
		}
	}