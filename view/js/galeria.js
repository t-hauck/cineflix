document.querySelectorAll(".btn_favoritar").forEach(btn => { // Marcar um item como favorito
    btn.addEventListener("click", (e) => {
             
        const id = btn.getAttribute("data-id");
        fetch( `/favoritar/${id}` )
            .then(response => response.json() )
            .then(response => {
                if (response.status === "ok") {

                    btn_icon = btn.querySelector("i");
                    if (btn_icon.innerHTML === "favorite") {
                        btn_icon.innerHTML = "favorite_border";
                    } else { btn_icon.innerHTML = "favorite"; }
                }
            
            })
        .catch( error => {
            M.toast({ html: 'Erro ao Favoritar Item' })
        });

    });
    
});


// Apagar Item
document.querySelectorAll(".btn_apagar").forEach(btn => { // abre o modal de confirmação ao clicar no ícone para Apagar no card
    btn.addEventListener("click", (e) => {

        const id = btn.getAttribute("data-id");
        var mod_apagarFilme = document.getElementById(`modal_apagarFilme${id}`);
        mod_apagarFilme_open = M.Modal.init(mod_apagarFilme, {
                dismissible: true // permite que o modal seja fechado ao clicar fora dele
        }); // console.warn(id, mod_apagarFilme);

        var instance = M.Modal.getInstance(mod_apagarFilme);
        instance.open();
    });
});
document.querySelectorAll(".modal_apagarFilme_apagar").forEach(btn => { // APAGAR item se for clicado no botão de 'Apagar' no modal de confirmação
    btn.addEventListener("click", (e) => {
             
        const id = btn.getAttribute("data-id");
        const requestConf = { method: "DELETE", headers: new Headers() }
        fetch( `/filmes/${id}`, requestConf )
            .then(response => response.json() )
            .then(response => { // console.warn(response);

                if (response.status === "ok") { // se OK, remover elemento do HTML
                    const card = document.getElementById(`removerHTML${id}`); // const card = btn.closest(".col").classList.add("fadeOut");
                    card.classList.add("fadeOut")
                    setTimeout(() => { card.remove; }, 1000);
                }
            
            })
        .catch( error => {
            M.toast({ html: 'Erro ao Apagar Item' })
        });

    });
    
});
//////
// document.querySelectorAll(".btn_apagar").forEach(btn => {
//     btn.addEventListener("click", (e) => {
             
//         const id = btn.getAttribute("data-id");
//         const requestConf = {
//             method: "DELETE", headers: new Headers()
//         }

//         fetch( `/filmes/${id}`, requestConf )
//             .then(response => response.json() )
//             .then(response => {
//                 if (response.status === "ok") { // se OK, remover elemento do HTML
//                     btn.closest(".col").classList.add("fadeOut");
//                     setTimeout(() => { card.remove; }, 1000);
//                 }
            
//             })
//         .catch( error => {
//             M.toast({ html: 'Erro ao Apagar Item' })
//         });

//     });
    
// });
//////