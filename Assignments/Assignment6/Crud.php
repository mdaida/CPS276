<?php
require 'Pdo_methods.php';

class Crud extends PdoMethods{

	public function getFile($type){
		
		/* CREATE AN INSTANCE OF THE PDOMETHODS CLASS*/
		$pdo = new PdoMethods();

		/* CREATE THE SQL */
		$sql = "SELECT * FROM short_names";

		//PROCESS THE SQL AND GET THE RESULTS
		$records = $pdo->selectNotBinded($sql);

		/* IF THERE WAS AN ERROR DISPLAY MESSAGE */
		if($records == 'error'){
			return 'There has been and error processing your request';
		}
		else {
			if(count($records) != 0){
				if($type == 'list'){return $this->createList($records);}
				if($type == 'input'){return $this->createInput($records);}	
			}
			else {
				return 'no names found';
			}
		}
	}

	public function addFile(){
	
		$pdo = new PdoMethods();

		/* HERE I CREATE THE SQL STATEMENT I AM BINDING THE PARAMETERS */
		$sql = "INSERT INTO file (fileName, filePath, enteredFileName) VALUES (:fname, :fpath, :enteredName, :state)";

			 
	    /* THESE BINDINGS ARE LATER INJECTED INTO THE SQL STATEMENT THIS PREVENTS AGAIN SQL INJECTIONS */
	    $bindings = [
			[':fname',$_FILES["selectedFile"]["name"],'str'],
			[':fpath',"files/",$_FILES['selectedFile']["name"],'str'],
			[':enteredName',$_POST['enteredFileName'],'str'],
		];

		/* I AM CALLING THE OTHERBINDED METHOD FROM MY PDO CLASS */
		$result = $pdo->otherBinded($sql, $bindings);

		/* HERE I AM RETURNING EITHER AN ERROR STRING OR A SUCCESS STRING */
		if($result === 'error'){
			return 'There was an error adding the name';
		}
		else {
			return 'Name has been added';
		}
	}

	/*THIS FUNCTION TAKES THE DATA FROM THE DATABASE AND RETURN AN UNORDERED LIST OF THE DATA*/
	private function display($records){
		$list = '<ol>';
		foreach ($records as $row){
			$list .= "<li><a target='_blank' href={$row['file_path']}>{$row['entered_file_name']}</li>";
		}
		$list .= '</ol>';
		return $list;
	}
}
