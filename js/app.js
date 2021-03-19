// login & sign up page password eye
function show(){

    let pass = document.getElementById('password');
    pass.type = "password";
    document.querySelector('.fa-eye').style.display = "none";
    document.querySelector('.fa-eye-slash').style.display = "block";
}

function noShow(){
    
    let pass = document.getElementById('password');
    pass.type = "text";
    document.querySelector('.fa-eye').style.display = "block";
    document.querySelector('.fa-eye-slash').style.display = "none";
}

// user drop-down in home page
 function dropDown(){

    let options = document.querySelector('.user-options');
    options.classList.toggle("show");
 }

//  setting profile image on the profile page
function setDp(){
   document.querySelector('#profilePic').click();
}

function displayImage(e){
    if(e.files[0]){
        let reader = new FileReader();

        reader.onload = function(e){
            document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
    }
}

//  setting image on the add recipe page
function setPoster(){
   document.querySelector('#posterImg').click();
}

function displayPoster(e){
    if(e.files[0]){
        let reader = new FileReader();

        reader.onload = function(e){
            document.querySelector('#posterDisplay').setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
    }
}

// search bar in the home page
function searchIcon(){
    document.querySelector('#searchBtn').click();
}


