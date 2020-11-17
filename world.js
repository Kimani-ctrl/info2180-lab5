window.onload = function(){
var buten = document.getElementById('lookup');
 buten.onclick = function(event){
     event.preventDefault();
     fetch("world.php")
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
 
}