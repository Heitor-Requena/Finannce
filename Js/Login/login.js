var div_Cliente = document.getElementById("div_Cliente")
var div_Consultor = document.getElementById("div_Consultor")
        var div_Adm = document.getElementById("div_Adm")
        var frm_SenhaCliente =document.getElementById("frm_SenhaCliente")

        function AparecerCliente(){
            div_Cliente.style.display = "flex"
            div_Consultor.style.display = "none"
            div_Adm.style.display = "none"
            frm_SenhaCliente.style.display = "none"
            frm_SenhaConsultor.style.display = "none"
        }

        function AparecerConsultor(){
            div_Cliente.style.display = "none"
            div_Consultor.style.display = "flex"
            div_Adm.style.display = "none"
            frm_SenhaCliente.style.display = "none"
            frm_SenhaConsultor.style.display = "none"
        }

        function AparecerAdm(){
            div_Cliente.style.display = "none"
            div_Consultor.style.display = "none"
            div_Adm.style.display = "flex"
            frm_SenhaCliente.style.display = "none"
            frm_SenhaConsultor.style.display = "none"
        }

        function RecuperarSenha_Cliente(){
            frm_SenhaCliente.style.display = "flex"
            div_Cliente.style.display = "none"
        }