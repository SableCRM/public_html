<?php

	namespace Commissions\plans;

	use Commissions\classes\CommissionBase;

	class GuardMe_Comm_Calc_1 extends CommissionBase
	{
		protected $calcName = "COMM_CALC_1";

		protected function setParams()
		{
			$this->params = [
				$this->deal["POTENTIALID"],
				$this->deal["CONTACTID"],
				$this->deal["Contact Name"],
				$this->deal["Sales Person_ID"],
				$this->deal["Sales Person"],
				$this->deal["Install Date and Time"],
				$this->deal["Funded Date"],
				null,
				$this->deal["Easy Pay Method"],
				$this->deal["Residential/Commercial"],
				$this->deal["Source"],
				$this->deal["Package Type"],
				$this->deal["Total Points"],
				$this->deal["Invoice Amount"],
				$this->deal["Activation Fee"],
				$this->deal["Invoice RMR"],
			];
		}
	}