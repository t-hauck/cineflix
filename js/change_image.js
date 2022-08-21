// -- - --
// Alteração da imagem de fundo do site de forma aleatória a cada acesso
/* https://medium.com/swlh/arrays-in-javascript-e64b873ad801
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
filmBackground.style.backgroundImage = "url('img/" + nomeImagem + "')";
//
// -- - --

console.log(imagens);
console.log("Nome da imagem carregada: ", nomeImagem);




setTimeout(() => {
  const youtu_video = "https://youtu.be/lpWf_QPDRKs?list=PLg_pr5IYXWPeBLhsTRWiuZhbKZlegKKZo"
  
  alert("CONTINUAR NO VÍDEO: \n\n" + youtu_video + "\n\n\n\n\n# change_image.js");
}, "5000") // 5 segundos
