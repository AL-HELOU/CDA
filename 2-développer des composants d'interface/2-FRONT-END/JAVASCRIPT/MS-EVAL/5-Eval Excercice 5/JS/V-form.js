let validation = document.getElementById("bouton_envoi");
let nom =document.getElementById("nom");
let nom_m =document.getElementById("nom_manquant");
// REGEX
let v = /^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$/;
let v_email = /^(.+)@(.+){2,}\.(.+){2,}$/;
let v_cp = /^\d{5}$/;
let v_date =/^[0-9]+[./-\s][0-9]+[./-\s][0-9]+$/;
//-------------------------------------------------------------------------------------------------------------------------
let prenom =document.getElementById("prenom");
let prenom_m =document.getElementById("prenom_manquant");
let Q = document.getElementById("question");
let Q_m = document.getElementById("Q_manquant");
let feminin = document.getElementById("feminin");
let masculin = document.getElementById('masculin');
let S_m = document.getElementById("sexe_manquant");
let sujet = document.getElementById("sujet");
let sujet_m = document.getElementById('sujet_m');
let ddn =document.getElementById('ddn');
let ddn_m = document.getElementById('ddn_m');
let email = document.getElementById("email");
let email_m = document.getElementById ("email_m");
let accept = document.getElementById("accept");
let accept_m = document.getElementById("accept_m");
let cp = document.getElementById("cp");
let cp_m = document.getElementById("cp_m");


validation.addEventListener('click',f_valid);

function f_valid(e){

    if(nom.validity.valueMissing){
        e.preventDefault();
        nom_m.textContent = " -- Nom manquant";
        nom_m.style.color = 'rgb(133, 5, 5)';
    }
    else if(v.test(nom.value) == false){
        e.preventDefault();
        nom_m.textContent = " -- Format incorrect";
        nom_m.style.color = "orange";
    }
    else{nom_m.textContent =""}



    if(prenom.validity.valueMissing){
        e.preventDefault();
        prenom_m.textContent = " -- Prénom manquant";
        prenom_m.style.color = 'rgb(133, 5, 5)';
    }
    else if(v.test(prenom.value) == false){
        e.preventDefault();
        prenom_m.textContent = " -- Format incorrect";
        prenom_m.style.color = "orange";
    }
    else{prenom_m.textContent =""}



    if (feminin.validity.valueMissing && masculin.validity.valueMissing){
        e.preventDefault();
        S_m.textContent = " --  Veuillez choisissez votre sexe";
    }
    else{S_m.textContent =""}

   

    if(ddn.validity.valueMissing){
        e.preventDefault();
        ddn_m.textContent = " -- Veuillez Entrez votre date de naissance";
        ddn_m.style.color = 'rgb(133, 5, 5)';
    }
    else if(v_date.test(ddn.value) == false || new Date(ddn.value).getFullYear() > new Date().getFullYear() || new Date(ddn.value).getFullYear() < new Date().getFullYear()-150 ){
        e.preventDefault();
        ddn_m.textContent = " -- Format incorrect";
        ddn_m.style.color = "orange";
    }
    else{ddn_m.textContent =""}



    if (cp.validity.valueMissing){
        e.preventDefault();
        cp_m.textContent = " -- Veuillez Entrez le code postal";
        cp_m.style.color = 'rgb(133, 5, 5)';
    }
    else if(v_cp.test(cp.value) == false){
        cp_m.textContent = " -- Format incorrect";
        cp_m.style.color = "orange";
    }
    else{cp_m.textContent =""}



    if(email.validity.valueMissing){
        e.preventDefault();
        email_m.textContent = " -- Veuillez Entrez votre email";
        email_m.style.color = 'rgb(133, 5, 5)';
    }
    else if(v_email.test(email.value) == false){
        e.preventDefault();
        email_m.textContent = " -- Format incorrect";
        email_m.style.color = "orange";
    }
    else{email_m.textContent =""}



    if (sujet.validity.valueMissing){
        e.preventDefault();
        sujet_m.textContent = " -- Veuillez choisissez votre sujet";
    }
    else{sujet_m.textContent =""}



    if (Q.validity.valueMissing){
        e.preventDefault();
        Q_m.textContent = " -- Veuillez Entrez votre question";
    }
    else{Q_m.textContent =""}



    if (accept.validity.valueMissing){
        e.preventDefault();
        accept_m.textContent = " -- Veuillez acceptez pour continuer";
    }
    else {accept_m.textContent =""}
}