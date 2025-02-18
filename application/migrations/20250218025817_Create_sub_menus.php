<?php

/**
 * CMS Inferno Framework
 *
 * A place to share your thoughts and ideas
 *
 * Copyright (c) 2024 ICE IT Solutions. All rights reserved.
 *
 * CMS Inferno Framework and its user interface are protected by trademark
 * and other pending or existing intellectual property
 * rights in the Philippines.
 */
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_sub_menus extends CI_Migration
{
	function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'menu_id' => array(
				'type' => 'integer',
				'null' => TRUE,
			),
			'name' => array(
				'type' => 'varchar',
				'constraint' => 255,
				'null' => TRUE,
			),
			'url' => array(
				'type' => 'varchar',
				'constraint' => 255,
				'null' => TRUE,
			),
			'sort_order' => array(
				'type' => 'integer',
				'null' => TRUE,
			),

		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('sub_menus');
	}

	function down()
	{
		$this->dbforge->drop_table('sub_menus');
	}
}
