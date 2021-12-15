<?php 



/* backup the db OR just a table 
	If you provide a "*" or no tables, 
	a complete database backup will run. 
	The script does the rest!
*/
function backup_tablesOld($host,$user,$pass,$name,$tables = '*')
{
	
	$link = mysql_connect($host,$user,$pass);
	mysql_select_db($name,$link);
	
	//get all of the tables
	if($tables == '*')
	{
		$tables = array();
		$result = mysql_query('SHOW TABLES');
		while($row = mysql_fetch_row($result))
		{
			$tables[] = $row[0];
		}
	}
	else
	{
		$tables = is_array($tables) ? $tables : explode(',',$tables);
	}
	
	//cycle through
	foreach($tables as $table)
	{
		$result = mysql_query('SELECT * FROM '.$table);
		$num_fields = mysql_num_fields($result);
		
		$return.= 'DROP TABLE '.$table.';';
		$row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
		$return.= "\n\n".$row2[1].";\n\n";
		
		for ($i = 0; $i < $num_fields; $i++) 
		{
			while($row = mysql_fetch_row($result))
			{
				$return.= 'INSERT INTO '.$table.' VALUES(';
				for($j=0; $j < $num_fields; $j++) 
				{
					$row[$j] = addslashes($row[$j]);
					$row[$j] = ereg_replace("\n","\\n",$row[$j]);
					if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
					if ($j < ($num_fields-1)) { $return.= ','; }
				}
				$return.= ");\n";
			}
		}
		$return.="\n\n\n";
	}
	
	//save file
	$handle = fopen('db-backup-'.time().'-'.(md5(implode(',',$tables))).'.sql','w+');
	fwrite($handle,$return);
	fclose($handle);
}




function backupDB() 
{
  $suffix = time();
  #Execute the command to create backup sql file
  exec("mysqldump --user={$username} --password={$password} --quick --add-drop-table --add-locks --extended-insert --lock-tables --all {$db} > backups/backup.sql");
   
  #Now zip that file
  $zip = new ZipArchive();
  $filename = "backups/backup-$suffix.zip";
  if ($zip->open($filename, ZIPARCHIVE::CREATE) !== TRUE) {
   exit("cannot open <$filename>n");
  }
  $zip->addFile("backups/backup.sql" , "backup.sql");
  $zip->close();
  #Now delete the .sql file without any warning
  @unlink("backups/backup.sql");
  #Return the path to the zip backup file
  return "backups/backup-$suffix.zip";
} 

// Function to restore from a file
function restore($path) {
  $f = fopen('restore/temp.sql' , 'w+');
  if(!$f) {
   echo "Error While Restoring Database";
   return;
  }
  $zip = new ZipArchive();
  if ($zip->open($path) === TRUE) {
   #Get the backup content
   $sql = $zip->getFromName('backup.sql');
   #Close the Zip File
   $zip->close();
   #Prepare the sql file
   fwrite($f , $sql);
   fclose($f);
    
   #Now restore from the .sql file
   $command = "mysql --user={$username} --password={$password} --database={$db} < restore/temp.sql";
   exec($command);
    
   #Delete temporary files without any warning
   @unlink('restore/temp.sql');
  } 
  else {
   echo 'Failed';
  }
}








/**
* Updated: Mohammad M. AlBanna
* Website: MBanna.info
*/




//Core function
function backup_tables($host, $user, $pass, $dbname, $tables = '*') {
    $link = mysqli_connect($host,$user,$pass, $dbname);

    // Check connection
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit;
    }

    mysqli_query($link, "SET NAMES 'utf8'");

    //get all of the tables
    if($tables == '*')
    {
        $tables = array();
        $result = mysqli_query($link, 'SHOW TABLES');
        while($row = mysqli_fetch_row($result))
        {
            $tables[] = $row[0];
        }
    }
    else
    {
        $tables = is_array($tables) ? $tables : explode(',',$tables);
    }

    $return = '';
    //cycle through
    foreach($tables as $table)
    {
        $result = mysqli_query($link, 'SELECT * FROM '.$table);
        $num_fields = mysqli_num_fields($result);
        $num_rows = mysqli_num_rows($result);

        $return.= 'DROP TABLE IF EXISTS '.$table.';';
        $row2 = mysqli_fetch_row(mysqli_query($link, 'SHOW CREATE TABLE '.$table));
        $return.= "\n\n".$row2[1].";\n\n";
        $counter = 1;

        //Over tables
        for ($i = 0; $i < $num_fields; $i++) 
        {   //Over rows
            while($row = mysqli_fetch_row($result))
            {   
                if($counter == 1){
                    $return.= 'INSERT INTO '.$table.' VALUES(';
                } else{
                    $return.= '(';
                }

                //Over fields
                for($j=0; $j<$num_fields; $j++) 
                {
                    $row[$j] = addslashes($row[$j]);
                    $row[$j] = str_replace("\n","\\n",$row[$j]);
                    if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
                    if ($j<($num_fields-1)) { $return.= ','; }
                }

                if($num_rows == $counter){
                    $return.= ");\n";
                } else{
                    $return.= "),\n";
                }
                ++$counter;
            }
        }
        $return.="\n\n\n";
    }




    //save file
    // $fileName = '../Backups/db-backup-'.date('Y-m-d').'-'.(md5(implode(',',$tables))).'.sql';
    $fileName = '../Backups/db-backup-'.date('Y-m-d').'_'.date('H-m-s').'.sql';
    $handle = fopen($fileName,'w+');
    fwrite($handle,$return);
    if(fclose($handle)){
        echo "Done, the file name is: ".$fileName;
        exit; 
    }
}

	
?>