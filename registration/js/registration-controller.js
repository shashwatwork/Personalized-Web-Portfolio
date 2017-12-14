/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//var events_on_stage;
//var events_off_stage;
var app = angular.module("regApp",[]);
document.getElementById("event").disabled = true;

app.controller("regCtrl",function($scope,$http){
    
    /*******code for captcha**********/
    $scope.GenerateCaptcha = function() {
        var chr1 = Math.ceil(Math.random() * 10) + '';
        var chr2 = Math.ceil(Math.random() * 10) + '';
        var chr3 = Math.ceil(Math.random() * 10) + '';
        var chr4 = Math.ceil(Math.random() * 10) + '';
        var chr5 = Math.ceil(Math.random() * 10) + '';
        var chr6 = Math.ceil(Math.random() * 10) + '';
        var chr7 = Math.ceil(Math.random() * 10) + '';

        var captchaCode = chr1 + ' ' + chr2 + ' ' + chr3 + ' ' + chr4 + ' ' + chr5 + ' ' + chr6 + ' ' + chr7;
        document.getElementById("txtCaptcha").value = captchaCode
    }
    $scope.GenerateCaptcha();
    
    function ValidCaptcha() {
        var str1 = removeSpaces(document.getElementById('txtCaptcha').value);
        var str2 = removeSpaces(document.getElementById('txtCompare').value);

        if (str1 == str2)
            return true;
        return false;
    }
    
    function removeSpaces(string) {
        return string.split(' ').join('');
    }
    /*******code for captcha ends here**********/
    
    $scope.getEvents = function(etype){
        console.log("inside get Events function");
        var requestAddr = "http://epignosis2k17.com/registration/purpose.php?"+etype+"=hi"; 
        $http.get(requestAddr).then(function(response){
            console.log(response.data);
            $scope.events_list = response.data;
            document.getElementById("event").disabled = false;
            //var events_on_stage = response.data; 
            //console.log($scope.events_list);
            //return events_on_stage;
        });
    }

    /***********************validation checks************************************/
    function allLetter(inputtxt)
    {
        var letters = /^[A-Za-z]+$/;
        if (inputtxt.match(letters))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    function ValidateEmail(mail)
    {
        if(mail.length>50){
            return(false)
        }
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))
        {
            return (true)
        }
        return (false)
    }
    
    function phonenumber(inputtxt)
    {
        var phoneno = /^\d{10}$/;
        if(inputtxt.length!=10){
            return false;
        }
        if ((inputtxt.match(phoneno)))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    $scope.test = function(){
        
        document.getElementById("button").disabled = true;
//        console.log(optradio);
        var errors = [];
        var fname = document.forms["myForm"]["fname"].value;
        var lname = document.forms["myForm"]["lname"].value;
        var team = document.forms["myForm"]["teamName"].value;
        var email = document.forms["myForm"]["email"].value;
        var phone = document.forms["myForm"]["phone"].value;
        var optradio = document.forms["myForm"]["optradio"].value;
        var college = document.forms["myForm"]["college"].value;
        var city = document.forms["myForm"]["city"].value;
        var eventType = document.forms["myForm"]["eventRadio"].value;
        var event = document.forms["myForm"]["event"].value;
        
        //console.log(name);
        
        if(fname==""){
            errors.push("FIRST NAME FIELD SHOULD NOT BE EMPTY");
        }
        else{
            if (fname.length > 40) {
                errors.push("FIRST NAME FIELD TOO LONG!!");
            }
            if (!(allLetter(fname))) {
                errors.push("FIRST NAME FIELD SHOULD ONLY CONTAIN ALBABETS A-Z OR a-z");
            }
        }
        if(fname==""){
            errors.push("LAST NAME FIELD SHOULD NOT BE EMPTY");
        }
        else{
            if (lname.length > 40) {
                errors.push("LAST NAME FIELD TOO LONG!!");
            }
            if (!(allLetter(lname))) {
                errors.push("LAST NAME FIELD SHOULD ONLY CONTAIN ALBABETS A-Z OR a-z");
            }
        }
        
        if(team.length>100){
            errors.push("TEAM/GROUP/CLAN NAME TOO LONG");
        }
        
        if(email==""){
            errors.push("EMAIL FIELD SHOULD NOT BE EMPTY");
        }
        else{
            if (!(ValidateEmail(email))) {
                errors.push("NOT A VALID EMAIL ADDRESS");
            }
        }
        
        if(phone==""){
            errors.push("MOBILE NUMBER SHOULD NOT BE EMPTY");
        }
        else{
            if(!(phonenumber(phone))){
                errors.push("MOBILE NUMBER INVALID");
            }
        }
        
        if(optradio==""){
            errors.push("PLEASE SELECT YOUR GENDER");
        }
        
        if(college==""){
            errors.push("PLEASE ENTER YOUR COLLEGE/INSTITUTE/UNIVERSITY NAME");
        }
        else{
            if (college.length>100) {
                errors.push("COLLEGE/INSTITUTE/UNIVERSITY FIELD TOO LONG");
            }
        }
        
        if(city==""){
            errors.push("CITY FIELD SHOULD NOT BE EMPTY");
        }
        else{
            if(city.length>50){
                errors.push("CITY NAME TOO LONG")
            }
            if (!(allLetter(city))) {
                errors.push("CITY FIELD SHOULD ONLY CONTAIN ALBABETS A-Z OR a-z");
            }
        }
        
        if(eventType==""){
            errors.push("PLEASE SELECT AN EVENT TYPE");
        }
        if(event=="?" || event==""){
            errors.push("PLEASE SELECT YOUR EVENT");
        }
        if(!(ValidCaptcha())){
            errors.push("CAPTCH IMAGE DID NOT MATCH PLEASE TRY AGAIN");
        }
        
        
        if(errors.length>0){
            
            document.getElementById('myAlertBox').style.display = 'block';
            $scope.errors = errors;
            document.getElementById("button").disabled = false;
            $scope.GenerateCaptcha();
            document.getElementById("txtCompare").value = "";
        }
        
        else{
            document.getElementById('myAlertBox').style.display = 'none';
            document.getElementById("button").disabled = true;
            //var dbAddress = "http://pixelhouse.in/epignosis2k17/htmltophp.php";
            //var dbAddress = "http://localhost/epignosOs2017/public_html/registration/htmltophp.php";
            var dbAddress = "http://epignosis2k17.com/registration/htmltophp.php";
            console.log($scope.part);
            //dbAddress = encodeURI(dbAddress);
            console.log(dbAddress);
            $http.post(dbAddress, $scope.part).then(function (response) {
                document.getElementById('myFormHolderDiv').style.display = 'none';
                $scope.part = "";
                console.log(response.data);
                $scope.responseData = response.data;
                document.getElementById('info-details').style.display = 'block';
                document.getElementById('success-details').style.display = 'block';
            });
        }
//        console.log($scope.part.name); 
    };
    
});

//var validtateFunction = function(){
//    var name = document.getElementById("name").value;
//    var email = document.getElementById("email").value;
//    var phone = document.getElementById("phone").value;
//    var optradio = document.querySelector('input[name="optradio"]:checked').value;
//    var college = document.getElementById("college").value;
//    var city = document.getElementById("city").value;
//    var eventRadio = document.getElementById("eventRadio").value;
//    var event = document.getElementById("event").value;
//}


