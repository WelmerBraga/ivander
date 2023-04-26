<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    :root {
      --color-primary: #0073ff;
      --color-white: #e9e9e9;
      --color-black: #141d28;
      --color-black-1: #212b38;
    }
    
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body {
      font-family: sans-serif;
      background-image: url("dashboard.jpg");
      background-color: #cccccc;
      background-repeat: no-repeat;
      /*background-size: 100% 100%;*/
      background-size: auto;
        

    }
    
    .wrapper{
        margin-left: 40px;
        margin-right: 40px;
        margin-top: 20px;
        margin-bottom: 20px;
        padding-bottom: 20px;
    }
    a{
        text-decoration: none;
    }
    
    .logo {
      color: var(--color-white);
      font-size: 30px;
      
      
    }
    .logo span:hover,.logo span:active {
      color: var(--color-primary);
      color:#0066ff;
      font-size: 150%;
    }
    .logo span {
      color: var(--color-primary);
      color:    #0052cc;
    }
    .vl {
      border-left: 2px solid white;
      height: 25px;
    }
    :root {
  --blue: #000d33;
  --white: #faf0e6; 
}
    
    .menu-bar {
      background-color: var(--blue);
      height: 50px;
      width: 100%;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0 2%;
    position: fixed; 
    top:0;
    overflow:hidden;
    z-index:9;
      /*position: relative;*/
    }
    
    .menu-bar ul {
      list-style: none;
      display: flex;
    }
    
    .menu-bar ul li {
      /* width: 120px; */
      padding: 10px 10px;
      /* text-align: center; */
    
      position: relative;
    }
    
    .menu-bar ul li a {
      font-size: 20px;
      color: var(--color-white);
      text-decoration: none;
    
      transition: all 0.3s;
    }
    .menu-bar .menu a{
      display:none;
      font-size: 20px;
      color: var(--color-white);
      text-decoration: none;
    
      transition: all 0.3s;
    }
    
    
    .menu-bar ul li a:hover, .menu-bar .menu a:hover {
      color: var(--color-primary);
    }
    
    .fas {
      float: right;
      /*margin-left: 10px;*/
      /*padding-top: 3px;*/
    }
    
    /* dropdown menu style */
    .dropdown-menu {
      display: none;
      position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
    }
    
    
    .menu-bar ul li:hover .dropdown-menu {
      display: block;
  position: fixed; 
    top:50;
    overflow:hidden;
    z-index:1;
      background-color: var(--blue);
    }
    
    .menu-bar ul li:hover .dropdown-menu ul {
      float: none;
  color: black;
  /*padding: 12px 16px;*/
  text-decoration: none;
  display: block;
  text-align: left;
    }
    
    .menu-bar ul li:hover .dropdown-menu ul li {
     float: none;
  color: black;
  /*padding: 12px 16px;*/
  text-decoration: none;
  display: block;
  text-align: left;
    }
    
    .dropdown-menu-1 {
      display: none;
    }
    
    .dropdown-menu ul li:hover .dropdown-menu-1 {
      display: block;
      position: absolute;
      /*left: 108px;*/
      z-index: 8;
      right: 108px;
      top: 0;
      background-color: var(--color-black);
    }
    
    .card {
      /* Add shadows to create the "card" effect */
      box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
      transition: 0.3s;
      background-color: white;
      border-radius: 5px;
      animation: mymove 5s infinite;
      animation-direction: alternate;
    }
    @keyframes mymove {
      from {background-color: white;}
      to {background-color: #b3c6ff;}
    }
    .card .container {
      padding: 50px 30px;
      padding-bottom: 80px;
      
    }
    
    /* On mouse-over, add a deeper shadow */
    .card:hover {
      box-shadow: 0 16px 32px 0 rgba(0,0,0,0.5);
    }
    
    /* Create four equal columns that floats next to each other */
    .column {
      float: left;
      width: 50%;
      padding: 20px;
      
    }
    
    .column-full{
      float: left;
      width: 100%;
      padding: 30px;
    }
    
    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
      display: block;
      margin-left: auto;
      border: 1px solid #809fff;
          
    }
    
    .profile-image{
        position:relative;
        top:-10px;
        left:20px;
        border-radius: 50%;
        max-width: 300px;
        max-height: 380px;
        border: 5px solid #809fff;
    }
    
    .logo-image{
        position:relative;
        left:1000px;
        top:-100px;
        max-width: 600px;
        border: 5px solid #809fff;
    }
    
    /* Responsive layout - makes the four columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 1000px) {
      .column {
        width: 100%;
        text-align: center;
       
      }
      .profile-image{
        display: block;
        margin:auto;
        border-radius: 50%;
        width: 250px;
        height: 250px;
        border: 5px solid #809fff;
      }
    }
    @media screen and (max-width: 900px) {
      .menu-bar ul{display: none;}
      .menu-bar .menu a{
          float:none;
          display:block;
      }
      .vl {
          display:none;
      }
      .menu-bar ul li:hover .dropdown-menu {
          top:250;
      }
      .profile-image{
        display: block;
        margin:auto;
        border-radius: 50%;
        width: 200px;
        height: 200px;
        border: 5px solid #809fff;
      }
    }
    @media screen and (max-width: 900px) {
      .menu-bar.responsive {
          position: relative;
          height: 250px;
      }
      .menu-bar.responsive .menu a{
          position: absolute;
          right: 10px;
          top: 10px;
      }
      .menu-bar.responsive ul {
          float: none;
          display: block;
          text-align: left;
      }
      
    }
    @media screen and (max-width: 700px) {
      .profile-image{
        display: block;
        margin:auto;
        border-radius: 50%;
        width: 150px;
        height: 150px;
        border: 5px solid #809fff;
      }
    }
    
    
    
    table {
      width: 100%;
      color: #2947a3;
        font-family: monospace;
        font-size: 20px;
      border-collapse: collapse;
    }
    
    th, td {
      border: 1px solid black;
      padding: 8px;
      text-align: center;
    }
    tr{
        background-color: #f2f2f2;
        
    }
    
    th {
      background-color: #2947a3;
      color:white;
    }
    .edit-button{
        background-color: green;
      color: white;
      padding: 4px 10px;
      border: none;
      cursor: pointer;
      border-radius: 25px;
      margin-top: 100px;
      font-size: 14px;
       transform: rotate(22deg);
    }
    .delete-button, .add-button {
      background-color: #2947a3;
      color: white;
      padding: 4px 10px;
      border: none;
      cursor: pointer;
      border-radius: 25px;
      margin-top: 100px;
      font-size: 20px;
    }
    
    .edit-button:hover, .delete-button:hover, .add-button:hover {
      background-color: #1966b3;
      
    }
    
    /* Full-width input fields */
    input[type=text], input[type=email], input[type=number], select,input[type=date], input[type=password]{
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }
    #searchUser, #searchDevice, #searchAdmin{
        color: #2947a3;
        font-family: monospace;
        font-size: 20px;
    }
    
    /* Set a style for all buttons */
    button {
      background-color: #2947a3;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 100%;
    }
    
    button:hover {
      opacity: 0.8;
    }
    
    /* Extra styles for the cancel button */
    .cancelbtn {
      width: auto;
      padding: 10px 18px;
      background-color: #f44336;
    }
    
    /* Center the image and position the close button */
    .imgcontainer {
      text-align: center;
      margin: 24px 0 12px 0;
      position: relative;
    }
    
    img.avatar {
      width: 40%;
      border-radius: 50%;
    }
    
    .container {
      padding: 16px;
    }
    
    span.psw {
      float: right;
      padding-top: 16px;
    }
    
    /* The Modal (background) */
    .modal {
      display: none; /* Hidden by default */
      position: fixed; /* Stay in place */
      z-index: 1; /* Sit on top */
      left: 0;
      top: 0;
      width: 100%; /* Full width */
      height: 100%; /* Full height */
      overflow: auto; /* Enable scroll if needed */
      background-color: rgb(0,0,0); /* Fallback color */
      background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
      padding-left: 20%;
      padding-right: 20%;
      padding-top: 5%;
      color: #2947a3;
    }
    
    /* Modal Content/Box */
    .modal-content {
      background-color: #fefefe;
      margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
      border: 1px solid #888;
      width: 80%; /* Could be more or less, depending on screen size */
      border-radius: 20px;
    }
    
    /* The Close Button (x) */
    .close {
      position: absolute;
      right: 25px;
      top: 0;
      color: #000;
      font-size: 35px;
      font-weight: bold;
    }
    
    .close:hover,
    .close:focus {
      color: red;
      cursor: pointer;
       transform: rotate(45deg);
      
    }
    
    /* Add Zoom Animation */
    .animate {
      -webkit-animation: animatezoom 0.6s;
      animation: animatezoom 0.6s
    }
    
    @-webkit-keyframes animatezoom {
      from {-webkit-transform: scale(0)} 
      to {-webkit-transform: scale(1)}
    }
      
    @keyframes animatezoom {
      from {transform: scale(0)} 
      to {transform: scale(1)}
    }
    
    /* Change styles for span and cancel button on extra small screens */
    @media screen and (max-width: 300px) {
      span.psw {
         display: block;
         float: none;
      }
      .cancelbtn {
         width: 100%;
      }
      
      
    }
    tr:hover{
        background-color: #01B5FC;
        tr td{
            color:white;
        }
        .edit-button{
            background-color: white;
            color: #2947a3;
            
        }
        

    }
    
    /* The snackbar - position it at the bottom and in the middle of the screen */
    #snackbar {
      visibility: hidden; /* Hidden by default. Visible on click */
      min-width: 250px; /* Set a default minimum width */
      margin-left: -125px; /* Divide value of min-width by 2 */
      background-color: #333; /* Black background color */
      color: #fff; /* White text color */
      text-align: center; /* Centered text */
      border-radius: 2px; /* Rounded borders */
      padding: 16px; /* Padding */
      position: fixed; /* Sit on top of the screen */
      z-index: 5; /* Add a z-index if needed */
      left: 50%; /* Center the snackbar */
      top: 60px; /* 30px from the bottom */
    }
    
    /* Show the snackbar when clicking on a button (class added with JavaScript) */
    #snackbar.show {
      visibility: visible; /* Show the snackbar */
      /* Add animation: Take 0.5 seconds to fade in and out the snackbar.
      However, delay the fade out process for 2.5 seconds */
      -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
      animation: fadein 0.5s, fadeout 0.5s 2.5s;
    }
    
    /* Animations to fade the snackbar in and out */
    @-webkit-keyframes fadein {
      from {top: 0; opacity: 0;}
      to {top: 60px; opacity: 1;}
    }
    
    @keyframes fadein {
      from {top: 0; opacity: 0;}
      to {top: 60px; opacity: 1;}
    }
    
    @-webkit-keyframes fadeout {
      from {top: 60px; opacity: 1;}
      to {top: 0; opacity: 0;}
    }
    
    @keyframes fadeout {
      from {top: 60px; opacity: 1;}
      to {top: 0; opacity: 0;}
    }
</style>