<?php

	namespace Commissions\plans;

	use Commissions\classes\CommissionBase;

	class PowerHome_1099 extends CommissionBase
	{
		protected $calcName = "COMM_1099_CALC";

		protected function setParams()
		{
			$this->params = [
				$this->deal["Sales Person"],
				$this->deal["Contact Name"],
				$this->deal["Install Date and Time"],
				$this->deal["RMR"],
				$this->deal["Monitoring Level"],
				$this->user["Commission Plan"],
				$this->user["Sub Plan"],
				$this->deal["Contract Term"],
				$this->deal["Total Points"],
				$this->deal["Activation Fee"],
				$this->deal["Residential/Commercial"],
				$this->deal["Easy Pay Method"],
				$this->deal["Amount"],
				$this->deal["Lead Source"],
				$this->deal["Contact Credit Score"],
			];
		}
	}