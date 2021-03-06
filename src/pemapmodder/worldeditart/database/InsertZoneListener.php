<?php

/*
 * WorldEditArt
 *
 * Copyright (C) 2015 PEMapModder
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author PEMapModder
 */

namespace pemapmodder\worldeditart\database;

use pemapmodder\worldeditart\database\stream\QueryListener;
use pemapmodder\worldeditart\database\stream\QueryResult;

class InsertZoneListener implements QueryListener{
	/** @var Zone */
	private $zone;
	/** @var MysqlDataProvider */
	private $dataProvider;

	public function __construct(MysqlDataProvider $dataProvider, Zone $zone){
		$this->zone = $zone;
		$this->dataProvider = $dataProvider;
	}
	public function onResult(QueryResult $result){
		$this->zone->setId($result->insertId);
		$this->dataProvider->onAddedZoneCallback($this->zone);
	}
}
