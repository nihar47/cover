<?php


class Graph_model extends CI_Model {

	public function Graph_model() {

		parent::__construct();
		return;
	}

	public function get_yearly_registration($first_date, $last_date) {

		$week_reg_arr = array();
		$temp = array();
		$this->db->select("COUNT(*) as total, YEAR(date_added) as date_added");
		$this->db->from("user");
		$this->db->where("YEAR(date_added) >=", $first_date);
		$this->db->where("YEAR(date_added) <=", $last_date);
		$this->db->group_by("YEAR(date_added)");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$res = $query->result();
			if ($res)
			{
				foreach ($res as $wtr)
				{
					$week_reg_arr[$wtr->date_added] = $wtr->total;
					continue;
				}
			}
		}
		$i = $first_date;
		while ($i <= $last_date)
		{
			if (array_key_exists($i, $week_reg_arr))
			{
				$temp[$i] = $week_reg_arr[$i];
			}
			 else 
			{
				$temp[$i] = 0;
			}
			$i++;
			continue;
		}
		return $temp;
	}

	public function get_yearly_fb_registration($first_date, $last_date) {

		$week_reg_arr = array();
		$temp = array();
		$this->db->select("COUNT(*) as total, YEAR(date_added) as date_added");
		$this->db->from("user");
		$this->db->where("YEAR(date_added) >=", $first_date);
		$this->db->where("YEAR(date_added) <=", $last_date);
		$this->db->where("fb_uid !=", "");
		$this->db->where("fb_uid !=", 0);
		$this->db->group_by("YEAR(date_added)");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$res = $query->result();
			if ($res)
			{
				foreach ($res as $wtr)
				{
					$week_reg_arr[$wtr->date_added] = $wtr->total;
					continue;
				}
			}
		}
		$i = $first_date;
		while ($i <= $last_date)
		{
			if (array_key_exists($i, $week_reg_arr))
			{
				$temp[$i] = $week_reg_arr[$i];
			}
			 else 
			{
				$temp[$i] = 0;
			}
			$i++;
			continue;
		}
		return $temp;
	}

	public function get_yearly_tw_registration($first_date, $last_date) {

		$week_reg_arr = array();
		$temp = array();
		$this->db->select("COUNT(*) as total, YEAR(date_added) as date_added");
		$this->db->from("user");
		$this->db->where("YEAR(date_added) >=", $first_date);
		$this->db->where("YEAR(date_added) <=", $last_date);
		$this->db->where("tw_id !=", "");
		$this->db->where("tw_id !=", 0);
		$this->db->group_by("YEAR(date_added)");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$res = $query->result();
			if ($res)
			{
				foreach ($res as $wtr)
				{
					$week_reg_arr[$wtr->date_added] = $wtr->total;
					continue;
				}
			}
		}
		$i = $first_date;
		while ($i <= $last_date)
		{
			if (array_key_exists($i, $week_reg_arr))
			{
				$temp[$i] = $week_reg_arr[$i];
			}
			 else 
			{
				$temp[$i] = 0;
			}
			$i++;
			continue;
		}
		return $temp;
	}

	public function get_monthly_registration($first_date, $last_date) {

		$week_reg_arr = array();
		$temp = array();
		$month_year = date("Y");
		$this->db->select("COUNT(*) as total, MONTH(date_added) as date_added");
		$this->db->from("user");
		$this->db->where("MONTH(date_added) >=", $first_date);
		$this->db->where("MONTH(date_added) <=", $last_date);
		$this->db->where("YEAR(date_added) ", $month_year);
		$this->db->group_by("MONTH(date_added)");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$res = $query->result();
			if ($res)
			{
				foreach ($res as $wtr)
				{
					$week_reg_arr[$wtr->date_added] = $wtr->total;
					continue;
				}
			}
		}
		$i = 1;
		while ($i <= 12)
		{
			if (array_key_exists($i, $week_reg_arr))
			{
				$temp[$i] = $week_reg_arr[$i];
			}
			 else 
			{
				$temp[$i] = 0;
			}
			$i++;
			continue;
		}
		return $temp;
	}

	public function get_monthly_fb_registration($first_date, $last_date) {

		$week_reg_arr = array();
		$temp = array();
		$month_year = date("Y");
		$this->db->select("COUNT(*) as total, MONTH(date_added) as date_added");
		$this->db->from("user");
		$this->db->where("MONTH(date_added) >=", $first_date);
		$this->db->where("MONTH(date_added) <=", $last_date);
		$this->db->where("fb_uid !=", "");
		$this->db->where("fb_uid !=", 0);
		$this->db->where("YEAR(date_added) ", $month_year);
		$this->db->group_by("MONTH(date_added)");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$res = $query->result();
			if ($res)
			{
				foreach ($res as $wtr)
				{
					$week_reg_arr[$wtr->date_added] = $wtr->total;
					continue;
				}
			}
		}
		$i = 1;
		while ($i <= 12)
		{
			if (array_key_exists($i, $week_reg_arr))
			{
				$temp[$i] = $week_reg_arr[$i];
			}
			 else 
			{
				$temp[$i] = 0;
			}
			$i++;
			continue;
		}
		return $temp;
	}

	public function get_monthly_tw_registration($first_date, $last_date) {

		$week_reg_arr = array();
		$temp = array();
		$month_year = date("Y");
		$this->db->select("COUNT(*) as total, MONTH(date_added) as date_added");
		$this->db->from("user");
		$this->db->where("MONTH(date_added) >=", $first_date);
		$this->db->where("MONTH(date_added) <=", $last_date);
		$this->db->where("tw_id !=", "");
		$this->db->where("tw_id !=", 0);
		$this->db->where("YEAR(date_added) ", $month_year);
		$this->db->group_by("MONTH(date_added)");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$res = $query->result();
			if ($res)
			{
				foreach ($res as $wtr)
				{
					$week_reg_arr[$wtr->date_added] = $wtr->total;
					continue;
				}
			}
		}
		$i = 1;
		while ($i <= 12)
		{
			if (array_key_exists($i, $week_reg_arr))
			{
				$temp[$i] = $week_reg_arr[$i];
			}
			 else 
			{
				$temp[$i] = 0;
			}
			$i++;
			continue;
		}
		return $temp;
	}

	public function get_weekly_registration($first_date, $last_date) {

		$week_reg_arr = array();
		$temp = array();
		$this->db->select("COUNT(*) as total, DATE(date_added) as date_added");
		$this->db->from("user");
		$this->db->where("DATE(date_added) >=", $first_date);
		$this->db->where("DATE(date_added) <=", $last_date);
		$this->db->group_by("DATE(date_added)");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$res = $query->result();
			if ($res)
			{
				foreach ($res as $wtr)
				{
					$week_reg_arr[$wtr->date_added] = $wtr->total;
					continue;
				}
			}
		}
		while (strtotime($first_date) <= strtotime($last_date))
		{
			if (array_key_exists($first_date, $week_reg_arr))
			{
				$temp[$first_date] = $week_reg_arr[$first_date];
			}
			 else 
			{
				$temp[$first_date] = 0;
			}
			$first_date = date("Y-m-d", strtotime("+1 day", strtotime($first_date)));
			continue;
		}
		return $temp;
	}

	public function get_weekly_fb_registration($first_date, $last_date) {

		$week_reg_arr = array();
		$temp = array();
		$this->db->select("COUNT(*) as total, DATE(date_added) as date_added");
		$this->db->from("user");
		$this->db->where("DATE(date_added) >=", $first_date);
		$this->db->where("DATE(date_added) <=", $last_date);
		$this->db->where("fb_uid !=", "");
		$this->db->where("fb_uid !=", 0);
		$this->db->group_by("DATE(date_added)");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$res = $query->result();
			if ($res)
			{
				foreach ($res as $wtr)
				{
					$week_reg_arr[$wtr->date_added] = $wtr->total;
					continue;
				}
			}
		}
		while (strtotime($first_date) <= strtotime($last_date))
		{
			if (array_key_exists($first_date, $week_reg_arr))
			{
				$temp[$first_date] = $week_reg_arr[$first_date];
			}
			 else 
			{
				$temp[$first_date] = 0;
			}
			$first_date = date("Y-m-d", strtotime("+1 day", strtotime($first_date)));
			continue;
		}
		return $temp;
	}

	public function get_weekly_tw_registration($first_date, $last_date) {

		$week_reg_arr = array();
		$temp = array();
		$this->db->select("COUNT(*) as total, DATE(date_added) as date_added");
		$this->db->from("user");
		$this->db->where("DATE(date_added) >=", $first_date);
		$this->db->where("DATE(date_added) <=", $last_date);
		$this->db->where("tw_id !=", "");
		$this->db->where("tw_id !=", 0);
		$this->db->group_by("DATE(date_added)");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$res = $query->result();
			if ($res)
			{
				foreach ($res as $wtr)
				{
					$week_reg_arr[$wtr->date_added] = $wtr->total;
					continue;
				}
			}
		}
		while (strtotime($first_date) <= strtotime($last_date))
		{
			if (array_key_exists($first_date, $week_reg_arr))
			{
				$temp[$first_date] = $week_reg_arr[$first_date];
			}
			 else 
			{
				$temp[$first_date] = 0;
			}
			$first_date = date("Y-m-d", strtotime("+1 day", strtotime($first_date)));
			continue;
		}
		return $temp;
	}

	public function get_yearly_projects($first_date, $last_date) {

		$week_reg_arr = array();
		$temp = array();
		$this->db->select("COUNT(*) as total, YEAR(p.date_added) as date_added");
		$this->db->from("project p");
		$this->db->where("YEAR(p.date_added) >=", $first_date);
		$this->db->where("YEAR(p.date_added) <=", $last_date);
		$this->db->group_by("YEAR(p.date_added)");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$res = $query->result();
			if ($res)
			{
				foreach ($res as $wtr)
				{
					$week_reg_arr[$wtr->date_added] = $wtr->total;
					continue;
				}
			}
		}
		$i = $first_date;
		while ($i <= $last_date)
		{
			if (array_key_exists($i, $week_reg_arr))
			{
				$temp[$i] = $week_reg_arr[$i];
			}
			 else 
			{
				$temp[$i] = 0;
			}
			$i++;
			continue;
		}
		return $temp;
	}

	public function get_yearly_projects_success($first_date, $last_date) {

		$week_reg_arr = array();
		$temp = array();
		$this->db->select("COUNT(*) as total, YEAR(p.date_added) as date_added");
		$this->db->from("project p");
		$this->db->where("YEAR(p.date_added) >=", $first_date);
		$this->db->where("YEAR(p.date_added) <=", $last_date);
		$this->db->where("CAST(p.amount_get as decimal(10,2)) >= CAST(p.amount as decimal(10,2))");
		$this->db->group_by("YEAR(p.date_added)");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$res = $query->result();
			if ($res)
			{
				foreach ($res as $wtr)
				{
					$week_reg_arr[$wtr->date_added] = $wtr->total;
					continue;
				}
			}
		}
		$i = $first_date;
		while ($i <= $last_date)
		{
			if (array_key_exists($i, $week_reg_arr))
			{
				$temp[$i] = $week_reg_arr[$i];
			}
			 else 
			{
				$temp[$i] = 0;
			}
			$i++;
			continue;
		}
		return $temp;
	}

	public function get_yearly_projects_active($first_date, $last_date) {

		$week_reg_arr = array();
		$temp = array();
		$this->db->select("COUNT(*) as total, YEAR(p.date_added) as date_added");
		$this->db->from("project p");
		$this->db->where("YEAR(p.date_added) >=", $first_date);
		$this->db->where("YEAR(p.date_added) <=", $last_date);
		$this->db->where("p.active", "1");
		$this->db->where("p.end_date >= now()");
		$this->db->group_by("YEAR(p.date_added)");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$res = $query->result();
			if ($res)
			{
				foreach ($res as $wtr)
				{
					$week_reg_arr[$wtr->date_added] = $wtr->total;
					continue;
				}
			}
		}
		$i = $first_date;
		while ($i <= $last_date)
		{
			if (array_key_exists($i, $week_reg_arr))
			{
				$temp[$i] = $week_reg_arr[$i];
			}
			 else 
			{
				$temp[$i] = 0;
			}
			$i++;
			continue;
		}
		return $temp;
	}

	public function get_yearly_projects_new($first_date, $last_date) {

		$week_reg_arr = array();
		$temp = array();
		$this->db->select("COUNT(*) as total, YEAR(p.date_added) as date_added");
		$this->db->from("project p");
		$this->db->where("YEAR(p.date_added) >=", $first_date);
		$this->db->where("YEAR(p.date_added) <=", $last_date);
		$this->db->where("p.project_draft", "1");
		$this->db->group_by("YEAR(p.date_added)");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$res = $query->result();
			if ($res)
			{
				foreach ($res as $wtr)
				{
					$week_reg_arr[$wtr->date_added] = $wtr->total;
					continue;
				}
			}
		}
		$i = $first_date;
		while ($i <= $last_date)
		{
			if (array_key_exists($i, $week_reg_arr))
			{
				$temp[$i] = $week_reg_arr[$i];
			}
			 else 
			{
				$temp[$i] = 0;
			}
			$i++;
			continue;
		}
		return $temp;
	}

	public function get_monthly_projects($first_date, $last_date) {

		$week_reg_arr = array();
		$temp = array();
		$month_year = date("Y");
		$this->db->select("COUNT(*) as total, MONTH(p.date_added) as date_added");
		$this->db->from("project p");
		$this->db->where("MONTH(p.date_added) >=", $first_date);
		$this->db->where("MONTH(p.date_added) <=", $last_date);
		$this->db->where("YEAR(p.date_added) ", $month_year);
		$this->db->group_by("MONTH(p.date_added)");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$res = $query->result();
			if ($res)
			{
				foreach ($res as $wtr)
				{
					$week_reg_arr[$wtr->date_added] = $wtr->total;
					continue;
				}
			}
		}
		$i = 1;
		while ($i <= 12)
		{
			if (array_key_exists($i, $week_reg_arr))
			{
				$temp[$i] = $week_reg_arr[$i];
			}
			 else 
			{
				$temp[$i] = 0;
			}
			$i++;
			continue;
		}
		return $temp;
	}

	public function get_monthly_projects_success($first_date, $last_date) {

		$week_reg_arr = array();
		$temp = array();
		$month_year = date("Y");
		$this->db->select("COUNT(*) as total, MONTH(p.date_added) as date_added");
		$this->db->from("project p");
		$this->db->where("MONTH(p.date_added) >=", $first_date);
		$this->db->where("MONTH(p.date_added) <=", $last_date);
		$this->db->where("YEAR(p.date_added) ", $month_year);
		$this->db->where("CAST(p.amount_get as decimal(10,2)) >= CAST(p.amount as decimal(10,2))");
		$this->db->group_by("MONTH(p.date_added)");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$res = $query->result();
			if ($res)
			{
				foreach ($res as $wtr)
				{
					$week_reg_arr[$wtr->date_added] = $wtr->total;
					continue;
				}
			}
		}
		$i = 1;
		while ($i <= 12)
		{
			if (array_key_exists($i, $week_reg_arr))
			{
				$temp[$i] = $week_reg_arr[$i];
			}
			 else 
			{
				$temp[$i] = 0;
			}
			$i++;
			continue;
		}
		return $temp;
	}

	public function get_monthly_projects_active($first_date, $last_date) {

		$week_reg_arr = array();
		$temp = array();
		$month_year = date("Y");
		$this->db->select("COUNT(*) as total, MONTH(p.date_added) as date_added");
		$this->db->from("project p");
		$this->db->where("MONTH(p.date_added) >=", $first_date);
		$this->db->where("MONTH(p.date_added) <=", $last_date);
		$this->db->where("YEAR(p.date_added) ", $month_year);
		$this->db->where("p.active", "1");
		$this->db->where("p.end_date >= now()");
		$this->db->group_by("MONTH(p.date_added)");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$res = $query->result();
			if ($res)
			{
				foreach ($res as $wtr)
				{
					$week_reg_arr[$wtr->date_added] = $wtr->total;
					continue;
				}
			}
		}
		$i = 1;
		while ($i <= 12)
		{
			if (array_key_exists($i, $week_reg_arr))
			{
				$temp[$i] = $week_reg_arr[$i];
			}
			 else 
			{
				$temp[$i] = 0;
			}
			$i++;
			continue;
		}
		return $temp;
	}

	public function get_monthly_projects_new($first_date, $last_date) {

		$week_reg_arr = array();
		$temp = array();
		$month_year = date("Y");
		$this->db->select("COUNT(*) as total, MONTH(p.date_added) as date_added");
		$this->db->from("project p");
		$this->db->where("MONTH(p.date_added) >=", $first_date);
		$this->db->where("MONTH(p.date_added) <=", $last_date);
		$this->db->where("YEAR(p.date_added) ", $month_year);
		$this->db->where("p.project_draft", "1");
		$this->db->group_by("MONTH(p.date_added)");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$res = $query->result();
			if ($res)
			{
				foreach ($res as $wtr)
				{
					$week_reg_arr[$wtr->date_added] = $wtr->total;
					continue;
				}
			}
		}
		$i = 1;
		while ($i <= 12)
		{
			if (array_key_exists($i, $week_reg_arr))
			{
				$temp[$i] = $week_reg_arr[$i];
			}
			 else 
			{
				$temp[$i] = 0;
			}
			$i++;
			continue;
		}
		return $temp;
	}

	public function get_weekly_projects($first_date, $last_date) {

		$week_reg_arr = array();
		$temp = array();
		$this->db->select("COUNT(*) as total, DATE(p.date_added) as date_added");
		$this->db->from("project p");
		$this->db->where("DATE(p.date_added) >=", $first_date);
		$this->db->where("DATE(p.date_added) <=", $last_date);
		$this->db->group_by("DATE(p.date_added)");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$res = $query->result();
			if ($res)
			{
				foreach ($res as $wtr)
				{
					$week_reg_arr[$wtr->date_added] = $wtr->total;
					continue;
				}
			}
		}
		while (strtotime($first_date) <= strtotime($last_date))
		{
			if (array_key_exists($first_date, $week_reg_arr))
			{
				$temp[$first_date] = $week_reg_arr[$first_date];
			}
			 else 
			{
				$temp[$first_date] = 0;
			}
			$first_date = date("Y-m-d", strtotime("+1 day", strtotime($first_date)));
			continue;
		}
		return $temp;
	}

	public function get_weekly_projects_success($first_date, $last_date) {

		$week_reg_arr = array();
		$temp = array();
		$this->db->select("COUNT(*) as total, DATE(p.date_added) as date_added");
		$this->db->from("project p");
		$this->db->where("DATE(p.date_added) >=", $first_date);
		$this->db->where("DATE(p.date_added) <=", $last_date);
		$this->db->where("CAST(p.amount_get as decimal(10,2)) >= CAST(p.amount as decimal(10,2))");
		$this->db->group_by("DATE(p.date_added)");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$res = $query->result();
			if ($res)
			{
				foreach ($res as $wtr)
				{
					$week_reg_arr[$wtr->date_added] = $wtr->total;
					continue;
				}
			}
		}
		while (strtotime($first_date) <= strtotime($last_date))
		{
			if (array_key_exists($first_date, $week_reg_arr))
			{
				$temp[$first_date] = $week_reg_arr[$first_date];
			}
			 else 
			{
				$temp[$first_date] = 0;
			}
			$first_date = date("Y-m-d", strtotime("+1 day", strtotime($first_date)));
			continue;
		}
		return $temp;
	}

	public function get_weekly_projects_active($first_date, $last_date) {

		$week_reg_arr = array();
		$temp = array();
		$this->db->select("COUNT(*) as total, DATE(p.date_added) as date_added");
		$this->db->from("project p");
		$this->db->where("DATE(p.date_added) >=", $first_date);
		$this->db->where("DATE(p.date_added) <=", $last_date);
		$this->db->where("p.active", "1");
		$this->db->where("p.end_date >= now()");
		$this->db->group_by("DATE(p.date_added)");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$res = $query->result();
			if ($res)
			{
				foreach ($res as $wtr)
				{
					$week_reg_arr[$wtr->date_added] = $wtr->total;
					continue;
				}
			}
		}
		while (strtotime($first_date) <= strtotime($last_date))
		{
			if (array_key_exists($first_date, $week_reg_arr))
			{
				$temp[$first_date] = $week_reg_arr[$first_date];
			}
			 else 
			{
				$temp[$first_date] = 0;
			}
			$first_date = date("Y-m-d", strtotime("+1 day", strtotime($first_date)));
			continue;
		}
		return $temp;
	}

	public function get_weekly_projects_new($first_date, $last_date) {

		$week_reg_arr = array();
		$temp = array();
		$this->db->select("COUNT(*) as total, DATE(p.date_added) as date_added");
		$this->db->from("project p");
		$this->db->where("DATE(p.date_added) >=", $first_date);
		$this->db->where("DATE(p.date_added) <=", $last_date);
		$this->db->where("p.project_draft", "1");
		$this->db->group_by("DATE(p.date_added)");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$res = $query->result();
			if ($res)
			{
				foreach ($res as $wtr)
				{
					$week_reg_arr[$wtr->date_added] = $wtr->total;
					continue;
				}
			}
		}
		while (strtotime($first_date) <= strtotime($last_date))
		{
			if (array_key_exists($first_date, $week_reg_arr))
			{
				$temp[$first_date] = $week_reg_arr[$first_date];
			}
			 else 
			{
				$temp[$first_date] = 0;
			}
			$first_date = date("Y-m-d", strtotime("+1 day", strtotime($first_date)));
			continue;
		}
		return $temp;
	}

};;


