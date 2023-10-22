function alterarPag(pagName) {
    if (pagName === "Home") {
      document.querySelector("#section").innerHTML =
        `<h1 class="text-center align-middle">Seja bem vindo, </h1>`;
      document.querySelector("#result").innerHTML =
        ``;
    }
    // Perfil Cliente--------------------------------------------------------------------------------------------------------
    else if (pagName === "FeedBack") {
      document.querySelector("#section").innerHTML = `Area de FeedBack 
      <button onclick="FeedBack()">Meus FeedBack's</button>`;
      document.querySelector("#result").innerHTML  = ``;
    }
}