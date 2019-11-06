<?php

require_once 'dbconnect.php';

$query="create table if not exists User(User_ID int primary key auto_increment,User_Name varchar(50) unique key not null,User_Email varchar(50) not null,User_Password varchar(10) not null,User_Role varchar(10) default 'user')";

  $stmt = $conn->prepare($query);
  $stmt->execute();
  if($stmt!=null)
  {
  	echo("successfully");
  }
  else
  {
  	echo("table not careated please try again");  }




$query="create table if not exists tech_list(Tech_ID int primary key auto_increment,Tech_Name varchar(20),Tech_Desc varchar(500))";

  $stmt = $conn->prepare($query);
  $stmt->execute();
  if($stmt!=null)
  {
  	echo("successfully");
  }
  else
  {
  	echo("table not careated please try again");  }




$query="create table if not exists tech_topics(Topic_ID int primary key auto_increment,
Tech_ID int,
Topic_Name varchar(50),
Adder_ID int,
foreign key(Tech_ID) references tech_list(Tech_ID),
foreign key(Adder_ID) references user(User_ID)
)";

  $stmt = $conn->prepare($query);
  $stmt->execute();
  if($stmt!=null)
  {
  	echo("successfully");
  }
  else
  {
  	echo("table not careated please try again");  }




$query="create table if not exists tech_post(Post_ID int primary key auto_increment,Post_Title varchar(50),Post_Text text,Topic_ID int,Adder_ID int,foreign key(Topic_ID) references tech_topics(Topic_ID),foreign key(Adder_ID) references user(User_ID))";

  $stmt = $conn->prepare($query);
  $stmt->execute();
  if($stmt!=null)
  {
  	echo("successfully");
  }
  else
  {
  	echo("table not careated please try again");  }




$query="create table if not exists tech_images(Image_ID int primary key auto_increment,Image_Name varchar(50),Adder_ID int,foreign key(Adder_ID) references user(User_ID))";

  $stmt = $conn->prepare($query);
  $stmt->execute();
  if($stmt!=null)
  {
    echo("successfully");
  }
  else
  {
    echo("table not careated please try again");  }
?>