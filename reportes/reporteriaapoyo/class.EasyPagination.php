<?php
#################################################################################################
/*																								 
										Class EasyPagination									 
									   All Rights Reserved                                       
									 Autor: Olavo Alexandrino                                    
								 Contact: oalexandrino@yahoo.com.br 							 
								 URL: http://www.recifeminhacidade.com.br						 
									   Recife - PE - Brazil										 
										   October 2003 									   	 
										   Version: 1.0										     
*/	  																							 
#################################################################################################
Class EasyPagination
{

	var $sqlSearch;
	var $sqlNumRows;
	var $getsVars;
	var $recordByPage;
	var $PagesFound;
	var $totalRecords;
	var $currentPage;
	var $msg_initialPage;
	var $msg_finalPage;	
	var $msg_previousPage;
	var $msg_nextPage;
	var $msg_next10Results;
	var $msg_previous10Results;	
	var $msg_page;
	var $msg_of;
	var $msg_even;


	function EasyPagination($page,$recordByPage,$language = "default")
	{
		$this->_configCurrentPage($page);
		$this->_setRecordByPage($recordByPage);
		if ($language == "default"):
			$this->msg_initialPage  = "Página Inicial";
			$this->msg_finalPage    = "Página Final";
			$this->msg_previousPage = "Anterior";
			$this->msg_nextPage	    = "Próxima";
			$this->msg_next10Results = "Próximas 10 páginas";
			$this->msg_previous10Results = "10 Páginas anteriores";
			$this->msg_page		    = "Ir para Página";
			$this->msg_of		     = "De";
			$this->msg_to		     = "a";
		else:
			$this->msg_initialPage   = "Initial Page";
			$this->msg_finalPage     = "Final Page";	
			$this->msg_previousPage  = "Previous";
			$this->msg_nextPage	     = "Next";
			$this->msg_next10Results = "Next 10 Pages";
			$this->msg_previous10Results = "Previous 10 Pages";
			$this->msg_page		     = "Go to Page";
			$this->msg_of		     = "";
			$this->msg_to		     = "to";		
		endif;		
	}

	function _configCurrentPage($page)
	{
		if (empty($page)):
			$this->currentPage = 1; 
		else:    
			$this->currentPage = $page; 
		endif;	
	}	

	function _setRecordByPage($recordByPage)
	{
		$this->recordByPage = $recordByPage;
	}		

	function _setTotalRecords()
	{
		$searchResultTotal = mysql_query($this->sqlNumRows);
		list($this->totalRecords) = mysql_fetch_row($searchResultTotal);
		$this->PagesFound = ceil($this->totalRecords / $this->recordByPage); 			
	}	

	function setSQLSearch($sqlSearch)
	{
		$this->sqlSearch = $sqlSearch;
	}

	function setSQLNumRows($sqlNumRows)
	{
		$this->sqlNumRows = $sqlNumRows;
		$this->_setTotalRecords();
	}

	function setGetVars($getsVars)
	{
		$this->getsVars = $getsVars;
	}

	function getTotalRecords()	
	{
		return $this->totalRecords;
	}	

	function getPagesFound()
	{
		return $this->PagesFound;
	}

	function getResultData()
	{

		$begin = $this->currentPage - 1; 
		$begin = $begin * $this->recordByPage; 
		$this->sqlSearch = $this->sqlSearch." LIMIT ".$begin.",".$this->recordByPage;
		$searchResult = mysql_query($this->sqlSearch); 		
		return $searchResult;
	}

	function getNavigation()
	{
		$result = " ";
		$previous = $this->currentPage - 1; 
		$next     = $this->currentPage + 1; 
		
		if ($this->getsVars ==""):
			if ($this->PagesFound>1):
				if ($this->currentPage!=1):
					$result .= "<a href='?page=1' title='".$this->msg_initialPage."' onMouseOver=\"window.status='".$this->msg_initialPage."';return true\" onMouseOut=\"window.status='';return true\"><< </a>&nbsp;&nbsp;&nbsp;&nbsp;";
				endif;
				if ($this->currentPage>1):     		$result .= "<a href='?page=".($previous)."' title='".$this->msg_previousPage."' onMouseOver=\"window.status='".$this->msg_previousPage."';return true\" onMouseOut=\"window.status='';return true\">".$this->msg_previousPage."</a>&nbsp;&nbsp;"; 	endif;
				if (($this->currentPage < $this->PagesFound) && ($this->PagesFound >= 1)):	$result .= " <a href='?page=".($next)."'  title='".$this->msg_nextPage."' onMouseOver=\"window.status='".$this->msg_nextPage."';return true\" onMouseOut=\"window.status='';return true\">".$this->msg_nextPage."</a>"; 		endif;
				if (($this->PagesFound>1)&&($this->currentPage!=$this->PagesFound)):				
					$result .=  "&nbsp;&nbsp;&nbsp;&nbsp;<a href='?page=".$this->PagesFound."'  title='".$this->msg_finalPage."' onMouseOver=\"window.status='".$this->msg_finalPage."';return true\" onMouseOut=\"window.status='';return true\"> >></a>";
				endif;
			endif;			
		else:
			if ($this->currentPage!=1):
				$result = "<a href='?page=1&key=1&".$this->getsVars."' title='".$this->msg_initialPage."' onMouseOver=\"window.status='".$this->msg_initialPage."';return true\" onMouseOut=\"window.status='';return true\"><< </a>&nbsp;&nbsp;&nbsp;&nbsp;";
			endif;
			if ($this->currentPage>1):  $result .=  "<a href='?page=".($previous)."&key=1&".$this->getsVars."' title='".$this->msg_previousPage."' onMouseOver=\"window.status='".$this->msg_previousPage."';return true\" onMouseOut=\"window.status='';return true\">".$this->msg_previousPage."</a>&nbsp;&nbsp;"; 	endif;
			if (($this->currentPage<$this->PagesFound) && ($this->PagesFound>=1)):	$result .= "<a href='?page=".($next)."&key=1&".$this->getsVars."'  title='".$this->msg_nextPage."' onMouseOver=\"window.status='".$this->msg_nextPage."';return true\" onMouseOut=\"window.status='';return true\">".$this->msg_nextPage."</a>"; 		endif;
			if (($this->PagesFound>1)&&($this->currentPage!=$this->PagesFound)):
				$result .= "&nbsp;&nbsp;&nbsp;&nbsp;<a href='?page=".$this->PagesFound."&key=1&".$this->getsVars."'  title='".$this->msg_finalPage."' onMouseOver=\"window.status='".$this->msg_finalPage."';return true\" onMouseOut=\"window.status='';return true\"> >></a>";	
			endif;
		endif;	
		return $result;
	}

	function getCurrentPages()
	{
		$totalRecordsControl = $this->totalRecords;
		if (($totalRecordsControl%$this->recordByPage!=0)):
			while($totalRecordsControl%$this->recordByPage!=0):
				$totalRecordsControl++;
			endWhile;
		endif;
		$ultimo = substr($this->currentPage,-1);  
		if ($ultimo == 0):
			$begin = ($this->currentPage-9);
			$pageInicial = ($this->currentPage - $ultimo);
			$end = $this->currentPage;			
		else:
			$pageInicial = ($this->currentPage - $ultimo);			
			$begin = ($this->currentPage-$ultimo)+1;
			$end = $pageInicial+10;				
		endif;
		$num = $this->PagesFound;
		if ($end>$num):
		    $end = $num; 
		endif;
		for ($a = $begin; $a <= $end ; $a++):
			if ($a!=$this->currentPage):
				if ($this->getsVars ==""):
					@$result .= " <a href='?page=$a' onMouseOver=\"window.status='".$this->msg_page.": $a';return true\" title='".$this->msg_page.": $a' onMouseOut=\"window.status='';return true\">$a</a>&nbsp;";
				else:
					@$result .= " <a href='?page=$a&key=1&".$this->getsVars."' onMouseOver=\"window.status='".$this->msg_page.": $a';return true\" title='".$this->msg_page.": $a' onMouseOut=\"window.status='';return true\">$a</a>&nbsp;";						
				endif;
			else:
				@$result .= " <strong>[$a]</strong> &nbsp;";		
			endif;
		endfor;	
		return @$result;
	}

	function getListCurrentRecords()
	{
		$regFinal = $this->recordByPage * $this->currentPage;
		$regInicial = $regFinal - $this->recordByPage;
		if ($regInicial == 0): 
			$regInicial++; 
		endif;
		if ($this->currentPage == $this->PagesFound): 
			$regFinal = $this->totalRecords; 
		endif;	
		if ($this->currentPage > 1):  
			$regInicial++; 
		endif;
		$result = $this->msg_of." <font color='red'>$regInicial</font> ".$this->msg_to." <font color='red'>$regFinal</font>";
		return $result;
	}

	function getNavigationGroupLinks()
	{
			if (($this->currentPage <= 10) && ($this->PagesFound >= 1)):
				$end = 11;
			else:
				$last  = substr($this->currentPage,-1);  
				$first = substr($this->currentPage,0,1);
				if ($last != 0):
					$aux1  = $first + 1;
					$aux1  = $aux1."0";
					$aux1  = ($aux1 - $this->currentPage)+1;
					$end   = $this->currentPage + $aux1;
				else:
					$end  = $this->currentPage + 1;
				endif;
				$begin = $end - 20;				
			endif;
			if ( !(($this->currentPage>= 1)&&($this->currentPage<=10)) ):
				$result  = "<a href='?page=".($begin)."&key=1&".$this->getsVars."' title='".$this->msg_previous10Results."' onMouseOver=\"window.status='".$this->msg_previous10Results."';return true\" onMouseOut=\"window.status='';return true\">".$this->msg_previous10Results."</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; 
			endif;
			if ($end <= $this->PagesFound):
				$result .= " <a href='?page=".($end)."&key=1&".$this->getsVars."'  title='".$this->msg_next10Results."' onMouseOver=\"window.status='".$this->msg_next10Results."';return true\" onMouseOut=\"window.status='';return true\">".$this->msg_next10Results."</a>";
			endif;
			return @$result;
	}
}
?>