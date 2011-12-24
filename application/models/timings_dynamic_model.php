<?php if ( ! defined('BASEPATH')) die('No direct script access allowed');
/*
 * LimeSurvey
 * Copyright (C) 2007-2011 The LimeSurvey Project Team / Carsten Schmitz
 * All rights reserved.
 * License: GNU/GPL License v2 or later, see LICENSE.php
 * LimeSurvey is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 *
 *	$Id: Admin_Controller.php 11256 2011-10-25 13:52:18Z c_schmitz $
 */
class Timings_dynamic_model extends CI_Model {

	function getAllRecords($iSurveyID,$condition=FALSE)
	{
		if ($condition != FALSE)
		{
			$this->db->where($condition);
		}

		$data = $this->db->get('survey_'.$iSurveyID.'_timings');

		return $data;
	}

	function getSomeRecords($fields,$iSurveyID,$condition=FALSE,$order=FALSE)
	{
		foreach ($fields as $field)
		{
			$this->db->select($field);
		}
		if ($condition != FALSE)
		{
			$this->db->where($condition);
		}
		if ($order != FALSE)
		{
			$this->db->order_by($order);
		}
		$data = $this->db->get('survey_'.$iSurveyID.'_timings');

		return $data;
	}



    function insertRecords($iSurveyID,$data)
    {
        return $this->db->insert('survey_'.$iSurveyID.'_timings', $data);
    }

}