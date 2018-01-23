function changeGenre(input){
  if (input == "") {
      document.getElementById("output").innerHTML = "";
      return;
    }
    else{
      xmlhttp = new XMLHttpRequest();
    }
    xmlhttp.onreadystatechange = function(){
      if (this.readyState == 4 && this.status == 200){
        document.getElementById("table").innerHTML = this.responseText;
      }
    }
    xmlhttp.open("GET", "table.php?q=" + input, true);
    xmlhttp.send();
}

function modify(){
  document.theform.action="modify.php";
  document.theform.submit();
}
function deletemovie(){
  document.theform.action="delete.php";
  document.theform.submit();
}
