<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ENKRIPSI DEKRIPSI</title>
<style>
* {box-sizing: border-box}
body {font-family: "Lato", sans-serif;font-size: 15px;}

/* Style the tab */
.tab {
  float: left;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
  width: 30%;
  min-height: auto;

}

/* Style the buttons inside the tab */
.tab button {
  display: block;
  background-color: inherit;
  color: black;
  padding: 22px 16px;
  width: 100%;
  border: none;
  outline: none;
  text-align: left;
  cursor: pointer;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current "tab button" class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  float: left;
  padding: 12px 12px;
  border: 1px solid #ccc;
  width: 70%;
  min-height: auto;
}
textarea{
    font-size: 17px;
    min-height: 100px;
    max-height: 100px;
    overflow-y: auto;
    min-width: 100%;
    max-width: 100%;
}
* {box-sizing: border-box}

/* Add padding to containers */
.container {
  padding: 16px;
}
a{text-decoration:none}
/* Full-width input fields */
input[type=text],input[type=number]{
  width: 100%;
  font-size: 15px;
  padding: 15px;
  margin: 5px 0 5px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus,input[type=number]:focus{
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit/bangkit button */
.submit {
  font-size: 17px;
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.submit:hover {
  opacity:1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

</style>
</head>
<body>
