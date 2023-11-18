<?php
?>


<div class="container">
        <div class="row" id="resultado_pesquisa">
        </div>
</div>



<script>
 // Barra de pesquisa no menu do site}
 let input_pesquisa = document.getElementById("barra_pesquisa");
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

                // res.forEach((item, index) => {
                // res.forEach(item => {
                res.pesquisa.forEach(function(item){
                    inserirResultado(item);
                    input_pesquisa.value = "";
                }); // forEach
                // https://www.freecodecamp.org/news/javascript-foreach-js-array-for-each-example/
                 
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
 
 
 
 
function inserirResultado(item){
    let bloco_html = document.getElementById("resultado_pesquisa");

    bloco_html.innerHTML = `
            <h5 class="center">Resultado da Pesquisa</h5>
    
             <div class='col s3 m6 l3' id='removerHTML${item.id}'>
                 <div class='card hoverable'>

                     <div class='card-image'>
                         <img src='${item.poster}'>

                         <button class='btn-floating halfway-fab waves-effect waves-light red btn_favoritar'
                         data-id='${item.id}'>
                             <i class='material-icons'>
                                 <?= ($Filme->favorito)? 'favorite' : 'favorite_border' ?></i>
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
                             <?= substr($Filme->sinopse, 0, 2000) . '...' // 0, 500 ?>
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

             <!-- MODAL PARA APAGAR FILME == ${item.id}, ${item.titulo} -->
             <div class='modal' id='modal_apagarFilme${item.id}' data-id='${item.id}'>
                 <div class='modal-content'>
                     <h4 style='color:#4a148c;'> <b>APAGAR ITEM</b> </h4>
                     <p class='valign-wrapper'>
                         <i class='material-icons amber-text'>star</i>${item.nota}
                             &emsp; <b>${item.titulo}</b>
                     </p>
                     <p>
                         <?= substr($Filme->sinopse, 0, 2000) . '...' ?>
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
 `;
 
 }
 
 
</script>


