<?php
									
									if ((($_FILES["profile_pic"]["type"] == "image/gif")
									|| ($_FILES["profile_pic"]["type"] == "image/jpg")
									|| ($_FILES["profile_pic"]["type"] == "image/jpeg")
									|| ($_FILES["profile_pic"]["type"] == "image/png")
									|| ($_FILES["profile_pic"]["type"] == "image/pjpeg"))
									&& ($_FILES["profile_pic"]["size"] < 100000))
									{
										if ($_FILES["profile_pic"]["error"] > 0)
										{
										echo "File Error : " . $_FILES["profile_pic"]["error"] . "<br />";
										}else {
											//echo "Upload File Name: " . $_FILES["profile_pic"]["name"] . "<br />";
											//echo "File Type: " . $_FILES["profile_pic"]["type"] . "<br />";
											//echo "File Size: " . ($_FILES["profile_pic"]["size"] / 1024) . " Kb<br />"; 
											$profile_pic_name = $_FILES["profile_pic"]["name"];

											if (file_exists("images/".$_FILES["profile_pic"]["name"]))
											{
											echo "<b>".$_FILES["profile_pic"]["name"] . " already exists. </b>";
											}else
											{
											move_uploaded_file($_FILES["profile_pic"]["tmp_name"],"images/". $_FILES["profile_pic"]["name"]);
											$uploaded_file = $_FILES["profile_pic"]["name"];
											list($width,$height) = getimagesize($uploaded_file);
											$newwidth=100;
											$newheight=($height/$width)*100;
											$tmp=imagecreatetruecolor($newwidth,$newheight);
											imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
											$filename = "images/". $_FILES['profile_pic']['name'];
											imagejpeg($tmp,$filename,100);
											echo "Stored in: " . "images/" . $_FILES["profile_pic"]["name"]."<br />";
											?>
											Uploaded File:<br>
											<img src="images/<?php echo $_FILES["profile_pic"]["name"]; ?>" alt="Image path Invalid" >
											<?php
											}
										}
										
									}else
									{
										echo "Invalid file detail ::<br> file type ::".$_FILES["file"]["type"]." , file size::: ".$_FILES["file"]["size"];
									}
								?>