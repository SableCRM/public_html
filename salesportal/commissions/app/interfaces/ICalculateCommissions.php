<?php

	namespace Commissions\interfaces;

	interface ICalculateCommissions
	{
		function calculate(ICalculatorData $data);

		function getResult();
	}