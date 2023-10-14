function buscaCep() {
    let cep = document.getElementById("CEP").value;
    console.log(cep);

    if (cep !== "") {
        let url = "https://brasilapi.com.br/api/cep/v1/" + cep;

        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error("CEP inválido")
                }
                return response.json();
            })
            .then(data => {
                document.getElementById("Rua").value = data.street;
                document.getElementById("Bairro").value = data.neighborhood;
                document.getElementById("Cidade").value = data.city;
                document.getElementById("Estado").value = data.state;
            })
            .catch(error => {
                alert(error.message);
            });
    }
}

document.addEventListener("DOMContentLoaded", function () {
    let Cep = document.getElementById("CEP");
    Cep.addEventListener("blur", buscaCep);
});
