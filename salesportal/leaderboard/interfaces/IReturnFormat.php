<?php

	namespace Leaderboard\interfaces;

	interface IReturnFormat extends IReturnJson, IReturnXml
	{
		function getJson();

		function getXml();
	}