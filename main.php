<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<script>
    var ajax = new XMLHttpRequest();
    
    function loadDataReq1(){
           if(ajax.readyState === 4){
               if(ajax.status == 200) {
                   let rows = JSON.parse(ajax.response);
                   console.dir(rows);
                   let result = "";
                   result += rows[0].Account;
                 document.getElementById("result1").innerHTML = result; 
               }
           }
       }

       async function request1() {
        let chief = document.getElementById("chief").value;
           let url = "lab3_1.php?chief=" + chief;
            let ajax = await fetch(url);
            let json = await ajax.json();
            console.dir(json);
            
            let result = "";
            for(var i = 0; i < json.length; i++){
                result = json[i].Account;
            }
            document.getElementById("result1").innerHTML = result; 
            
        };

    function loadDataReq2(){
        if(ajax.readyState === 4){
            if(ajax.status === 200){
                console.dir(ajax);
                let rows = ajax.responseXML.firstChild.children;
                let result = "";
                for (let i = 0; i < rows.length; i++) {
                    result = rows[i].children[0].firstChild.nodeValue + "---" + rows[i].children[1].textContent;
                }
                document.getElementById("result2").innerHTML = result;
            }
        }
    }
    function request2(){
        ajax.onreadystatechange = loadDataReq2;
        let project = document.getElementById("project").value;
        ajax.open("GET", "lab3_2.php?project=" + project, true);
        ajax.send();
    }

    function loadDataReq3(){
           if(ajax.readyState === 4){
               if(ajax.status == 200) {
                   console.log(ajax.response);
                document.getElementById("result3").innerHTML = ajax.response;
               }
           }
       }
    function request3() {
            ajax.onreadystatechange = loadDataReq3;
            let pr = document.getElementById("pr").value;
            let date = document.getElementById("date").value;
            ajax.open("POST", "lab3_3.php", true);
            ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            ajax.send("pr="+ pr + "&date=" + date);
       }
</script>
<body>
    <div><p>Select the chief:</p>
    <select name="chief" id="chief">
        <option>John Chen</option>
        <option>Luis Popp</option>
        <option>Bruce Ernst</option>
        <option>Valii Pataballa</option>
    </select>
    <p><input  type="button" value="Send" onclick="request1()"/></p></div>
    <p id="result1"></p>
    <div><p>Select the project name:</p>
    <select name="project" id="project">
        <option>Project1</option>
        <option>Project2</option>
        <option>Project3</option>
        <option>Project4</option>
        <option>Project5</option>
    </select>
    <p><input type="button"  value="Send" onclick="request2()"></p></div>
    <p id="result2"></p>
    <div><p>Select the project name:</p>
    <select name="pr" id="pr">
        <option>Project1</option>
        <option>Project2</option>
        <option>Project3</option>
        <option>Project4</option>
        <option>Project5</option>
    </select>
    <p>Select the date:</p>
    <select name="date" id="date">
        <option>2022.02.18</option>
        <option>2022.02.19</option>
        <option>2022.02.20</option>
        <option>2022.04.02</option>
        <option>2022.04.05</option>
        <option>2022.04.10</option>
        <option>2022.03.14</option>
        <option>2022.03.23</option>
        <option>2022.03.27</option>
        <option>2022.01.10</option>
        <option>2022.01.16</option>
        <option>2022.01.23</option>
    </select>
    <p><input  type="button" value="Send" onclick="request3()"/></p></div>
    <p id="result3"></p>
</body>
</html>