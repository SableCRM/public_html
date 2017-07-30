<?php

	namespace Commissions\interfaces;

	interface IDatabaseOperations
	{
		function getData($query, $params = []);

		function setData($query, $params = []);

		function updateData($query, $params = []);

		function removeData($query, $params = []);
	}