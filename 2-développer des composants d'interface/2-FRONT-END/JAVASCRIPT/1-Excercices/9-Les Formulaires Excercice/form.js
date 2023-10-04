let filtre = new RegExp("^[\\w]+[\\s\\w]*$");
let filtrecp = new RegExp("^[\\d]{5}$");
let filtremail = new RegExp("^[-.\\w]+[@]{1}[.-\\w]+$");

let form = document.getElementById('form');
let soc = document.getElementById('soc');
let pac = document.getElementById('pac');
let cp = document.getElementById('cp');
let ville = document.getElementById('ville');
let email = document.getElementById('email');
let txtarea2 = document.getElementById('txtarea2');
let select = document.getElementById('etdp');

form.addEventListener("submit",function(e)
{
    if(!filtre.test(soc.value))
    {
        alert('Entrez le nom de la Société s.v.p !');
        e.preventDefault();
    }
    else if(!filtre.test(pac.value))
    {
        alert('Entrez le nom de la Personne à contacter s.v.p !');
        e.preventDefault();
    }
    else if(!filtrecp.test(cp.value))
    {
        alert('Entrez le code postal sur 5 chifres s.v.p !');
        e.preventDefault();
    }
    else if(!filtre.test(ville.value))
    {
        alert('Entrez le nom de la ville s.v.p !');
        e.preventDefault();
    }
    else if(!filtremail.test(email.value))
    {
        alert('Entrez un E-mail s.v.p !');
        e.preventDefault();
    }
});


select.addEventListener('change', function()
{
    txtarea2.innerText = select.value+' : ';
}
);