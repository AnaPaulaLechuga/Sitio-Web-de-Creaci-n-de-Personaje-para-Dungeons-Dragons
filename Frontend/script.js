var indiceEspecie = 0;
var indiceVariedad = 0;
var indiceCasco = 0;
var indiceCamisa = 0;
var indicePantalon = 0;

const especies = ['Elfo', 'Humano', 'Enano'];
const imagenes = {
    Elfo: {
        Cuerpo: ['Personajes/Elfo-01.png', 'Personajes/Elfo-02.png', 'Personajes/Elfo-03.png', 'Personajes/Elfo-04.png'],
        Casco: ['Personajes/Casco-Elfo-01.png', 'Personajes/Casco-Elfo-02.png'],
        Camisa: ['Personajes/Camisa-Elfo-01.png', 'Personajes/Camisa-Elfo-02.png'],
        Pantalon: ['Personajes/Pantalon-Elfo-01.png', 'Personajes/Pantalon-Elfo-02.png']
    },
    Humano: {
        Cuerpo: ['Personajes/Humano-01.png', 'Personajes/Humano-02.png', 'Personajes/Humano-03.png', 'Personajes/Humano-04.png'],
        Casco: ['Personajes/Casco-Humano-01.png', 'Personajes/Casco-Humano-02.png'],
        Camisa: ['Personajes/Camisa-Humano-01.png', 'Personajes/Camisa-Humano-02.png'],
        Pantalon: ['Personajes/Pantalon-Humano-01.png', 'Personajes/Pantalon-Humano-02.png']
    },
    Enano: {
        Cuerpo: ['Personajes/Enano-01.png', 'Personajes/Enano-02.png', 'Personajes/Enano-03.png', 'Personajes/Enano-04.png'],
        Casco: ['Personajes/Casco-Enano-01.png', 'Personajes/Casco-Enano-02.png'],
        Camisa: ['Personajes/Camisa-Enano-01.png', 'Personajes/Camisa-Enano-02.png'],
        Pantalon: ['Personajes/Pantalon-Enano-01.png', 'Personajes/Pantalon-Enano-02.png']
    }
};

function cambiarEspecie() {
    indiceEspecie = (indiceEspecie + 1) % especies.length;
    indiceVariedad = 0;
    indiceCasco = 0;
    indiceCamisa = 0;
    indicePantalon = 0;
    actualizarImagen();
}

function cambiarVariedad() {
    const especie = especies[indiceEspecie];
    indiceVariedad = (indiceVariedad + 1) % imagenes[especie].Cuerpo.length;
    actualizarImagen();
}

function cambiarImagen(tipo) {
    const especie = especies[indiceEspecie];
    if (tipo === 'Casco') {
        indiceCasco = (indiceCasco + 1) % imagenes[especie][tipo].length;
    } else if (tipo === 'Camisa') {
        indiceCamisa = (indiceCamisa + 1) % imagenes[especie][tipo].length;
    } else if (tipo === 'Pantalon') {
        indicePantalon = (indicePantalon + 1) % imagenes[especie][tipo].length;
    }
    actualizarImagen();
}

function actualizarImagen() {
    const especie = especies[indiceEspecie];
    document.getElementById('cuerpo').src = imagenes[especie].Cuerpo[indiceVariedad];
    document.getElementById('camisa').src = imagenes[especie].Camisa[indiceCamisa];
    document.getElementById('pantalon').src = imagenes[especie].Pantalon[indicePantalon];
    document.getElementById('casco').src = imagenes[especie].Casco[indiceCasco];
}

function resetearImagen() {
    indiceEspecie = 1; // Humano
    indiceVariedad = 0;
    indiceCasco = 0;
    indiceCamisa = 0;
    indicePantalon = 0;
    actualizarImagen();
}

function cambiarImagenAleatoria() {
    indiceEspecie = Math.floor(Math.random() * especies.length);
    const especie = especies[indiceEspecie];
    indiceVariedad = Math.floor(Math.random() * imagenes[especie].Cuerpo.length);
    indiceCasco = Math.floor(Math.random() * imagenes[especie].Casco.length);
    indiceCamisa = Math.floor(Math.random() * imagenes[especie].Camisa.length);
    indicePantalon = Math.floor(Math.random() * imagenes[especie].Pantalon.length);
    actualizarImagen();
}

// Inicializar la imagen al cargar la página
window.onload = actualizarImagen;
