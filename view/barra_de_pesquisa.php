<?php
?>

<section class="indigo lighten-4" id="section_resPesquisa">
    <div class="container">
            <div class="row" id="row_resPesquisa"></div>
    </div>
</section>



<script>
// Barra de pesquisa no menu do site}
 let input_pesquisa = document.getElementById("barra_pesquisa");
 let section_resPesquisa = document.getElementById("section_resPesquisa");
 let row_resPesquisa = document.getElementById("row_resPesquisa");
 
 document.addEventListener('click', function(event) {
    var isClickInside = input_pesquisa.contains(event.target);

    setTimeout(() => {
    
     if (!isClickInside && input_pesquisa.value !== "") { // clicou fora do campo de busca E existe texto dentro dele
        let requestConf = {
            method: "POST",
            body: JSON.stringify(input_pesquisa.value),
            headers: {"Content-type": "application/json; charset=UTF-8"}
        }
         fetch( `/pesquisar`, requestConf )
             .then(res => res.json() )
             .then(res => {                
                console.log(res);

                res.pesquisa.forEach(function(item){
                    if (item.favorito) var favoritoIcon = "favorite";
                    if (!item.favorito) var favoritoIcon = "favorite_border";
                    
                    section_resPesquisa.classList.add("padding_tb");
                    // row_resPesquisa.classList.add("fadeIn");

                    inserirResultado(item, favoritoIcon);
                    input_pesquisa.value = "";
                
                    ///
                    let ss = document.querySelectorAll(".btn_favoritar");
                    console.warn(ss);
                    ///
                
                }); // forEach
                 
                 if (res.status === "ok") { // VERIFICAR TRATAMENTO DE ERROS COM JSON - ESSE If NÃO FUNCIONA
                     alert("ok, chamar uma função para executar um innerHTML em uma DIV com o resultado");
                 }
            
             })
         .catch( error => {
             M.toast({ text: 'Erro ao Realizar Pesquisa' })
         });
         
        } // IF 
     }, 1000);
 });
 
 
 
 
function inserirResultado(item, favIcon){ // <h5 class="center">Você Pesquisou por: ${input_pesquisa.value}</h5>
 let sinopse = item.sinopse;
 let s_sobre = sinopse.substr(0,200);

    row_resPesquisa.innerHTML = `
            <h5 class="center">Resultado da Pesquisa</h5>
    
             <div class='col s3 m6 l3' id='removerHTML${item.id}'>
                 <div class='card hoverable'>

                     <div class='card-image'>
                         <img src='${item.poster}'>

                         <button class='btn-floating halfway-fab waves-effect waves-light red btn_favoritar'
                         data-id='${item.id}'>
                             <i class='material-icons'>${favIcon}</i>
                         </button>
                     </div>

                     <div class='card-content'>
                         <p class='valign-wrapper'><i class='material-icons amber-text'>star</i>${item.nota}</p>

                         <span class='card-title activator grey-text text-darken-4'>
                             ${item.titulo}
                             <i class='material-icons right'>more_vert</i>
                         </span>
                     </div>

                     <div class='card-reveal'>
                         <span class='card-title grey-text text-darken-4'>${item.titulo}
                             <i class='material-icons right'>close</i>
                         </span>

                         <p>
                             ${s_sobre}...
                             <a href='https://www.themoviedb.org/search?query=${item.titulo}' target='_blank'>
                                 <span class='grey-text'>The Movie Database</span>
                             </a>
                         </p>
                        
                         <button class='waves-effect waves-light btn-small right red accent-2 btn_apagar' data-id='${item.id}'>
                             <i class='material-icons'>delete</i>
                         </button>
                     </div>

                 </div>
             </div>
 `;
 
 }
 
 /*
              <!-- MODAL PARA APAGAR FILME == ${item.id}, ${item.titulo} -->
             <div class='modal' id='modal_apagarFilme${item.id}' data-id='${item.id}'>
                 <div class='modal-content'>
                     <h4 style='color:#4a148c;'> <b>APAGAR ITEM</b> </h4>
                     <p class='valign-wrapper'>
                         <i class='material-icons amber-text'>star</i>${item.nota}
                             &emsp; <b>${item.titulo}</b>
                     </p>
                     <p>
                         ${s_sobre}...
                         <a href='https://www.themoviedb.org/search?query=<${item.titulo}' target='_blank'>
                             <span class='grey-text'>The Movie Database</span>
                         </a>
                     </p>
                 </div>
                 <br>

                 <div class='modal-footer'>
                     <div class='left'>
                         <a class='btn-flat waves-effect waves-light' href='/novo'>Cadastrar Filme</a>
                     </div>
                     <a href='#!' class='modal-close waves-effect waves-red btn red modal_apagarFilme_apagar' data-id='${item.id}'>Apagar</a>
                     <a href='#!' class='modal-close waves-effect waves btn'>Cancelar</a>
                    </div>
             </div>
 */
 
</script>


