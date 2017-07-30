<?php

	namespace Commissions\classes;

	use Commissions\interfaces\ICalculatorData;

	abstract class CommissionBase implements ICalculatorData
	{
		protected $crm;
		protected $deal;
		protected $user;
		protected $query;
		protected $params;
		protected $calcName;
		protected $commission;
		protected $calculatorParams;

		public function __construct(RunCommissions $crm)
		{
			$this->crm = $crm;

			$this->deal = $this->crm->getDeal();

			$this->user = $this->crm->getUserFromDeal($this->deal);

			$this->setParams();

			$this->setCalculatorData();

			$this->setQuery();

			$this->commission = $this->crm->getCommission($this);
		}

		protected abstract function setParams();

		private function setCalculatorData()
		{
			foreach($this->params as $key => $val){
				$key = strtoupper($key);

				$this->calculatorParams[":".$key] = $val;
			}
		}

		private function setQuery()
		{
			$this->query = "CALL ".$this->calcName."(".implode(", ", array_keys($this->calculatorParams)).", @COMMISSION)";
		}

		public function getCalculatorData()
		{
			return $this->calculatorParams;
		}

		public function getResult()
		{
			if($this->commission == false){
				throw new \Exception("Unable to run calculator, please check parameters and try again later.");
			}

			return $this->commission;
		}

		public function getQuery()
		{
			return $this->query;
		}
	}