/*window.onload = function(){
var buten = document.getElementById('lookup');
var nation = document.getElementById('country').Value;
 buten.onclick = function(event){
     event.preventDefault();
     fetch("world.php?country="+ nation )
     .then(function(response){
        if (response.ok){
            return response.text();
        } else{
            return Promise.reject('An error has occur');
        }
       }).then(function(data){
            document.getElementById('result').textContent = data;
        })
        .catch(error => console.log('error: '+error));
     }
 
}*/
document.addEventListener("DOMContentLoaded",function(){
  var buten = document.getElementById('cities');
  const countryBtn = document.getElementById("lookup");

  buten.addEventListener('click',function(event){
    let nation = document.getElementById('country').value;
    let res = document.getElementById('result');
    let linck = "country="+nation+"&context=cities";
    console.log(linck);
    
    const request = new XMLHttpRequest();
    request.onload= function(){
        res.innerHTML = this.responseText;
    }
    request.open("GET", "world.php?"+linck, true);
    request.send();

   });

    countryBtn.addEventListener('click',function(event){
    var nation = document.getElementById('country').value;
    var res = document.getElementById('result');
    let linck = "country="+nation;
    console.log(linck);
    
    const request = new XMLHttpRequest();
    request.onload= function(){
        res.innerHTML = this.responseText;
    }
    request.open("GET", "world.php?"+linck, true);
    request.send();

   });
});