<?php 
header('Content-type: text/css');
include "../conection.php";
$sql = "SELECT * FROM colors;";
$consulta = mysqli_query($conn, $sql);
$i=0;
while ($color = mysqli_fetch_array($consulta)) {
    $colors[$i] = $color['color'];
    $i++;
}
$colorPrimary = $colors[0];
$colorSecondary = $colors[1];
$colorTerciary = $colors[2];
$colorFourth = $colors[3];
$colorWhite = $colors[4];
$colorBlack = $colors[5];
?>

.test {
    color: <?php echo $colorPrimary;?>;
}
.navContainer{
    background-color:<?php echo $colorPrimary;?>;
}
.link-nav{
    color:<?php echo $colorTerciary;?>;text-decoration:none;
}
.link-nav:hover{
    color:<?php echo $colorWhite;?>;text-decoration:underline;
}
.link-nav a{
    color:<?php echo $colorTerciary;?>;padding:20px;text-decoration:none;
}
.headerIndex{
    height:80vh;background-color:<?php echo $colorSecondary;?>;
}
.calendar{
    box-shadow:10px 10px 5px 0px rgba(0,0,0,.3);
    -webkit-box-shadow:10px 10px 5px 0px rgba(0,0,0,.3);
    -moz-box-shadow:10px 10px 5px 0px rgba(0,0,0,.3);
}

.cardServicio{
    transition:all 1s;
}
.cardServicio a {
    color:black;
    text-decoration:none;
}
.cardServicio:hover{
    transform:scale(1.07);
}
.cardServicio button {
    color:white;
}
.fc-left h2{
    color:<?php echo $colorWhite;?>;
    text-align:center;
}
    .fc-today-button{
        background-color:<?php echo $colorPrimary;?>;
        border-radius:20px;
    }
.fc-header-toolbar{
    display:flex;
    justify-content:center;
    border-top-left-radius:20px;
    border-top-right-radius:20px;
}
.calendar{
    border-radius:30px;
}
.fc-prev-button,.fc-next-button{
    border:none;
}
.modal-header{
    flex-direction:column;
}
.modal-footer{
    justify-content:center;
    border-bottom-left-radius:20px;
    border-bottom-right-radius:20px;
}
.modal-content{
    border-radius:20px;
    max-width:350px;
}
#descripcionServicio {
    height:80vh;
}
#turnos h1,#turnos h4{
        text-align:center;
    }
    
.mainHorario {
    height:85vh;
    background-image:url("https://via.placeholder.com/1200.png");
    background-size:cover1;
}
.formHorarios{
    max-width:350px;
    margin:0 auto;
    background-color:<?php echo $colorFourth;?>;
    border-radius:20px;
}

.formPersonal{
    max-width:500px;
    margin:0 auto;background-color:<?php echo $colorTerciary;?>;
    border-radius:30px;
}

.headerPersonal{
    background-color:<?php echo $colorPrimary;?>;
    color:<?php echo $colorWhite;?>;
    border-top-left-radius:20px;
    border-top-right-radius:20px;
}

.form-control:focus{
    border-color:rgba(3,203,155,.8);
    box-shadow:0 1px 1px rgba(0,0,0,.075) inset,0 0 8px rgba(3,203,155,.6);
    outline:0 none;
}
.form-group div{
    margin:0 auto;
    width:100%;
}
.control-label{
    min-width:200px;
}
.modal-title{
    text-align:center;
    font-size:20px;
}
.modal-header h4{
    font-size:20px;
    background-color:<?php echo $colorPrimary;?>;
    color:<?php echo $colorWhite;?>;
}
.modal-content{
    margin:0 auto;
}
.containerConfirmacion{
    margin:0 auto;
    display:flex;
    justify-content:center;
}
.btnConfirm{
    display:block;
    margin:0 auto;
    width:70%;
}
.card-text,.card-title{
    text-align:center;
}
.card-body{
    background-color:<?php echo $colorFourth;?>;
}
.card-footer{
    background-color:<?php echo $colorFourth;?>;
}
footer{
    background-color:<?php echo $colorBlack;?>;
}
.errorMessage{
    background-color:red;
    color:<?php echo $colorWhite;?>;
    padding:.5em;
    border-bottom-left-radius:20px;
    border-bottom-right-radius:20px;
}
.mensajeTurno{
    position:fixed;
    display:block;
    top:200px;
    margin:0 auto;
    width:300px;
    z-index:10;
    border-radius:20px;
    background-color:<?php echo $colorPrimary;?>;
    color:<?php echo $colorWhite;?>;box-shadow:5px 5px 0px rgba(255,255,255,.3);
    -webkit-box-shadow:5px 5px 5px 0px rgba(255,255,255,.3);
    -moz-box-shadow:5px 5px 5px 0px rgba(255,255,255,.3);
}
.toggle{
    display:none;
}
.valid{
    border:2px solid green;
}
.modalDoctor{
    margin-bottom:60px;
}

.mensajeTurnoContainer .card{
    position:absolute;
    align-items:center;
    display:flex;justify-content:center;
    width:100vw;
    height:100vh;
    background-color:rgba(0,0,0,.4);
}
.modalContainer{
    height:80vh;display:flex;align-items:center;
}
.button1{
    background-color:<?php echo $colorPrimary;?>;
    color:<?php echo $colorWhite;?>;
    text-decoration:none;
}
.button1:hover{
    background-color:<?php echo $colorTerciary;?>;
    color:<?php echo $colorWhite;?>;
}
.btnPersonal{
    background-color:<?php echo $colorPrimary;?>;
}
.btnPersonal:hover{
    background-color:<?php echo $colorTerciary;?>;
}
.btnPersonal a{
    color:<?php echo $colorWhite;?>;
    text-decoration:none;
}
.fc-unthemed th{
    color:<?php echo $colorWhite;?>;
    background-color:<?php echo $colorSecondary;?>;
}
.servicioHero{
    background-color:<?php echo $colorSecondary;?>;width:100vw;
    height:80vh;margin-bottom:50px;
}
.header_SelectDoctor{
    background-color:<?php echo $colorPrimary;?>;
    border-top-left-radius:20px;
    border-top-right-radius:20px;
}
.header_SelectDoctor h4{
    background-color:none;
}

@media(max-width: 767px){
    .containerPersonal{
        padding-left:10px !important;
        padding-right:10px !important;
    }
.headerIndex{
    height:auto
}
.modalContainer {
        height: auto;
}
 #calendar {
    margin: 0 40px;
}
.formPersonal {
    margin: 0 20px;
}
}
}