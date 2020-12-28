<?php
 namespace MailPoetVendor\Doctrine\DBAL\Logging; if (!defined('ABSPATH')) exit; class DebugStack implements \MailPoetVendor\Doctrine\DBAL\Logging\SQLLogger { public $queries = array(); public $enabled = \true; public $start = null; public $currentQuery = 0; public function startQuery($sql, array $params = null, array $types = null) { if ($this->enabled) { $this->start = \microtime(\true); $this->queries[++$this->currentQuery] = array('sql' => $sql, 'params' => $params, 'types' => $types, 'executionMS' => 0); } } public function stopQuery() { if ($this->enabled) { $this->queries[$this->currentQuery]['executionMS'] = \microtime(\true) - $this->start; } } } 