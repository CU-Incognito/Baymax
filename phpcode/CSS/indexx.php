


.sidenav { font-family:"Garamond";
  height: 100%;
  width: 0px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #B0C4DE;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 50px;
  border-radius: 10px;
}

.sidenav a { font-family:"Garamond";
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;

}

.sidenav a:hover { font-family:"Garamond";
  color: #f1f1f1;
}

.sidenav .closebtn { font-family:"Garamond";
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main { font-family:"Garamond";
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) { font-family:"Garamond";
  .sidenav { font-family:"Garamond";padding-top: 15px;}
  .sidenav a { font-family:"Garamond";font-size: 18px;}
}
h1{ font-family:"Garamond"; font-family: serif;
}
.container { font-family:"Garamond";
  position: relative;
  top: 20px;
  width: 100%;
}

.image { font-family:"Garamond";
  opacity: 1;
  display: block;
  width: 60%;
  position: relative;
  top: 19px;
  right: 80px;
  height: auto;
  transition: .5s ease;
  backface-visibility: hidden;
  border-radius: 10px;
  
}

.middle { font-family:"Garamond";
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 10%;
  left: 40%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}

.container:hover .image { font-family:"Garamond";
  opacity: 0.3;
}

.container:hover .middle { font-family:"Garamond";
  opacity: 1;
}

.text { font-family:"Garamond";
  
  color: white;
  font-size: 50px;
  padding: 16px 32px;
  font-family:"Courier New",Courier,monospace;
  position: static;
  top: 100px;
  left: 100px;
}

.row { font-family:"Garamond";
  display: flex;
}

/* Left column (menu) */
.left { font-family:"Garamond";
	position: relative;
	bottom: 482px;
	left: 970px;
  flex: 35%;
  padding: 15px 0;
  border-radius: 10px;
}

.left h2 { font-family:"Garamond";
  padding-left: 20px;
}

/* Right column (page content) 
.right { font-family:"Garamond";
  flex: 65%;
  padding: 15px;
}
*/

/* Style the search box */
#mySearch { font-family:"Garamond";
  width: 100%;
  font-size: 18px;
  padding: 11px;
  border: 1px solid #ddd;
}

/* Style the navigation menu inside the left column */
#myMenu { font-family:"Garamond";
  list-style-type: none;
  padding: 0;
  margin: 0;
}

#myMenu li a { font-family:"Garamond";
  padding: 17px;
  text-decoration: none;
  color: black;
  display: block;
}

#myMenu li a:hover { font-family:"Garamond";
  background-color: #eee;
}
* { font-family:"Garamond";box-sizing: border-box;}

body { font-family:"Garamond";
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
  background-color: white;
}

.topnav { font-family:"Garamond";
  overflow: hidden;
  background-color: #B0C4DE;
}

.topnav a { font-family:"Garamond";
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover { font-family:"Garamond";
  background-color: #ddd;
  color: black;
}

.topnav a.active { font-family:"Garamond";
  background-color: #B0C4DE;
  color: white;
  top: 10px;
}
.topnav a.active1 { font-family:"Garamond";
  background-color: #2196F3;
  color: white;
  
}
.topnav a.active2 { font-family:"Garamond";
  background-color: #2196F3;
  color: white;
  
  
}
.topnav .search-container { font-family:"Garamond";
  float: right;
}

.topnav input[type=text] { font-family:"Garamond";
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
}

.topnav .search-container button { font-family:"Garamond";
  float: right;
  padding: 6px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.topnav .search-container button:hover { font-family:"Garamond";
  background: #ccc;
}

@media screen and (max-width: 600px) { font-family:"Garamond";
  .topnav .search-container { font-family:"Garamond";
    float: none;
  }
  .topnav a, .topnav input[type=text], .topnav .search-container button { font-family:"Garamond";
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .topnav input[type=text] { font-family:"Garamond";
    border: 1px solid #ccc;  
  }
}
.open-button { font-family:"Garamond";
  
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  background-color: #B0C4DE;
  
}

/* The popup form - hidden by default */
.form-popup { font-family:"Garamond";
  display: none;
  position: fixed;
  top :200px;
  right : 500px;
  border: 3px solid #f1f1f1;
  z-index: 9;
  border-radius: 10px;
}

/* Add styles to the form container */
.form-container { font-family:"Garamond";
  width: 400px;
  
  padding: 10px;
  background-color: #B0C4DE;
  
  
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password],.form-container input[type=email] { font-family:"Garamond";
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus { font-family:"Garamond";
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn { font-family:"Garamond";
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel { font-family:"Garamond";
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover { font-family:"Garamond";
  opacity: 1;
}
.alert { font-family:"Garamond";
  padding: 20px;
  background-color: #f44336;
  color: white;
  width: 500px;
  right: 350px;
  position: fixed;
  font-size: 30px;
}


.closebtn { font-family:"Garamond";
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
  
}

.closebtn:hover { font-family:"Garamond";
  color: black;
}
.openn-button { font-family:"Garamond";
  background-color:  #B0C4DE;
  color: white;
  padding: 8px 10px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
   
  
}

.formm-popup { font-family:"Garamond";
  display: none;
  border: 3px solid #f1f1f1;
  z-index: 9;
   left: 950px;
   top : 50px;
   position : absolute;
}

/* Add styles to the form container */
.formm-container { font-family:"Garamond";
  width: 268px;
  padding: 10px;
  background-color: white;
}

/* Full-width input fields */
.formm-container input[type=text], .form-container input[type=password] { font-family:"Garamond";
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.formm-container input[type=text]:focus, .form-container input[type=password]:focus { font-family:"Garamond";
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.formm-container .btn { font-family:"Garamond";
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.formm-container .cancel { font-family:"Garamond";
  background-color: red;
}

/* Add some hover effects to buttons */
.formm-container .btn:hover, .open-buttonn:hover { font-family:"Garamond";
  opacity: 0.5;
  background-color: #FA8072;
}