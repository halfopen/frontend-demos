<?php
if ($_FILES["file"]["size"] < 200000)
{
  if ($_FILES["file"]["error"] > 0)
  {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
  }
  else
  {
    //echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    //echo "Type: " . $_FILES["file"]["type"] . "<br />";
    //echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    //echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

    if (file_exists("upload/" . $_FILES["file"]["name"]))
    {
      echo '{"result":"1","img":"http://192.168.1.7:1080/uploadfile/upload/'.$_FILES["file"]["name"].'"}';
    }
    else
    {
      move_uploaded_file($_FILES["file"]["tmp_name"],
        "upload/" . $_FILES["file"]["name"]);
      echo '{"result":"1","img":"http://192.168.1.7:1080/uploadfile/upload/'.$_FILES["file"]["name"].'"}';
    }
  }
}
else
{
  echo '{"result":"-1"}';
}
?>