
/*  ---- WELCOME.BLADE.PHP ----*/
function validerNom_entreprise() {
    var nom_entreprise = document.getElementById("texteInput").value.trim().replace(/\s+/g, ' ');
    console.log("Entreprise entrée : " + nom_entreprise);

    // Encoder le nom de l'entreprise pour l'inclure dans une URL
    var encoded_nom_entreprise = encodeURIComponent(nom_entreprise);
    console.log("Nom entreprise encodé : " + encoded_nom_entreprise);

    var url = "/infolettre?nom_entreprise=" + encoded_nom_entreprise;
    window.location.href = url;
}


    function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: "smooth"
    });
    document.getElementById("scrollButton").classList.add("scrollAnimation");
}

    document.addEventListener("DOMContentLoaded", function() {
    const texteInput = document.getElementById('texteInput');
    const submitButton = document.getElementById('submitButton');

    texteInput.addEventListener('input', function() {
    if (texteInput.value.trim() !== '') {
    submitButton.removeAttribute('disabled');
    submitButton.classList.remove('disabled-button');
} else {
    submitButton.setAttribute('disabled', 'disabled');
    submitButton.classList.add('disabled-button');
}
});

    // Vérification initiale au chargement de la page
    if (texteInput.value.trim() === '') {
    submitButton.setAttribute('disabled', 'disabled');
    submitButton.classList.add('disabled-button');
}
});

/*  ---- FIN WELCOME.BLADE.PHP ----*/






/*  ---- EMAIL.BLADE.PHP ----*/
/*{{--  script pour géré les erreurs  --}}*/
    document.addEventListener("DOMContentLoaded", function() {
    const emailInput = document.getElementById('email');
    const submitButton = document.querySelector('button[type="submit"]');

    emailInput.addEventListener('input', function() {
    if (isValidEmail(emailInput.value)) {
    submitButton.removeAttribute('disabled');
    submitButton.classList.remove('disabled-button');
} else {
    submitButton.setAttribute('disabled', 'disabled');
    submitButton.classList.add('disabled-button');
}
});

    function isValidEmail(email) {
    // RegEx pour valider l'email
    const emailRegex = /(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))/;
    return emailRegex.test(email);
}

    // Vérification initiale au chargement de la page
    if (!isValidEmail(emailInput.value)) {
    submitButton.setAttribute('disabled', 'disabled');
    submitButton.classList.add('disabled-button');
}
});
/*  ---- FIN EMAIL.BLADE.PHP ----*/

/*  ---- CONTACT.BLADE.PHP ----*/

/* Script qui vérifie les informations dans les inputs*/
 function validateForm() {
    // Récupération des valeurs des champs
    var nom = document.getElementById('form_nom').value;
    var prenom = document.getElementById('form_prenom').value;
    var tel = document.getElementById('form_tel').value;
    var email = document.getElementById('form_email').value;
    var message = document.getElementById('form_message').value;

    // Validation des champs
    if (nom == "" || prenom == "" || tel == "" || email == "" || message == "") {
    alert("Veuillez remplir tous les champs du formulaire.");
    return false;
}

    // Validation du format du téléphone
    var telPattern = /^0\d{9}$/;
    if (!telPattern.test(tel)) {
    alert("Veuillez entrer un numéro de téléphone valide.")
    return false;
}

    // Validation du format de l'email
    var emailPattern = /^[\w\-]+(\.[\w\-]+)*@[\w\-]+(\.[\w\-]+)*\.[\w\-]{2,4}$/;
    if (!emailPattern.test(email)) {
    alert("Veuillez entrer une adresse email valide.");
    return false;
}

    return true;
}
/*  ---- FIN CONTACT.BLADE.PHP ----*/
