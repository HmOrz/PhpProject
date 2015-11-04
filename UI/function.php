<?
	function checkIllegalWord()
	{
		$words = array();
		$words[] = " add ";
		$words[] = " count ";
		$words[] = " create ";
		$words[] = " delete ";
		$words[] = " drop ";
		$words[] = " from ";
		$words[] = " grant ";
		$words[] = " insert ";
		$words[] = " select ";
		$words[] = " truncate ";
		$words[] = " update ";
		$words[] = " use ";
		$words[] = "-- ";
		foreach($_REQUEST as $strGot)
		{
			$strGot = strtolower($strGot);
			foreach($words as $word)
			{
				if(strstr($strGot, $word))
				{
					echo "您输入的内容含有非法字符！";
					exit;
				}
			}
		}
	}
	checkIllegalWord();
?>