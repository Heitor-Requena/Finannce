function alterarPag(pagName) {
  if (pagName === "Home") {
    document.querySelector("#section").innerHTML =
      `<h1 class="text-center align-middle">Seja bem vindo, Usuário</h1>`;
    document.querySelector("#result").innerHTML =
      ``;
  }
  
  // Perfil Cliente--------------------------------------------------------------------------------------------------------
  else if (pagName === "Configuracoes") {
    document.querySelector("#section").innerHTML = `<h1>Configurações</h1>`;
    document.querySelector("#result").innerHTML = ``;
  }


}