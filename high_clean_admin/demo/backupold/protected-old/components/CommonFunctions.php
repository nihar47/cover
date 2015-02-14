<?php class CommonFunctions extends CApplicationComponent {				public static function remove_http($url) {				   $disallowed = array('http://', 'https://');				   foreach($disallowed as $d) {					  if(strpos($url, $d) === 0) {						 return str_replace($d, '', $url);						}					}			return $url;		}			public static function getIntervalDays($start_date,$end_date) {						$date1 = new DateTime($start_date);				$date2 = new DateTime($end_date);				$diff = $date2->diff($date1)->format("%a");				return $diff;				}		public	static function getExtension($str) 		{			$i = strrpos($str,".");			if (!$i) { return ""; } 			$l = strlen($str) - $i;			$ext = substr($str,$i+1,$l);			return $ext;		}								public static function loadQuoteModel($id)		{			$model=Quotes::model()->findByPk($id);			if($model===null)				throw new CHttpException(404,'The requested page does not exist.');			return $model;		}						public static function loadJobModel($id)		{			$model=QuoteJobs::model()->findByPk($id);			if($model===null)				throw new CHttpException(404,'The requested page does not exist.');			return $model;		}						public static function loadJobServiceModel($id)		{			$model=QuoteJobServices::model()->findByPk($id);			if($model===null)				throw new CHttpException(404,'The requested page does not exist.');			return $model;		}	}?>