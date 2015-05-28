	<?php
	
	function xxx($str){
    $str=implode("",explode("\\",$str));
    $str=explode("/",$str);
    $str=strtolower(end($str));
     return $str;
}
					function show_files($patchh){
						echo '<ul>';
						foreach(new DirectoryIterator($patchh) as  $entry){
							if(!$entry->isDir() && $entry->getFilename()!='..' && $entry->getFilename()!='.'){
								echo '<li><a href="edit.php?f='.$patchh.'/'.$entry->getFilename().'">'.$entry->getFilename().'</a>
								<a href="#" style="color:red; font-size:8px;padding-left:20px;" onclick="javascript:deleteFile(\''.$patchh.'/'.$entry->getFilename().'\')">delete</a>
								<a href="#" style="color:orange; font-size:8px;">rename</a>
								</li><br>';
							}
							
							if($entry->isDir() && $entry->getFilename()!='..' && $entry->getFilename()!='.'){
								echo '<li style="color:red;font-weight:bold" onclick="javascript:hide_show_sub_ul(this)">'.$entry->getFilename().'
								<a href="#" style="color:red; font-weight:normal; padding-left:20px;font-size:8px;"  onclick="javascript:deleteDirectory(\''.$patchh.'/'.$entry->getFilename().'\')">delete</a>
								<a href="#" style="color:blue;font-weight:normal;  font-size:8px;" onclick="javascript:preaddFile(\''.$patchh.'/'.$entry->getFilename().'/\')">add file</a>
								<a href="#" style="color:blue;font-weight:normal;  font-size:8px;" onclick="javascript:preaddFolder(\''.$patchh.'/'.$entry->getFilename().'/\')">add folder</a>
								</li><br>';
								show_files($patchh.'/'.$entry->getFilename());
							}
						}
						echo '</ul><br><br>';
					}
					
					$patch = "proj";
					show_files($patch);
					echo '<script>
							$(\'ul\').first().show();
						</script>';
				?>