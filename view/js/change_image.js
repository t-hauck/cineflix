// -- - --
/* Alteração da imagem de fundo do site de forma aleatória a cada acesso
var imgLocation = "assets/css/login-page-background/";
var imagens = [
  [ "DSC_0185.JPG", imgLocation + "image0.css" ],
  [ "DSC_0175.JPG", imgLocation + "image1.css" ],
  [ "DSC_0181.JPG", imgLocation + "image2.css" ],
  [ "DSC_0172.JPG", imgLocation + "image3.css" ]
];
*/
//
var imagens = [
    "movie-3057394.jpg",
    "cinema-4153289.jpg",
    "ticket-2974645.jpg"
];

const nomeImagem = imagens[Math.floor(Math.random() * imagens.length)]; //[0];
const filmBackground = document.getElementById("film_background");
filmBackground.style.backgroundImage = "url('view/img/" + nomeImagem + "')";
//
// -- - --
// console.log(imagens);
// console.log("Nome da imagem carregada: ", nomeImagem);
//
