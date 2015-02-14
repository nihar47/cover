<?php

class RSS
{
	public function RSS()
	{
		require_once ('mysql_connect.php');
	}
	
	public function GetFeed()
	{
		
		return $this->getDetails() . $this->getItems();
	}
	public function GetprojectFeed()
	{
		return $this->getDetails() . $this->getprojectItems();
	}
	
	private function dbConnect()
	{
		DEFINE ('LINK', mysql_connect (DB_HOST, DB_USER, DB_PASSWORD));
	}
	
	private function getDetails()
	{
		$detailsTable = "site_setting";
		mysql_connect (DB_HOST, DB_USER, DB_PASSWORD);
		mysql_select_db (DB_NAME);
		$query = "SELECT * FROM ". $detailsTable;
		$result = mysql_query ($query);
		$row = mysql_fetch_array($result);
		//while($row = mysql_fetch_array($result))
		//{
			$details = '<?xml version="1.0" encoding="ISO-8859-1" ?>
					<rss version="2.0">
						<channel>
							<title>'. $row['site_name'] .'</title>
							<link>'.BASE_URL.'</link>
							<description>'. $row['site_name'] .'</description>
							<language>en</language>';
		//}
		return $details;
	}
	
	private function getItems()
	{
		$itemsTable = "listing";
		mysql_connect (DB_HOST, DB_USER, DB_PASSWORD);
		mysql_select_db (DB_NAME);
		 $query = "select blogs.*,blog_category.blog_category_name from blogs, blog_category where blogs.blog_category= blog_category.blog_category_id and blogs.publish = 1 order by blogs.date_added desc limit 20";
		$result = mysql_query ($query);
		$items = '';
		while($row = mysql_fetch_array($result))
		{
			$items .= '<item>
						 <title>'. $row["blog_title"] .'</title>
						 <link>'.BASE_URL.LISTING_KEY.'/'.$row["blog_id"].'</link>
						 <description><![CDATA['. trim(strip_tags($row["blog_discription"])) .']]></description>
					 </item>';
		}
		$items .= '</channel>
				 </rss>';
		return $items;
	}
	
	private function getprojectItems()
	{
		$itemsTable = "listing";
		mysql_connect (DB_HOST, DB_USER, DB_PASSWORD);
		mysql_select_db (DB_NAME);
		 $query = "select * from project where active=1 and end_date >= now() limit 20";
		$result = mysql_query ($query);
		$items = '';
		while($row = mysql_fetch_array($result))
		{
			$items .= '<item>
						 <title>'. $row["project_title"] .'</title>
						 <link>'.BASE_URL.LISTING_KEY.'/'.$row["url_project_title"].'/'.$row["project_id"].'</link>
						 <description><![CDATA['. trim(strip_tags($row["project_summary"])) .']]></description>
					 </item>';
		}
		$items .= '</channel>
				 </rss>';
		return $items;
	}

}

?>