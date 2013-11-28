<?php
$format=$_POST['format'];
$name=$_POST['name'];
$com=$_POST['com'];
$title=(isset($_POST['title']) ? $_POST['title']:'');

header("Cache-Control: public");
header("Content-Description: File Transfer");
header("Content-Disposition: attachment; filename=RunOnceEx.$format");
header("Content-Type: application/octet-stream; "); 
header("Content-Transfer-Encoding: binary");

switch ($format)
{
//if output is reg
case 'reg':
echo '
Windows Registry Editor Version 5.00

[HKEY_LOCAL_MACHINE\SOFTWARE\Microsoft\Windows\CurrentVersion\RunOnceEx]
"Title"="'.$title.'"
"Flags"=hex:20';
for ($i=0; $i<count($name); $i++) {
echo '
[HKEY_LOCAL_MACHINE\SOFTWARE\Microsoft\Windows\CurrentVersion\RunOnceEx\0'.$i.']
@="'.$name[$i].'"
"1"="'.$com[$i].'"
';
}

echo '';
  break;

//if output is inf
case 'inf':
echo '
[Version]
Signature=$CHICAGO$


[DefaultInstall]
AddReg      = newhive

[newhive]
HKLM,"%ro%",,0x00000012
HKLM,"%ro%",Title,0x00000000,"'.$title.'"
HKLM,"%ro%",Flags,0x00001001,0x00000020';

for ($i=0; $i<count($name); $i++) {
echo '
HKLM,"%ro%\0'.$i.'",,,"'.$name[$i].'"
HKLM,"%ro%\0'.$i.'",1,,"'.$com[$i].'"
';
}

echo '
[Strings]
ro    = "SOFTWARE\Microsoft\Windows\CurrentVersion\RunOnceEx"
';
  break;
  
//if output is bat
case 'bat':
echo '
cmdow @ /HID
@Echo Off

FOR %%i IN (D E F G H I J K L M N O P Q R S T U V W X Y Z) DO IF EXIST %%i:\win51ip.SP2 SET CDROM=%%i:

SET PP=%cdrom%\

SET KEY=HKLM\SOFTWARE\Microsoft\Windows\CurrentVersion\RunOnceEx

REG ADD %KEY% /V TITLE /D "'.$title.'" /f';

for ($i=0; $i<count($name); $i++) {
echo '
REG ADD %KEY%\0'.$i.' /VE /D "'.$name[$i].'" /f
REG ADD %KEY%\0'.$i.' /V 1 /D "'.$com[$i].'" /f
';
}

echo '
EXIT

';
  break;
default:
  echo "Nothing";
}

?>