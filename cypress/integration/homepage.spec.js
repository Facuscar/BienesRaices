/// <references types= cypress />

describe('Carga la página principal',()=>{
 it('Prueba el Header de la página principal', ()=>{
     cy.visit('/')

     cy.get('[data-cy="heading-sitio"]').should('exist');
     cy.get('[data-cy="heading-sitio"]').invoke('text').should('equal', 'Venta de casas y departamentos exclusivos ')
 });

 it('Prueba el Header de la sección iconos ',()=>{
    cy.get('[data-cy="heading-nosotros"]').should('exist');
    cy.get('[data-cy="heading-nosotros"]').should('have.prop', 'tagName').should('equal','H2');

    //Selecciona los iconos
    cy.get('[data-cy="iconos"]').should('exist');
    cy.get('[data-cy="iconos"]').find('.icono').should('have.length', 3);
 });

 it('Prueba la sección de propiedades ',()=>{

    //Debe haber 3 propiedades
    cy.get('[data-cy="anuncio"]').should('have.length', 3);

    //Probar el enlace de las propiedades
    cy.get('[data-cy="enlace-propiedad"]').should('have.class', 'boton-amarillo');
    cy.get('[data-cy="enlace-propiedad"]').first().invoke('text').should('equal','Ver propiedad');

    //Probar el enlace a una propiedad
    cy.get('[data-cy="enlace-propiedad"]').first().click();
    cy.get('[data-cy="titulo-propiedad"]').should('exist');

    cy.go('back');

 });

    it('Prueba el Routing hacia todas las propiedades',()=>{

        cy.get('[data-cy="ver-todas"]').should('exist');
        cy.get('[data-cy="ver-todas"]').should('have.class','boton-verde');
        cy.get('[data-cy="ver-todas"]').invoke('attr','href').should('equal','/anuncios')

        cy.get('[data-cy="ver-todas"]').click();
        cy.get('[data-cy="heading-anuncios"]').invoke('text').should('equal','Casas en venta');

        cy.go('back');

    });

    it('Prueba el bloque de contacto',()=>{
        cy.get('[data-cy="imagen-contacto"]').should('exist');
        cy.get('[data-cy="imagen-contacto"]').find('h2').invoke('text').should('equal','Encuentra la casa de tus sueños');
        cy.get('[data-cy="imagen-contacto"]').find('p').invoke('text').should('equal','Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad');
        cy.get('[data-cy="imagen-contacto"]').find('a').invoke('attr', 'href').then( href => {
            cy.visit(href);
        });

        cy.get('[data-cy="heading-contacto"]').should('exist');

        cy.visit('/');

    });

    it('Prueba los testimoniales y el blog',()=>{
        cy.get('[data-cy="blog"]').should('exist');
        cy.get('[data-cy="blog"]').find('h3').invoke('text').should('equal', 'Nuestro Blog');
        cy.get('[data-cy="blog"]').find('img').should('have.length', 2);

        cy.get('[data-cy="testimoniales"]').should('exist');
        cy.get('[data-cy="testimoniales"]').find('h3').invoke('text').should('equal', 'Testimoniales');

    });
});